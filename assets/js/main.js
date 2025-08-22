// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });

        // Close mobile menu when clicking on links
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            });
        });
    }
});

// Contact Form Handler
if (document.getElementById('contact-form')) {
    document.getElementById('contact-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        
        // Show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner inline-block mr-2"></span> جاري الإرسال...';
        
        const formData = new FormData(this);
        
        fetch('handlers/contact_handler.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showAlert('success', data.message);
                this.reset();
                
                // Show success state and redirect
                setTimeout(() => {
                    window.location.href = '?page=contact&success=1';
                }, 2000);
            } else {
                showAlert('error', data.message);
            }
        })
        .catch(error => {
            showAlert('error', 'حدث خطأ في الإرسال. يرجى المحاولة مرة أخرى.');
            console.error('Error:', error);
        })
        .finally(() => {
            // Restore button state
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        });
    });
}

// File Upload Handler
function handleFileUpload() {
    const fileInput = document.getElementById('file-upload');
    const fileList = document.getElementById('file-list');
    
    if (fileInput && fileList) {
        fileInput.addEventListener('change', function() {
            displaySelectedFiles(this.files);
        });
    }
}

function displaySelectedFiles(files) {
    const fileList = document.getElementById('file-list');
    if (!fileList) return;
    
    fileList.innerHTML = '';
    
    Array.from(files).forEach((file, index) => {
        const fileItem = document.createElement('div');
        fileItem.className = 'flex items-center justify-between bg-gray-100 rounded-lg p-3 mb-2';
        fileItem.innerHTML = `
            <span class="text-sm text-gray-600">${file.name}</span>
            <button type="button" onclick="removeFile(${index})" class="text-red-500 hover:text-red-700 text-sm">
                حذف
            </button>
        `;
        fileList.appendChild(fileItem);
    });
}

function removeFile(index) {
    const fileInput = document.getElementById('file-upload');
    if (!fileInput) return;
    
    const dt = new DataTransfer();
    const files = Array.from(fileInput.files);
    
    files.forEach((file, i) => {
        if (i !== index) dt.items.add(file);
    });
    
    fileInput.files = dt.files;
    displaySelectedFiles(fileInput.files);
}

// Drag and Drop for File Upload
function initDragDrop() {
    const dropZone = document.getElementById('drop-zone');
    if (!dropZone) return;
    
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });
    
    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
    });
    
    dropZone.addEventListener('drop', handleDrop, false);
    
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }
    
    function highlight(e) {
        dropZone.classList.add('border-blue-400', 'bg-blue-50');
    }
    
    function unhighlight(e) {
        dropZone.classList.remove('border-blue-400', 'bg-blue-50');
    }
    
    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        
        const fileInput = document.getElementById('file-upload');
        if (fileInput) {
            fileInput.files = files;
            displaySelectedFiles(files);
        }
    }
}

// FAQ Accordion
function initFAQAccordion() {
    const faqButtons = document.querySelectorAll('.faq-button');
    
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('.faq-icon');
            
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            }
        });
    });
}

// Search Filter for FAQ
function initFAQSearch() {
    const searchInput = document.getElementById('faq-search');
    const categoryButtons = document.querySelectorAll('.category-btn');
    
    if (searchInput) {
        searchInput.addEventListener('input', filterFAQs);
    }
    
    categoryButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active category
            categoryButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            filterFAQs();
        });
    });
}

function filterFAQs() {
    const searchTerm = document.getElementById('faq-search')?.value.toLowerCase() || '';
    const activeCategory = document.querySelector('.category-btn.active')?.textContent || 'الكل';
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question').textContent.toLowerCase();
        const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
        const category = item.dataset.category;
        
        const matchesSearch = question.includes(searchTerm) || answer.includes(searchTerm);
        const matchesCategory = activeCategory === 'الكل' || category === activeCategory;
        
        if (matchesSearch && matchesCategory) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

// Blog Search and Filter
function initBlogFilter() {
    const searchInput = document.getElementById('blog-search');
    const categoryButtons = document.querySelectorAll('.blog-category-btn');
    
    if (searchInput) {
        searchInput.addEventListener('input', filterBlogPosts);
    }
    
    categoryButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            categoryButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            filterBlogPosts();
        });
    });
}

function filterBlogPosts() {
    const searchTerm = document.getElementById('blog-search')?.value.toLowerCase() || '';
    const activeCategory = document.querySelector('.blog-category-btn.active')?.textContent || 'الكل';
    const blogPosts = document.querySelectorAll('.blog-post');
    
    blogPosts.forEach(post => {
        const title = post.querySelector('.blog-title').textContent.toLowerCase();
        const excerpt = post.querySelector('.blog-excerpt').textContent.toLowerCase();
        const category = post.dataset.category;
        
        const matchesSearch = title.includes(searchTerm) || excerpt.includes(searchTerm);
        const matchesCategory = activeCategory === 'الكل' || category === activeCategory;
        
        if (matchesSearch && matchesCategory) {
            post.style.display = 'block';
        } else {
            post.style.display = 'none';
        }
    });
}

// Alert System
function showAlert(type, message) {
    const alertContainer = document.getElementById('alert-container') || createAlertContainer();
    
    const alert = document.createElement('div');
    alert.className = `alert alert-${type} animate-fadeIn`;
    alert.innerHTML = `
        <div class="flex items-center justify-between">
            <span>${message}</span>
            <button onclick="this.parentElement.parentElement.remove()" class="text-lg font-bold">×</button>
        </div>
    `;
    
    alertContainer.appendChild(alert);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (alert.parentNode) {
            alert.remove();
        }
    }, 5000);
}

function createAlertContainer() {
    const container = document.createElement('div');
    container.id = 'alert-container';
    container.className = 'fixed top-4 left-4 right-4 z-50 space-y-2';
    document.body.appendChild(container);
    return container;
}

// Smooth Scroll for Anchor Links
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Form Validation
function validateForm(form) {
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            showFieldError(field, 'هذا الحقل مطلوب');
            isValid = false;
        } else {
            clearFieldError(field);
        }
        
        // Email validation
        if (field.type === 'email' && field.value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(field.value)) {
                showFieldError(field, 'البريد الإلكتروني غير صحيح');
                isValid = false;
            }
        }
        
        // Phone validation (Egyptian numbers)
        if (field.type === 'tel' && field.value) {
            const phoneRegex = /^(\+20|0020|20|0)?1[0-9]{9}$/;
            if (!phoneRegex.test(field.value.replace(/\s/g, ''))) {
                showFieldError(field, 'رقم الهاتف غير صحيح');
                isValid = false;
            }
        }
    });
    
    return isValid;
}

function showFieldError(field, message) {
    clearFieldError(field);
    
    field.classList.add('border-red-500');
    const errorDiv = document.createElement('div');
    errorDiv.className = 'field-error text-red-500 text-sm mt-1';
    errorDiv.textContent = message;
    field.parentNode.appendChild(errorDiv);
}

function clearFieldError(field) {
    field.classList.remove('border-red-500');
    const existingError = field.parentNode.querySelector('.field-error');
    if (existingError) {
        existingError.remove();
    }
}

// Initialize all functions when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    handleFileUpload();
    initDragDrop();
    initFAQAccordion();
    initFAQSearch();
    initBlogFilter();
    initSmoothScroll();
    
    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});

// Utility Functions
function formatCurrency(amount) {
    return new Intl.NumberFormat('ar-EG', {
        style: 'currency',
        currency: 'EGP'
    }).format(amount);
}

function formatDate(date) {
    return new Intl.DateTimeFormat('ar-EG', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    }).format(new Date(date));
}

// Loading state for buttons
function setButtonLoading(button, loading = true) {
    if (loading) {
        button.disabled = true;
        button.dataset.originalText = button.textContent;
        button.innerHTML = '<span class="spinner inline-block mr-2"></span> جاري التحميل...';
    } else {
        button.disabled = false;
        button.textContent = button.dataset.originalText || 'إرسال';
    }
}

// WhatsApp Integration
function sendWhatsAppMessage(message) {
    const phoneNumber = '201234567890'; // Replace with actual WhatsApp number
    const encodedMessage = encodeURIComponent(message);
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
    window.open(whatsappUrl, '_blank');
}

// Print functionality
function printPage() {
    window.print();
}

// Share functionality
function shareCurrentPage() {
    if (navigator.share) {
        navigator.share({
            title: document.title,
            url: window.location.href
        });
    } else {
        // Fallback: copy URL to clipboard
        navigator.clipboard.writeText(window.location.href).then(() => {
            showAlert('success', 'تم نسخ الرابط إلى الحافظة');
        });
    }
}

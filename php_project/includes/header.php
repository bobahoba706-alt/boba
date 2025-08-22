<?php
$current_page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<header class="bg-navy-light text-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="<?php echo get_page_url('home'); ?>" class="flex items-center space-x-2 space-x-reverse">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <span class="text-navy-dark font-bold text-xl">تج</span>
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="text-xl font-bold"><?php echo SITE_NAME; ?></h1>
                        <p class="text-xs opacity-90">خدمات متميزة وسرعة في الإنجاز</p>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-8 space-x-reverse">
                <a href="<?php echo get_page_url('home'); ?>" 
                   class="<?php echo ($current_page == 'home') ? 'text-white font-semibold' : 'hover:text-gray-200'; ?> transition-colors font-medium">
                    الرئيسية
                </a>
                <a href="<?php echo get_page_url('about'); ?>" 
                   class="<?php echo ($current_page == 'about') ? 'text-white font-semibold' : 'hover:text-gray-200'; ?> transition-colors font-medium">
                    من نحن
                </a>
                <a href="<?php echo get_page_url('services'); ?>" 
                   class="<?php echo ($current_page == 'services') ? 'text-white font-semibold' : 'hover:text-gray-200'; ?> transition-colors font-medium">
                    خدماتنا
                </a>
                <a href="<?php echo get_page_url('blog'); ?>" 
                   class="<?php echo ($current_page == 'blog') ? 'text-white font-semibold' : 'hover:text-gray-200'; ?> transition-colors font-medium">
                    المدونة
                </a>
                <a href="<?php echo get_page_url('faq'); ?>" 
                   class="<?php echo ($current_page == 'faq') ? 'text-white font-semibold' : 'hover:text-gray-200'; ?> transition-colors font-medium">
                    الأسئلة الشائعة
                </a>
                <a href="<?php echo get_page_url('contact'); ?>" 
                   class="<?php echo ($current_page == 'contact') ? 'text-white font-semibold' : 'hover:text-gray-200'; ?> transition-colors font-medium">
                    اتصل بنا
                </a>
            </nav>

            <!-- Desktop CTA Buttons -->
            <div class="hidden lg:flex items-center space-x-4 space-x-reverse">
                <!-- Language Toggle -->
                <button class="flex items-center space-x-1 space-x-reverse text-sm hover:text-gray-200 transition-colors">
                    <i data-lucide="globe" class="w-4 h-4"></i>
                    <span>العربية</span>
                </button>

                <!-- Client Login -->
                <a href="<?php echo get_page_url('login'); ?>" 
                   class="border-2 border-white text-white hover:bg-white hover:text-navy-light px-4 py-2 rounded-lg transition-all font-medium">
                    دخول العملاء
                </a>

                <!-- Free Consultation CTA -->
                <a href="<?php echo get_page_url('consultation'); ?>" 
                   class="bg-white text-navy-light hover:bg-gray-100 px-4 py-2 rounded-lg transition-all font-semibold flex items-center space-x-2 space-x-reverse">
                    <i data-lucide="phone" class="w-4 h-4"></i>
                    <span>استشارة مجانية</span>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="lg:hidden">
                <button id="mobile-menu-btn" class="p-2 rounded-md hover:bg-navy-hover transition-colors">
                    <i data-lucide="menu" class="w-6 h-6" id="menu-icon"></i>
                    <i data-lucide="x" class="w-6 h-6 hidden" id="close-icon"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="lg:hidden border-t border-navy-medium hidden">
            <div class="py-4 space-y-4">
                <a href="<?php echo get_page_url('home'); ?>" 
                   class="block hover:text-gray-200 transition-colors font-medium <?php echo ($current_page == 'home') ? 'text-white font-semibold' : ''; ?>">
                    الرئيسية
                </a>
                <a href="<?php echo get_page_url('about'); ?>" 
                   class="block hover:text-gray-200 transition-colors font-medium <?php echo ($current_page == 'about') ? 'text-white font-semibold' : ''; ?>">
                    من نحن
                </a>
                <a href="<?php echo get_page_url('services'); ?>" 
                   class="block hover:text-gray-200 transition-colors font-medium <?php echo ($current_page == 'services') ? 'text-white font-semibold' : ''; ?>">
                    خدماتنا
                </a>
                <a href="<?php echo get_page_url('blog'); ?>" 
                   class="block hover:text-gray-200 transition-colors font-medium <?php echo ($current_page == 'blog') ? 'text-white font-semibold' : ''; ?>">
                    المدونة
                </a>
                <a href="<?php echo get_page_url('faq'); ?>" 
                   class="block hover:text-gray-200 transition-colors font-medium <?php echo ($current_page == 'faq') ? 'text-white font-semibold' : ''; ?>">
                    الأسئلة الشائعة
                </a>
                <a href="<?php echo get_page_url('contact'); ?>" 
                   class="block hover:text-gray-200 transition-colors font-medium <?php echo ($current_page == 'contact') ? 'text-white font-semibold' : ''; ?>">
                    اتصل بنا
                </a>
                
                <!-- Mobile CTAs -->
                <div class="pt-4 border-t border-navy-medium space-y-3">
                    <a href="<?php echo get_page_url('login'); ?>" 
                       class="block w-full text-center border-2 border-white text-white hover:bg-white hover:text-navy-light px-4 py-2 rounded-lg transition-all font-medium">
                        دخول العملاء
                    </a>
                    <a href="<?php echo get_page_url('consultation'); ?>" 
                       class="block w-full text-center bg-white text-navy-light hover:bg-gray-100 px-4 py-2 rounded-lg transition-all font-semibold">
                        اطلب استشارة مجانية
                    </a>
                    <button class="flex items-center justify-center w-full space-x-1 space-x-reverse text-sm hover:text-gray-200 transition-colors">
                        <i data-lucide="globe" class="w-4 h-4"></i>
                        <span>تبديل اللغة</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

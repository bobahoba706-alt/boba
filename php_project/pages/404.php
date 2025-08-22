<div class="bg-white min-h-screen flex items-center justify-center">
    <div class="container-custom">
        <div class="max-w-2xl mx-auto text-center">
            <div class="mb-8">
                <h1 class="text-9xl font-bold text-blue-600 mb-4">404</h1>
                <h2 class="text-3xl font-bold text-blue-900 mb-4">
                    الصفحة غير موجودة
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    عذراً، الصفحة التي تبحث عنها غير موجودة أو قد تم نقلها.
                </p>
            </div>
            
            <div class="space-y-4 mb-8">
                <a href="<?php echo get_page_url('home'); ?>" 
                   class="btn-navy inline-flex items-center space-x-2 space-x-reverse">
                    <i data-lucide="home" class="w-5 h-5"></i>
                    <span>العودة للرئيسية</span>
                </a>
                <a href="<?php echo get_page_url('contact'); ?>" 
                   class="btn-navy-outline inline-flex items-center space-x-2 space-x-reverse ml-4">
                    <i data-lucide="mail" class="w-5 h-5"></i>
                    <span>اتصل بنا</span>
                </a>
            </div>
            
            <div class="grid md:grid-cols-3 gap-6 text-right">
                <div>
                    <h3 class="text-lg font-semibold text-blue-900 mb-2">خدماتنا</h3>
                    <ul class="space-y-1 text-gray-600">
                        <li><a href="<?php echo get_page_url('services'); ?>" class="hover:text-blue-600">التخليص البحري</a></li>
                        <li><a href="<?php echo get_page_url('services'); ?>" class="hover:text-blue-600">التخليص الجوي</a></li>
                        <li><a href="<?php echo get_page_url('services'); ?>" class="hover:text-blue-600">التخليص البري</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-blue-900 mb-2">معلومات مفيدة</h3>
                    <ul class="space-y-1 text-gray-600">
                        <li><a href="<?php echo get_page_url('faq'); ?>" class="hover:text-blue-600">الأسئلة الشائعة</a></li>
                        <li><a href="<?php echo get_page_url('blog'); ?>" class="hover:text-blue-600">المدونة</a></li>
                        <li><a href="<?php echo get_page_url('about'); ?>" class="hover:text-blue-600">من نحن</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-blue-900 mb-2">تواصل معنا</h3>
                    <ul class="space-y-1 text-gray-600">
                        <li>الهاتف: <?php echo SITE_PHONE; ?></li>
                        <li>البريد: <?php echo SITE_EMAIL; ?></li>
                        <li>واتساب: <?php echo SITE_WHATSAPP; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

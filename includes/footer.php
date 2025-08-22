<footer class="bg-navy-light text-white">
    <!-- Main Footer Content -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="space-y-4">
                <div class="flex items-center space-x-2 space-x-reverse">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <span class="text-navy-dark font-bold text-xl">تج</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold"><?php echo SITE_NAME; ?></h3>
                        <p class="text-sm opacity-90">خدمات متميزة وسرعة في الإنجاز</p>
                    </div>
                </div>
                <p class="text-gray-200 leading-relaxed">
                    شركة رائدة في مجال التخليص الجمركي والاستشارات الجمركية في مصر، 
                    نقدم خدمات متميزة مع فريق من الخبراء المتخصصين.
                </p>
                <!-- Social Media -->
                <div class="flex space-x-4 space-x-reverse">
                    <a href="#" class="w-10 h-10 bg-navy-hover rounded-lg flex items-center justify-center hover:bg-white hover:text-navy-light transition-all">
                        <i data-lucide="facebook" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-navy-hover rounded-lg flex items-center justify-center hover:bg-white hover:text-navy-light transition-all">
                        <i data-lucide="linkedin" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-navy-hover rounded-lg flex items-center justify-center hover:bg-white hover:text-navy-light transition-all">
                        <i data-lucide="twitter" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4">روابط سريعة</h4>
                <ul class="space-y-2">
                    <li>
                        <a href="<?php echo get_page_url('home'); ?>" class="text-gray-200 hover:text-white transition-colors">
                            الرئيسية
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_page_url('about'); ?>" class="text-gray-200 hover:text-white transition-colors">
                            من نحن
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_page_url('services'); ?>" class="text-gray-200 hover:text-white transition-colors">
                            خدماتنا
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_page_url('blog'); ?>" class="text-gray-200 hover:text-white transition-colors">
                            المدونة
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_page_url('faq'); ?>" class="text-gray-200 hover:text-white transition-colors">
                            الأسئلة الشائعة
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_page_url('contact'); ?>" class="text-gray-200 hover:text-white transition-colors">
                            اتصل بنا
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h4 class="text-lg font-semibold mb-4">خدماتنا</h4>
                <ul class="space-y-2">
                    <li>
                        <a href="<?php echo get_page_url('services', ['type' => 'sea']); ?>" class="text-gray-200 hover:text-white transition-colors">
                            التخليص البحري
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_page_url('services', ['type' => 'air']); ?>" class="text-gray-200 hover:text-white transition-colors">
                            التخليص الجوي
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_page_url('services', ['type' => 'land']); ?>" class="text-gray-200 hover:text-white transition-colors">
                            التخليص البري
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_page_url('services', ['type' => 'consultation']); ?>" class="text-gray-200 hover:text-white transition-colors">
                            الاستشارات الجمركية
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_page_url('services', ['type' => 'free-zones']); ?>" class="text-gray-200 hover:text-white transition-colors">
                            المناطق الحرة
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_page_url('services', ['type' => 'import-export']); ?>" class="text-gray-200 hover:text-white transition-colors">
                            تخليص وارد وصادر
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold mb-4">بيانات الاتصال</h4>
                <div class="space-y-3">
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i data-lucide="phone" class="w-5 h-5 text-gray-300 mt-1 flex-shrink-0"></i>
                        <div>
                            <p class="text-gray-200"><?php echo SITE_PHONE; ?></p>
                            <p class="text-gray-200">+20 12 3456 7890</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i data-lucide="mail" class="w-5 h-5 text-gray-300 mt-1 flex-shrink-0"></i>
                        <div>
                            <p class="text-gray-200"><?php echo SITE_EMAIL; ?></p>
                            <p class="text-gray-200">support@customsclearance.com</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i data-lucide="map-pin" class="w-5 h-5 text-gray-300 mt-1 flex-shrink-0"></i>
                        <p class="text-gray-200">
                            القاهرة، مصر<br>
                            ميناء الإسكندرية<br>
                            ميناء السويس
                        </p>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i data-lucide="clock" class="w-5 h-5 text-gray-300 mt-1 flex-shrink-0"></i>
                        <div>
                            <p class="text-gray-200">الأحد - الخميس: 9:00 ص - 6:00 م</p>
                            <p class="text-gray-200">الجمعة - السبت: 10:00 ص - 4:00 م</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Footer -->
    <div class="border-t border-navy-medium">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="text-center md:text-right">
                    <p class="text-gray-200">
                        © <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. جميع الحقوق محفوظة.
                    </p>
                </div>
                <div class="flex space-x-6 space-x-reverse text-sm">
                    <a href="<?php echo get_page_url('privacy'); ?>" class="text-gray-200 hover:text-white transition-colors">
                        سياسة الخصوصية
                    </a>
                    <a href="<?php echo get_page_url('terms'); ?>" class="text-gray-200 hover:text-white transition-colors">
                        الشروط والأحكام
                    </a>
                    <a href="<?php echo get_page_url('legal'); ?>" class="text-gray-200 hover:text-white transition-colors">
                        التنويه القانوني
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

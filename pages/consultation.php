<div class="bg-white min-h-screen flex items-center justify-center">
    <div class="container-custom py-16">
        <div class="max-w-2xl mx-auto text-center">
            <div class="w-24 h-24 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-8">
                <i data-lucide="phone" class="w-12 h-12 text-white"></i>
            </div>
            
            <h1 class="text-4xl font-bold text-blue-900 mb-6">
                استشارة مجانية
            </h1>
            
            <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                احصل على استشارة مجانية من خبراء التخليص الجمركي المعتمدين
            </p>
            
            <div class="bg-gray-50 rounded-xl p-8 mb-8">
                <h2 class="text-2xl font-semibold text-blue-900 mb-6">ما ستحصل عليه:</h2>
                <div class="grid md:grid-cols-2 gap-6 text-right">
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i data-lucide="check-circle" class="w-6 h-6 text-green-500 mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-blue-900">تقييم مجاني لاحتياجاتك</h3>
                            <p class="text-gray-600">تحليل شامل لمتطلبات التخليص الخاصة بك</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i data-lucide="check-circle" class="w-6 h-6 text-green-500 mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-blue-900">نصائح من الخبراء</h3>
                            <p class="text-gray-600">إرشادات عملية لتسريع عملية التخليص</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i data-lucide="check-circle" class="w-6 h-6 text-green-500 mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-blue-900">توضيح المستندات المطلوبة</h3>
                            <p class="text-gray-600">قائمة كاملة بالأوراق والوثائق المطلوبة</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i data-lucide="check-circle" class="w-6 h-6 text-green-500 mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-blue-900">تقدير مبدئي للتكاليف</h3>
                            <p class="text-gray-600">فكرة واضحة عن الرسوم المتوقعة</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="space-y-4">
                <h2 class="text-xl font-semibold text-blue-900">اختر طريقة التواصل المفضلة:</h2>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="tel:<?php echo str_replace(' ', '', SITE_PHONE); ?>" 
                       class="btn-navy flex items-center justify-center space-x-2 space-x-reverse">
                        <i data-lucide="phone" class="w-5 h-5"></i>
                        <span>اتصل الآن</span>
                    </a>
                    <a href="https://wa.me/<?php echo str_replace(['+', ' '], '', SITE_WHATSAPP); ?>" 
                       class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded-lg transition-colors flex items-center justify-center space-x-2 space-x-reverse">
                        <i data-lucide="message-circle" class="w-5 h-5"></i>
                        <span>واتساب</span>
                    </a>
                    <a href="<?php echo get_page_url('contact'); ?>" 
                       class="btn-navy-outline flex items-center justify-center space-x-2 space-x-reverse">
                        <i data-lucide="mail" class="w-5 h-5"></i>
                        <span>نموذج طلب</span>
                    </a>
                </div>
            </div>
            
            <div class="mt-8 p-4 bg-blue-100 rounded-lg">
                <p class="text-blue-900 font-medium">
                    <i data-lucide="clock" class="w-5 h-5 inline ml-2"></i>
                    متاح 24/7 للاستشارات العاجلة
                </p>
            </div>
        </div>
    </div>
</div>

<div class="bg-gray-50 min-h-screen flex items-center justify-center py-12">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg">
        <div>
            <div class="flex justify-center">
                <div class="w-16 h-16 bg-blue-600 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-2xl">تج</span>
                </div>
            </div>
            <h2 class="mt-6 text-center text-3xl font-bold text-blue-900">
                دخول العملاء
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                تسجيل الدخول لمتابعة حالة الشحنات والحصول على التقارير
            </p>
        </div>
        
        <form class="mt-8 space-y-6" method="POST">
            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        البريد الإلكتروني
                    </label>
                    <input id="email" name="email" type="email" required 
                           class="form-input" placeholder="example@email.com" style="direction: ltr;">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        كلمة المرور
                    </label>
                    <input id="password" name="password" type="password" required 
                           class="form-input" placeholder="كلمة المرور">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" 
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember-me" class="mr-2 block text-sm text-gray-900">
                        تذكرني
                    </label>
                </div>

                <div class="text-sm">
                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                        نسيت كلمة المرور؟
                    </a>
                </div>
            </div>

            <div>
                <button type="submit" class="btn-navy w-full">
                    تسجيل الدخول
                </button>
            </div>
            
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    ليس لديك حساب؟ 
                    <a href="<?php echo get_page_url('contact'); ?>" class="font-medium text-blue-600 hover:text-blue-500">
                        تواصل معنا لإنشاء حساب
                    </a>
                </p>
            </div>
        </form>
        
        <div class="mt-6 p-4 bg-blue-50 rounded-lg">
            <h3 class="text-sm font-medium text-blue-900 mb-2">ما يمكنك فعله بعد تسجيل الدخول:</h3>
            <ul class="text-sm text-blue-800 space-y-1">
                <li>• متابعة حالة الشحنات في الوقت الفعلي</li>
                <li>• تحميل التقارير والمستندات</li>
                <li>• عرض تاريخ العمليات السابقة</li>
                <li>• التواصل المباشر مع فريق خدمة العملاء</li>
            </ul>
        </div>
    </div>
</div>

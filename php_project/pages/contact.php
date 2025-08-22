<?php
$success = isset($_GET['success']) && $_GET['success'] == '1';

if ($success) {
    // عرض صفحة النجاح
    include 'contact_success.php';
    return;
}
?>

<div class="bg-white">
    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-16">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4">
                    اتصل بنا / اطلب عرض سعر
                </h1>
                <p class="text-xl text-gray-200 mb-8">
                    تواصل معنا للحصول على عرض سعر مخصص وتفصيلي لجميع احتياجاتك في التخليص الجمركي
                </p>
            </div>
        </div>
    </section>

    <div class="section-spacing">
        <div class="container-custom">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <h2 class="text-3xl font-bold text-blue-900 mb-6">
                            نموذج طلب عرض السعر
                        </h2>
                        <p class="text-gray-600 mb-8">
                            املأ النموذج التالي بأكبر قدر من التفاصيل للحصول على عرض سعر دقيق ومناسب
                        </p>

                        <form id="contact-form" method="POST" action="handlers/contact_handler.php" enctype="multipart/form-data" class="space-y-8">
                            <!-- Personal Information -->
                            <div>
                                <h3 class="text-xl font-semibold text-blue-900 mb-4">البيانات الأساسية</h3>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2">
                                            الاسم الكامل <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" name="fullName" required 
                                               class="form-input" placeholder="أدخل اسمك الكامل">
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2">
                                            اسم الشركة
                                        </label>
                                        <input type="text" name="company" 
                                               class="form-input" placeholder="اسم الشركة أو المؤسسة">
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2">
                                            رقم الموبايل (مصر) <span class="text-red-500">*</span>
                                        </label>
                                        <input type="tel" name="phone" required 
                                               class="form-input" placeholder="+20 10 1234 5678">
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2">
                                            البريد الإلكتروني <span class="text-red-500">*</span>
                                        </label>
                                        <input type="email" name="email" required 
                                               class="form-input" placeholder="example@email.com" style="direction: ltr;">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-gray-700 font-medium mb-2">
                                            مدينة/ميناء الوصول <span class="text-red-500">*</span>
                                        </label>
                                        <select name="city" required class="form-select">
                                            <option value="">اختر المدينة أو ��لميناء</option>
                                            <option value="ميناء الإسكندرية">ميناء الإسكندرية</option>
                                            <option value="ميناء السويس">ميناء السويس</option>
                                            <option value="ميناء دمياط">ميناء دمياط</option>
                                            <option value="ميناء سفاجا">ميناء سفاجا</option>
                                            <option value="مطار القاهرة">مطار القاهرة الدولي</option>
                                            <option value="مطار برج العرب">مطار برج العرب</option>
                                            <option value="منفذ رفح">منفذ رفح البري</option>
                                            <option value="منفذ طابا">منفذ طابا البري</option>
                                            <option value="منفذ السلوم">منفذ السلوم البري</option>
                                            <option value="أخرى">أخرى</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Operation Details -->
                            <div>
                                <h3 class="text-xl font-semibold text-blue-900 mb-4">تفاصيل العملية</h3>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2">
                                            نوع العملية <span class="text-red-500">*</span>
                                        </label>
                                        <select name="operationType" required class="form-select">
                                            <option value="">اختر نوع العملية</option>
                                            <option value="وارد">وارد (استيراد)</option>
                                            <option value="صادر">صادر (تصدير)</option>
                                            <option value="ترانزيت">ترانزيت</option>
                                            <option value="منطقة حرة">منطقة حرة</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2">
                                            وسيلة النقل <span class="text-red-500">*</span>
                                        </label>
                                        <select name="transportMethod" required class="form-select">
                                            <option value="">اختر وسيلة النقل</option>
                                            <option value="بحري">بحري (Sea Freight)</option>
                                            <option value="جوي">جوي (Air Freight)</option>
                                            <option value="بري">بري (Land Freight)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Cargo Details -->
                            <div>
                                <h3 class="text-xl font-semibold text-blue-900 mb-4">تفاصيل الشحنة</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2">
                                            وصف البضاعة <span class="text-red-500">*</span>
                                        </label>
                                        <textarea name="cargoDescription" required rows="3" 
                                                  class="form-textarea" 
                                                  placeholder="اكتب وصفًا مفصلاً للبضاعة (نوع البضاعة، المواد، الاستخدام...)"></textarea>
                                    </div>
                                    <div class="grid md:grid-cols-3 gap-4">
                                        <div>
                                            <label class="block text-gray-700 font-medium mb-2">
                                                الوزن الإجمالي (كجم)
                                            </label>
                                            <input type="number" name="weight" 
                                                   class="form-input" placeholder="1000">
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 font-medium mb-2">
                                                الحجم (متر مكعب)
                                            </label>
                                            <input type="number" name="volume" step="0.1" 
                                                   class="form-input" placeholder="10.5">
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 font-medium mb-2">
                                                عدد الطرود/الحاويات
                                            </label>
                                            <input type="number" name="packages" 
                                                   class="form-input" placeholder="1">
                                        </div>
                                    </div>
                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-gray-700 font-medium mb-2">
                                                القيمة التقريبية (جنيه مصري)
                                            </label>
                                            <input type="number" name="value" 
                                                   class="form-input" placeholder="100000">
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 font-medium mb-2">
                                                إنكوترمز (اختياري)
                                            </label>
                                            <select name="incoterms" class="form-select">
                                                <option value="">اختر إنكوترمز</option>
                                                <option value="FOB">FOB - Free On Board</option>
                                                <option value="CIF">CIF - Cost, Insurance & Freight</option>
                                                <option value="CFR">CFR - Cost & Freight</option>
                                                <option value="EXW">EXW - Ex Works</option>
                                                <option value="FCA">FCA - Free Carrier</option>
                                                <option value="DAP">DAP - Delivered at Place</option>
                                                <option value="DDP">DDP - Delivered Duty Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2">
                                            HS Code (اختياري)
                                        </label>
                                        <input type="text" name="hsCode" 
                                               class="form-input" placeholder="1234.56.78" style="direction: ltr;">
                                    </div>
                                </div>
                            </div>

                            <!-- File Upload -->
                            <div>
                                <h3 class="text-xl font-semibold text-blue-900 mb-4">المرفقات (إن وجدت)</h3>
                                <div id="drop-zone" 
                                     class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center transition-colors hover:border-blue-400 hover:bg-blue-50">
                                    <i data-lucide="upload" class="w-12 h-12 mx-auto mb-4 text-gray-400"></i>
                                    <p class="text-gray-600 mb-4">
                                        اسحب الملفات هنا أو اضغط لاختيار الملفات
                                    </p>
                                    <input type="file" multiple accept=".pdf,.jpg,.jpeg,.png,.docx,.xlsx" 
                                           id="file-upload" name="files[]" class="hidden">
                                    <label for="file-upload" class="btn-navy-outline cursor-pointer inline-block">
                                        اختيار الملفات
                                    </label>
                                    <p class="text-sm text-gray-500 mt-2">
                                        يمكن رفع: PDF, JPG, PNG, DOCX, XLSX (حد أقصى 20MB/ملف)
                                    </p>
                                </div>
                                <div id="file-list" class="mt-4"></div>
                            </div>

                            <!-- Contact Preference -->
                            <div>
                                <h3 class="text-xl font-semibold text-blue-900 mb-4">تفضيل التواصل</h3>
                                <div class="space-y-3">
                                    <label class="flex items-center space-x-3 space-x-reverse cursor-pointer">
                                        <input type="radio" name="contactPreference" value="phone" class="text-blue-600">
                                        <i data-lucide="phone" class="w-5 h-5 text-blue-600"></i>
                                        <span>مكالمة هاتفية</span>
                                    </label>
                                    <label class="flex items-center space-x-3 space-x-reverse cursor-pointer">
                                        <input type="radio" name="contactPreference" value="whatsapp" class="text-blue-600">
                                        <i data-lucide="message-circle" class="w-5 h-5 text-blue-600"></i>
                                        <span>واتساب</span>
                                    </label>
                                    <label class="flex items-center space-x-3 space-x-reverse cursor-pointer">
                                        <input type="radio" name="contactPreference" value="email" class="text-blue-600">
                                        <i data-lucide="mail" class="w-5 h-5 text-blue-600"></i>
                                        <span>بريد إلكتروني</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Privacy Agreement -->
                            <div class="bg-gray-100 rounded-lg p-4">
                                <label class="flex items-start space-x-3 space-x-reverse cursor-pointer">
                                    <input type="checkbox" name="privacyAgreement" required class="mt-1 text-blue-600">
                                    <span class="text-sm text-gray-700">
                                        أوافق على <a href="<?php echo get_page_url('privacy'); ?>" class="text-blue-600 hover:underline">سياسة الخصوصية</a> و
                                        <a href="<?php echo get_page_url('terms'); ?>" class="text-blue-600 hover:underline"> شروط الاستخدام</a>
                                        وأسمح للشركة بالتواصل معي لتقديم عرض السعر المطلوب.
                                    </span>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn-navy text-lg px-8 py-4">
                                    إرسال طلب عرض السعر
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Information Sidebar -->
                <div class="space-y-8">
                    <!-- Contact Details -->
                    <div class="bg-blue-600 text-white rounded-xl p-6">
                        <h3 class="text-xl font-bold mb-6">بيانات التواصل</h3>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3 space-x-reverse">
                                <i data-lucide="phone" class="w-5 h-5 mt-1 flex-shrink-0"></i>
                                <div>
                                    <p class="font-medium">هاتف المكتب</p>
                                    <p class="text-gray-200"><?php echo SITE_PHONE; ?></p>
                                    <p class="text-gray-200">+20 12 3456 7890</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 space-x-reverse">
                                <i data-lucide="message-circle" class="w-5 h-5 mt-1 flex-shrink-0"></i>
                                <div>
                                    <p class="font-medium">واتساب</p>
                                    <p class="text-gray-200"><?php echo SITE_WHATSAPP; ?></p>
                                    <p class="text-sm text-gray-200">متاح 24/7</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 space-x-reverse">
                                <i data-lucide="mail" class="w-5 h-5 mt-1 flex-shrink-0"></i>
                                <div>
                                    <p class="font-medium">البريد الإلكتروني</p>
                                    <p class="text-gray-200"><?php echo SITE_EMAIL; ?></p>
                                    <p class="text-gray-200">quote@customsclearance.com</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 space-x-reverse">
                                <i data-lucide="map-pin" class="w-5 h-5 mt-1 flex-shrink-0"></i>
                                <div>
                                    <p class="font-medium">العنوان</p>
                                    <p class="text-gray-200">القاهرة، مصر</p>
                                    <p class="text-gray-200">مكاتب في الإسكندرية والسويس</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 space-x-reverse">
                                <i data-lucide="clock" class="w-5 h-5 mt-1 flex-shrink-0"></i>
                                <div>
                                    <p class="font-medium">ساعات العمل</p>
                                    <p class="text-gray-200">الأحد - الخميس: 9:00 ص - 6:00 م</p>
                                    <p class="text-gray-200">الجمعة - السبت: 10:00 ص - 4:00 م</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h3 class="text-xl font-semibold text-blue-900 mb-4">تواصل سريع</h3>
                        <div class="space-y-3">
                            <a href="tel:<?php echo str_replace(' ', '', SITE_PHONE); ?>" 
                               class="w-full btn-navy-outline text-center flex items-center justify-center space-x-2 space-x-reverse">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                                <span>اتصل الآن</span>
                            </a>
                            <a href="https://wa.me/<?php echo str_replace(['+', ' '], '', SITE_WHATSAPP); ?>" 
                               class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-3 rounded-lg transition-colors flex items-center justify-center space-x-2 space-x-reverse">
                                <i data-lucide="message-circle" class="w-4 h-4"></i>
                                <span>واتساب</span>
                            </a>
                            <a href="mailto:<?php echo SITE_EMAIL; ?>" 
                               class="w-full btn-navy-outline text-center flex items-center justify-center space-x-2 space-x-reverse">
                                <i data-lucide="mail" class="w-4 h-4"></i>
                                <span>بريد إلكتروني</span>
                            </a>
                        </div>
                    </div>

                    <!-- Service Areas -->
                    <div class="bg-white border border-gray-200 rounded-xl p-6">
                        <h3 class="text-xl font-semibold text-blue-900 mb-4">مناطق خدماتنا</h3>
                        <ul class="space-y-2 text-sm">
                            <li class="flex items-center space-x-2 space-x-reverse">
                                <i data-lucide="check-circle" class="w-4 h-4 text-green-500"></i>
                                <span>ميناء الإسكندرية</span>
                            </li>
                            <li class="flex items-center space-x-2 space-x-reverse">
                                <i data-lucide="check-circle" class="w-4 h-4 text-green-500"></i>
                                <span>ميناء السويس</span>
                            </li>
                            <li class="flex items-center space-x-2 space-x-reverse">
                                <i data-lucide="check-circle" class="w-4 h-4 text-green-500"></i>
                                <span>ميناء دمياط</span>
                            </li>
                            <li class="flex items-center space-x-2 space-x-reverse">
                                <i data-lucide="check-circle" class="w-4 h-4 text-green-500"></i>
                                <span>مطار القاهرة الدولي</span>
                            </li>
                            <li class="flex items-center space-x-2 space-x-reverse">
                                <i data-lucide="check-circle" class="w-4 h-4 text-green-500"></i>
                                <span>المنافذ البرية</span>
                            </li>
                            <li class="flex items-center space-x-2 space-x-reverse">
                                <i data-lucide="check-circle" class="w-4 h-4 text-green-500"></i>
                                <span>المناطق الحرة</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

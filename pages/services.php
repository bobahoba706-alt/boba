<?php
// بيانات الخدمات الرئيسية
$mainServices = [
    [
        'id' => 'sea-freight',
        'icon' => 'ship',
        'title' => 'التخليص البحري',
        'subtitle' => 'Sea Freight Clearance',
        'description' => 'خدمات تخليص جمركي شاملة للشحن البحري عبر جميع الموانئ المصرية مع ضمان السرعة والدقة',
        'features' => [
            'تخليص الحاويات الكاملة FCL',
            'تخليص الشحنات المجمعة LCL',
            'التعامل مع البضائع الكبيرة والثقيلة',
            'خدمات الفحص والمعاينة'
        ],
        'ports' => ['ميناء الإسكندرية', 'ميناء السويس', 'ميناء دمياط', 'ميناء سفاجا'],
        'averageTime' => '3-5 أيام',
        'specialties' => ['المواد الخام', 'الآلات الثقيلة', 'السيارات', 'المنتجات الصناعية'],
        'bgColor' => 'bg-blue-50',
        'iconColor' => 'text-blue-600'
    ],
    [
        'id' => 'air-freight',
        'icon' => 'plane',
        'title' => 'التخليص الجوي',
        'subtitle' => 'Air Freight Clearance',
        'description' => 'تخليص سريع ودقيق للبضائع المستوردة والمصدرة عبر المطارات مع أولوية للشحنات العاجلة',
        'features' => [
            'تخليص الشحن السريع Express',
            'البضائع القابلة للتلف',
            'الشحنات عالية القيمة',
            'خدمة 24 ساعة للطوارئ'
        ],
        'ports' => ['مطار القاهرة الدولي', 'مطار برج العرب', 'مطار شرم الشيخ', 'مطار أسوان'],
        'averageTime' => '24-48 ساعة',
        'specialties' => ['الإلكترونيات', 'الأدوية', 'المجوهرات', 'قطع الغيار'],
        'bgColor' => 'bg-sky-50',
        'iconColor' => 'text-sky-600'
    ],
    [
        'id' => 'land-freight',
        'icon' => 'truck',
        'title' => 'التخليص البري',
        'subtitle' => 'Land Freight Clearance',
        'description' => 'خدمات التخليص الجمركي للشحن البري عبر المنافذ الحدودية مع التركيز على التجارة العربية',
        'features' => [
            'تخليص الشاحنات والمقطورات',
            'النقل المبرد والخاص',
            'البضائع الخطرة المرخصة',
            'التنسيق مع الدول المجاورة'
        ],
        'ports' => ['منفذ رفح', 'منفذ طابا', 'منفذ السلوم', 'منفذ قسطل'],
        'averageTime' => '1-2 يوم',
        'specialties' => ['المنتجات الزراعية', 'مواد البناء', 'المنسوجات', 'الوقود'],
        'bgColor' => 'bg-green-50',
        'iconColor' => 'text-green-600'
    ],
    [
        'id' => 'consultation',
        'icon' => 'file-text',
        'title' => 'الاستشارات الجمركية',
        'subtitle' => 'Customs Consultation',
        'description' => 'استشارات متخصصة في القوانين والإجراءات الجمركية لضمان الامتثال وتجنب المشاكل',
        'features' => [
            'تصنيف البضائع HS Code',
            'حساب الرسوم والضرائب',
            'مراجعة المستندات',
            'التدريب والتأهيل'
        ],
        'ports' => ['جميع المواقع', 'استشارات عن بُعد', 'زيارات ميدانية', 'ورش عمل'],
        'averageTime' => 'فوري - أسبوع',
        'specialties' => ['القوانين الجمركية', 'اتفاقيات التجارة', 'النزاعات الجمركية', 'التخطيط الضريبي'],
        'bgColor' => 'bg-purple-50',
        'iconColor' => 'text-purple-600'
    ],
    [
        'id' => 'free-zones',
        'icon' => 'globe',
        'title' => 'المناطق الحرة',
        'subtitle' => 'Free Zones Services',
        'description' => 'خدمات متخصصة للتعامل مع المناطق الحرة والاستثمارية مع فهم عميق للقوانين الخاصة',
        'features' => [
            'الإدخال والإخراج',
            'التخزين والتصنيع',
            'إعادة التصدير',
            'التحويل للسوق المحلي'
        ],
        'ports' => ['منطقة السويس الحرة', 'منطقة الإسكندرية', 'منطقة القاهرة', 'منطقة دمياط'],
        'averageTime' => '2-4 أيام',
        'specialties' => ['التصنيع', 'التجميع', 'التوزيع', 'الخدمات اللوجستية'],
        'bgColor' => 'bg-indigo-50',
        'iconColor' => 'text-indigo-600'
    ],
    [
        'id' => 'import-export',
        'icon' => 'check-circle',
        'title' => 'تخليص وارد وصادر',
        'subtitle' => 'Import & Export Clearance',
        'description' => 'خدمات شاملة للواردات والصادرات مع متابعة دقيقة لجميع مراحل العملية من البداية للنهاية',
        'features' => [
            'إجراءات الاستيراد الكاملة',
            'تسهيل الصادرات',
            'ترانزيت البضائع',
            'الشحن متعدد الوسائط'
        ],
        'ports' => ['جميع المنافذ', 'خدمة متكاملة', 'متابعة شاملة', 'تقارير دورية'],
        'averageTime' => 'حسب نوع البضاعة',
        'specialties' => ['جميع أنواع البضائع', 'التجارة الدولية', 'اللوجستيات', 'إدارة سلسلة التوريد'],
        'bgColor' => 'bg-emerald-50',
        'iconColor' => 'text-emerald-600'
    ]
];

// الخدمات الإضافية
$additionalServices = [
    [
        'icon' => 'shield',
        'title' => 'التأمين على البضائع',
        'description' => 'تأمين شامل على البضائع أثناء عمليات التخليص والنقل'
    ],
    [
        'icon' => 'file-text',
        'title' => 'إعداد المستندات',
        'description' => 'إعداد وتجهيز جميع المستندات المطلوبة للتخليص الجمركي'
    ],
    [
        'icon' => 'zap',
        'title' => 'التخليص السريع',
        'description' => 'خدمة تخليص عاجل للشحنات الحساسة والطارئة'
    ],
    [
        'icon' => 'map-pin',
        'title' => 'تتبع الشحنات',
        'description' => 'نظام تتبع متقدم لمعرفة موقع وحالة شحنتك في كل وقت'
    ]
];

// مراحل العملية
$processSteps = [
    [
        'step' => '01',
        'title' => 'استلام الطلب',
        'description' => 'تقديم طلب التخليص مع المستندات الأولية'
    ],
    [
        'step' => '02',
        'title' => 'مراجعة المستندات',
        'description' => 'فحص وتدقيق جميع المستندات والأوراق المطلوبة'
    ],
    [
        'step' => '03',
        'title' => 'الت��ديم للجمارك',
        'description' => 'تقديم الإقرار الجمركي والمتابعة مع الجهات المختصة'
    ],
    [
        'step' => '04',
        'title' => 'الفحص والمعاينة',
        'description' => 'تسهيل عملية الفحص الجمركي وحل أي مشاكل'
    ],
    [
        'step' => '05',
        'title' => 'دفع الرسوم',
        'description' => 'حساب ودفع جميع الرسوم والضرائب المستحقة'
    ],
    [
        'step' => '06',
        'title' => 'الإفراج والتسليم',
        'description' => 'الحصول على الإفراج وتسليم البضائع للعميل'
    ]
];
?>

<div class="bg-white">
    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-16">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4">
                    خدماتنا المتميزة
                </h1>
                <p class="text-xl text-gray-200 mb-8">
                    مجموعة شاملة من خدمات التخليص الجمركي والاستشارات المتخصصة لتلبية جميع احتياجاتكم التجارية
                </p>
                <div class="grid md:grid-cols-3 gap-6 mt-12">
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6">
                        <i data-lucide="clock" class="w-12 h-12 mx-auto mb-4 text-gray-200"></i>
                        <h3 class="text-lg font-semibold mb-2">سرعة في التنفيذ</h3>
                        <p class="text-gray-200">أسرع أوقات التخليص في السوق</p>
                    </div>
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6">
                        <i data-lucide="shield" class="w-12 h-12 mx-auto mb-4 text-gray-200"></i>
                        <h3 class="text-lg font-semibold mb-2">أمان وضمان</h3>
                        <p class="text-gray-200">ضمانات شاملة على جميع العمليات</p>
                    </div>
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6">
                        <i data-lucide="star" class="w-12 h-12 mx-auto mb-4 text-gray-200"></i>
                        <h3 class="text-lg font-semibold mb-2">جودة متميزة</h3>
                        <p class="text-gray-200">معايير عالية في الخدمة والدقة</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Services -->
    <section class="section-spacing">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-900 mb-4">
                    خدماتنا الرئيسية
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    نقدم خدمات متكاملة في جميع مجالات التخليص الجمركي
                </p>
            </div>
            
            <div class="space-y-12">
                <?php foreach($mainServices as $index => $service): ?>
                    <?php $isEven = $index % 2 === 0; ?>
                    <div class="grid lg:grid-cols-2 gap-12 items-center <?php echo !$isEven ? 'lg:grid-flow-col-dense' : ''; ?>">
                        <div class="<?php echo $isEven ? 'lg:order-1' : 'lg:order-2'; ?>">
                            <div class="<?php echo $service['bgColor']; ?> rounded-2xl p-8 h-full flex items-center justify-center">
                                <i data-lucide="<?php echo $service['icon']; ?>" class="w-32 h-32 <?php echo $service['iconColor']; ?>"></i>
                            </div>
                        </div>
                        
                        <div class="<?php echo $isEven ? 'lg:order-2' : 'lg:order-1'; ?>">
                            <div class="flex items-center space-x-3 space-x-reverse mb-4">
                                <div class="w-12 h-12 <?php echo $service['bgColor']; ?> rounded-lg flex items-center justify-center">
                                    <i data-lucide="<?php echo $service['icon']; ?>" class="w-6 h-6 <?php echo $service['iconColor']; ?>"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-blue-900"><?php echo $service['title']; ?></h3>
                                    <p class="text-sm text-gray-600"><?php echo $service['subtitle']; ?></p>
                                </div>
                            </div>
                            
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                <?php echo $service['description']; ?>
                            </p>
                            
                            <div class="grid md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <h4 class="font-semibold text-blue-900 mb-3">المميزات الرئيسية:</h4>
                                    <ul class="space-y-2">
                                        <?php foreach($service['features'] as $feature): ?>
                                            <li class="flex items-center space-x-2 space-x-reverse text-sm">
                                                <i data-lucide="check-circle" class="w-4 h-4 text-green-500 flex-shrink-0"></i>
                                                <span><?php echo $feature; ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                
                                <div>
                                    <h4 class="font-semibold text-blue-900 mb-3">نطاق التغطية:</h4>
                                    <ul class="space-y-2">
                                        <?php foreach(array_slice($service['ports'], 0, 4) as $port): ?>
                                            <li class="flex items-center space-x-2 space-x-reverse text-sm">
                                                <i data-lucide="map-pin" class="w-4 h-4 text-blue-600 flex-shrink-0"></i>
                                                <span><?php echo $port; ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 rounded-lg p-4 mb-6">
                                <div class="grid grid-cols-2 gap-4 text-center">
                                    <div>
                                        <i data-lucide="clock" class="w-6 h-6 mx-auto mb-2 text-blue-600"></i>
                                        <p class="text-sm font-medium text-blue-900">متوسط وقت التخليص</p>
                                        <p class="text-lg font-bold text-blue-600"><?php echo $service['averageTime']; ?></p>
                                    </div>
                                    <div>
                                        <i data-lucide="star" class="w-6 h-6 mx-auto mb-2 text-blue-600"></i>
                                        <p class="text-sm font-medium text-blue-900">التخصصات الرئيسية</p>
                                        <p class="text-sm text-gray-600"><?php echo implode(', ', array_slice($service['specialties'], 0, 2)); ?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex space-x-4 space-x-reverse">
                                <a href="<?php echo get_page_url('contact'); ?>" 
                                   class="btn-navy flex items-center space-x-2 space-x-reverse">
                                    <span>اطلب عرض سعر</span>
                                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                                </a>
                                <a href="<?php echo get_page_url('consultation'); ?>" 
                                   class="btn-navy-outline">
                                    استشارة مجانية
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Additional Services -->
    <section class="bg-gray-50 section-spacing">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-900 mb-4">
                    خدمات إضافية
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    خدمات مساندة لضمان تجربة متكاملة وسلسة
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach($additionalServices as $service): ?>
                    <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow text-center">
                        <div class="w-14 h-14 bg-blue-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="<?php echo $service['icon']; ?>" class="w-7 h-7 text-white"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-blue-900 mb-2">
                            <?php echo $service['title']; ?>
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            <?php echo $service['description']; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Process Steps -->
    <section class="section-spacing">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-900 mb-4">
                    مراحل عمل��ة التخليص
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    خطوات واضحة ومنظمة لضمان سير العمل بكفاءة عالية
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($processSteps as $index => $step): ?>
                    <div class="relative">
                        <div class="flex items-start space-x-4 space-x-reverse">
                            <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-white font-bold text-lg"><?php echo $step['step']; ?></span>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-semibold text-blue-900 mb-2">
                                    <?php echo $step['title']; ?>
                                </h3>
                                <p class="text-gray-600 leading-relaxed">
                                    <?php echo $step['description']; ?>
                                </p>
                            </div>
                        </div>
                        <?php if($index < count($processSteps) - 1): ?>
                            <div class="hidden lg:block absolute top-8 left-full w-8 h-0.5 bg-gray-300 -translate-x-4"></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-blue-900 text-white section-spacing">
        <div class="container-custom text-center">
            <h2 class="text-3xl font-bold mb-4">
                جاهز لبدء خدمة التخليص الجمركي؟
            </h2>
            <p class="text-xl text-gray-200 mb-8 max-w-3xl mx-auto">
                تواصل معنا اليوم للحصول على استشارة مجانية وعرض سعر مخصص لاحتياجاتك
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo get_page_url('contact'); ?>" 
                   class="bg-white text-blue-900 hover:bg-gray-100 font-semibold px-8 py-4 rounded-lg transition-colors">
                    احصل على عرض سعر
                </a>
                <a href="<?php echo get_page_url('consultation'); ?>" 
                   class="border-2 border-white text-white hover:bg-white hover:text-blue-900 font-semibold px-8 py-4 rounded-lg transition-all">
                    استشارة مجانية
                </a>
                <a href="https://wa.me/<?php echo str_replace(['+', ' '], '', SITE_WHATSAPP); ?>" 
                   class="bg-green-500 hover:bg-green-600 text-white font-semibold px-8 py-4 rounded-lg transition-colors">
                    واتساب مباشر
                </a>
            </div>
        </div>
    </section>
</div>

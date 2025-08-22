<?php
// بيانات قيم الشركة
$companyValues = [
    [
        'icon' => 'shield',
        'title' => 'الأمانة والثقة',
        'description' => 'نتعامل مع بضائعكم ومستنداتكم بأعلى درجات الأمانة والشفافية'
    ],
    [
        'icon' => 'clock',
        'title' => 'السرعة والدقة',
        'description' => 'التزام بالمواعيد المحددة مع ضمان دقة العمل في كل التفاصيل'
    ],
    [
        'icon' => 'users',
        'title' => 'الخدمة المتميزة',
        'description' => 'فريق محترف يقدم خدمة عملاء استثنائية على مدار الساعة'
    ],
    [
        'icon' => 'target',
        'title' => 'التميز والجودة',
        'description' => 'نسعى دائماً لتقديم أفضل الحلول وأعلى معايير الجودة'
    ]
];

// بيانات فريق العمل
$teamMembers = [
    [
        'name' => 'أحمد محمد علي',
        'position' => 'المدير العام',
        'experience' => '20+ سنة خبرة',
        'description' => 'خبير في القوانين الجمركية المصرية والدولية',
        'image' => '👨‍💼'
    ],
    [
        'name' => 'فاطمة حسن أحمد',
        'position' => 'مدير العمليات',
        'experience' => '15+ سنة خبرة',
        'description' => 'متخصصة في التخليص البحري والجوي',
        'image' => '👩‍💼'
    ],
    [
        'name' => 'محمد عبدالله',
        'position' => 'رئيس قسم التخليص',
        'experience' => '12+ سنة خبرة',
        'description' => 'خبير في المناطق الحرة والاستثمارية',
        'image' => '👨‍💼'
    ],
    [
        'name' => 'نورا إبراهيم',
        'position' => 'مسؤولة خدمة العملاء',
        'experience' => '8+ سنوات خبرة',
        'description' => 'متخصصة في متابعة العملاء والدعم التقني',
        'image' => '👩‍💼'
    ]
];

// الإنجازات
$achievements = [
    [
        'icon' => 'ship',
        'number' => '5000+',
        'label' => 'شحنة مُخلصة بنجاح',
        'description' => 'عبر جميع الموانئ والمطارات المصرية'
    ],
    [
        'icon' => 'users',
        'number' => '500+',
        'label' => 'عميل راضٍ',
        'description' => 'من الشركات والمؤسسات الكبرى'
    ],
    [
        'icon' => 'award',
        'number' => '15+',
        'label' => 'سنة خبرة',
        'description' => 'في مجال التخليص الجمركي'
    ],
    [
        'icon' => 'globe',
        'number' => '99%',
        'label' => 'معدل النجاح',
        'description' => 'في إتمام عمليات التخليص'
    ]
];

// التراخيص والاعتمادات
$certifications = [
    [
        'title' => 'ترخيص مزاولة المهنة',
        'authority' => 'مصلحة الجمارك المصرية',
        'year' => '2024',
        'description' => 'ترخيص رسمي لممارسة أعمال التخليص الجمركي'
    ],
    [
        'title' => 'عضوية جمعية المخلصين',
        'authority' => 'جمعية المخلصين الجمركيين',
        'year' => '2024',
        'description' => 'عضوية فعالة في الجمعية المهنية'
    ],
    [
        'title' => 'شهادة الجودة ISO',
        'authority' => 'الهيئة المصرية للمواصفات',
        'year' => '2023',
        'description' => 'شهادة جودة في الخدمات اللوجستية'
    ],
    [
        'title' => 'اعتماد غرفة التجارة',
        'authority' => 'غرفة التجارة المصرية',
        'year' => '2024',
        'description' => 'اعتماد كشركة معتمدة للتخليص الجمركي'
    ]
];

// نطاق التغطية
$ports = [
    ['name' => 'ميناء الإسكندرية', 'type' => 'بحري', 'status' => 'مكتب دائم'],
    ['name' => 'ميناء السويس', 'type' => 'بحري', 'status' => 'مكتب دائم'],
    ['name' => 'ميناء دمياط', 'type' => 'بحري', 'status' => 'تغطية شاملة'],
    ['name' => 'مطار القاهرة', 'type' => 'جوي', 'status' => 'مكتب دائم'],
    ['name' => 'مطار برج العرب', 'type' => 'جوي', 'status' => 'تغطية شاملة'],
    ['name' => 'منفذ رفح', 'type' => 'بري', 'status' => 'تغطية شاملة']
];
?>

<div class="bg-white">
    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-16">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4">
                    من نحن
                </h1>
                <p class="text-xl text-gray-200 mb-8">
                    شركة رائدة في مجال التخليص الجمركي مع خبرة تمتد لأكثر من 15 عاماً في خدمة 
                    القطاع التجاري والصناعي في مصر
                </p>
            </div>
        </div>
    </section>

    <!-- Company Story -->
    <section class="section-spacing">
        <div class="container-custom">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-blue-900 mb-6">
                        قصتنا
                    </h2>
                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p>
                            تأسست شركة التخليص الجمركي في عام 2008 بهدف تقديم خدمات تخليص جمركي متميزة 
                            للشركات والمؤسسات العاملة في مجال الاستيراد والتصدير في مصر.
                        </p>
                        <p>
                            بدأنا كفريق صغير من المتخصصين في مجا�� الجمارك، واليوم أصبحنا واحدة من أكبر 
                            الشركات المتخصصة في التخليص الجمركي مع فروع في أهم الموانئ والمطارات المصرية.
                        </p>
                        <p>
                            نفخر بأننا ساعدنا آلاف الشركات في تسهيل عمليات الاستيراد والتصدير، 
                            وقدمنا لهم خدمات استثنائية ساهمت في نمو أعمالهم وتوسعها.
                        </p>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl p-8">
                    <div class="grid grid-cols-2 gap-6">
                        <?php foreach($achievements as $achievement): ?>
                            <div class="text-center">
                                <i data-lucide="<?php echo $achievement['icon']; ?>" class="w-12 h-12 mx-auto mb-3 text-blue-600"></i>
                                <div class="text-2xl font-bold text-blue-900 mb-1">
                                    <?php echo $achievement['number']; ?>
                                </div>
                                <div class="text-sm font-medium text-gray-700 mb-1">
                                    <?php echo $achievement['label']; ?>
                                </div>
                                <div class="text-xs text-gray-600">
                                    <?php echo $achievement['description']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission -->
    <section class="bg-gray-50 section-spacing">
        <div class="container-custom">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Vision -->
                <div class="bg-white rounded-xl p-8 text-center">
                    <i data-lucide="eye" class="w-16 h-16 mx-auto mb-4 text-blue-600"></i>
                    <h3 class="text-2xl font-bold text-blue-900 mb-4">رؤيتنا</h3>
                    <p class="text-gray-600 leading-relaxed">
                        أن نصبح الشريك الأول والأكثر ثقة للشركات في مجال التخليص الجمركي، 
                        ونساهم في تطوير التجارة الخارجية المصرية.
                    </p>
                </div>

                <!-- Mission -->
                <div class="bg-white rounded-xl p-8 text-center">
                    <i data-lucide="target" class="w-16 h-16 mx-auto mb-4 text-blue-600"></i>
                    <h3 class="text-2xl font-bold text-blue-900 mb-4">رسالتنا</h3>
                    <p class="text-gray-600 leading-relaxed">
                        تقديم خدمات تخليص جمركي متميزة وسريعة ودقيقة، مع الالتزام بأعلى معايير 
                        الجودة والشفافية في التعامل مع عملائنا.
                    </p>
                </div>

                <!-- Values -->
                <div class="bg-white rounded-xl p-8 text-center">
                    <i data-lucide="heart" class="w-16 h-16 mx-auto mb-4 text-blue-600"></i>
                    <h3 class="text-2xl font-bold text-blue-900 mb-4">قيمنا</h3>
                    <p class="text-gray-600 leading-relaxed">
                        الأمانة والثقة والشفافية والتميز في الخدمة، مع الالتزام بالمواعيد 
                        والحرص على مصالح عملائنا في المقام الأول.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="section-spacing">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-900 mb-4">
                    قيمنا الأساسية
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    نؤمن بمجموعة من القيم الأساسية التي توجه عملنا وتحدد طريقة تعاملنا مع عملائنا وشركائنا
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach($companyValues as $value): ?>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="<?php echo $value['icon']; ?>" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-blue-900 mb-2">
                            <?php echo $value['title']; ?>
                        </h3>
                        <p class="text-gray-600 leading-relaxed">
                            <?php echo $value['description']; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section class="bg-gray-50 section-spacing">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-900 mb-4">
                    فريق الخبراء
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    فريق من الخبراء المتخصصين في مجال التخليص الجمركي مع سنوات طويلة من الخبرة
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach($teamMembers as $member): ?>
                    <div class="bg-white rounded-xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                        <div class="text-6xl mb-4"><?php echo $member['image']; ?></div>
                        <h3 class="text-xl font-semibold text-blue-900 mb-1">
                            <?php echo $member['name']; ?>
                        </h3>
                        <p class="text-blue-600 font-medium mb-2">
                            <?php echo $member['position']; ?>
                        </p>
                        <p class="text-sm text-gray-600 mb-3">
                            <?php echo $member['experience']; ?>
                        </p>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            <?php echo $member['description']; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Certifications -->
    <section class="section-spacing">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-900 mb-4">
                    التراخيص والاعتمادات
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    نحتفظ بجميع التراخيص والاعتمادات المطلوبة لممارسة أعمال التخليص الجمركي في مصر
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach($certifications as $cert): ?>
                    <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                            <i data-lucide="award" class="w-6 h-6 text-white"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-blue-900 mb-2">
                            <?php echo $cert['title']; ?>
                        </h3>
                        <p class="text-sm text-blue-600 font-medium mb-1">
                            <?php echo $cert['authority']; ?>
                        </p>
                        <p class="text-xs text-gray-600 mb-3">
                            عام <?php echo $cert['year']; ?>
                        </p>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            <?php echo $cert['description']; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Coverage Areas -->
    <section class="bg-blue-600 text-white section-spacing">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">
                    نطاق تغطيتنا
                </h2>
                <p class="text-xl text-gray-200 max-w-3xl mx-auto">
                    نقدم خدماتنا في جميع الموانئ والمطا��ات والمنافذ البرية الرئيسية في مصر
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach($ports as $port): ?>
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6">
                        <div class="flex items-center space-x-3 space-x-reverse mb-3">
                            <?php if($port['type'] === 'بحري'): ?>
                                <i data-lucide="ship" class="w-6 h-6"></i>
                            <?php elseif($port['type'] === 'جوي'): ?>
                                <i data-lucide="plane" class="w-6 h-6"></i>
                            <?php else: ?>
                                <i data-lucide="truck" class="w-6 h-6"></i>
                            <?php endif; ?>
                            <h3 class="text-lg font-semibold"><?php echo $port['name']; ?></h3>
                        </div>
                        <p class="text-gray-200 text-sm mb-2">نوع الميناء: <?php echo $port['type']; ?></p>
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <i data-lucide="check-circle" class="w-4 h-4 text-green-400"></i>
                            <span class="text-sm text-gray-200"><?php echo $port['status']; ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="section-spacing">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-900 mb-4">
                    لماذا تختارنا؟
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    ما يميزنا عن المنافسين ويجعلنا الخيار الأول لآلاف العملاء
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="clock" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">
                        سرعة في الإنجاز
                    </h3>
                    <p class="text-gray-600">
                        نضمن أسرع أوقات التخليص مع الحفاظ على أعلى معايير الجودة والدقة
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="users" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">
                        فريق محترف
                    </h3>
                    <p class="text-gray-600">
                        مخلصين جمركيين معتمدين مع خبرة واسعة في التعامل مع جميع أنواع البضائع
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="shield" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">
                        أمان وثقة
                    </h3>
                    <p class="text-gray-600">
                        ضمانات شاملة وتأمين على جميع العمليات مع حماية كاملة لمستنداتكم
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-blue-900 text-white section-spacing">
        <div class="container-custom text-center">
            <h2 class="text-3xl font-bold mb-4">
                ابدأ التعامل معنا اليوم
            </h2>
            <p class="text-xl text-gray-200 mb-8 max-w-3xl mx-auto">
                انضم إلى مئات الشركات الراضية عن خدماتنا واحصل على أفضل حلول التخليص الجمركي
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
            </div>
        </div>
    </section>
</div>

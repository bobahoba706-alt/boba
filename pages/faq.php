<?php
// جلب الأسئلة الشائعة من قاعدة البيانات
$selectedCategory = isset($_GET['category']) ? clean_input($_GET['category']) : 'الكل';
$searchTerm = isset($_GET['search']) ? clean_input($_GET['search']) : '';

$faqItems = [];
$categories = ['الكل'];

if ($pdo) {
    try {
        // جلب الفئات
        $stmt = $pdo->query("SELECT DISTINCT category FROM faq_items WHERE active = 1 ORDER BY category");
        $dbCategories = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $categories = array_merge($categories, $dbCategories);

        // بناء استعلام البحث
        $sql = "SELECT * FROM faq_items WHERE active = 1";
        $params = [];

        if ($selectedCategory !== 'الكل') {
            $sql .= " AND category = ?";
            $params[] = $selectedCategory;
        }

        if (!empty($searchTerm)) {
            $sql .= " AND (question LIKE ? OR answer LIKE ? OR keywords LIKE ?)";
            $searchPattern = "%{$searchTerm}%";
            $params[] = $searchPattern;
            $params[] = $searchPattern;
            $params[] = $searchPattern;
        }

        $sql .= " ORDER BY display_order ASC, id ASC";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $faqItems = $stmt->fetchAll();

    } catch (Exception $e) {
        error_log("FAQ query error: " . $e->getMessage());
    }
}

// بيانات تجريبية في حالة عدم وجود قاعدة بيانات
if (empty($faqItems)) {
    $faqItems = [
        [
            'id' => 1,
            'question' => 'ما هي خدمات التخليص الجمركي التي تقدمونها؟',
            'answer' => 'نقدم خدمات شاملة تشمل التخليص البحري والجوي والبري، تخليص الواردات والصادرات، التعامل مع المناطق الحرة، والاستشارات الجمركية. نعمل في جميع الموانئ والمطارات المصرية الرئيسية.',
            'category' => 'عام',
            'keywords' => 'خدمات,تخليص,بحري,جوي,بري,واردات,صادرات,مناطق حرة'
        ],
        [
            'id' => 2,
            'question' => 'كم من الوقت يستغرق الت��ليص الجمركي؟',
            'answer' => 'يختلف وقت التخليص حسب نوع البضاعة ووسيلة النقل. في المتوسط: التخليص الجوي 24-48 ساعة، البحري 3-5 أيام، البري 1-2 يوم. هذا يعتمد على اكتمال المستندات والحصول على الموافقات المطلوبة.',
            'category' => 'أوقات التخليص',
            'keywords' => 'وقت,مدة,تخليص,ساعة,يوم,جوي,بحري,بري'
        ],
        [
            'id' => 3,
            'question' => 'ما هي المستندات المطلوبة للتخليص؟',
            'answer' => 'المستندات الأساسية تشمل: الفاتورة التجارية، قائمة التعبئة، شهادة المنشأ، بوليصة الشحن، تفويض التخليص، رقم تسجيل المستورد. قد تتطلب بعض البضائع مستندات إضافية مثل شهادات الجودة أو التراخيص الخاصة.',
            'category' => 'المستندات',
            'keywords' => 'مستندات,فاتورة,شهادة,بوليصة,تفويض,أوراق'
        ],
        [
            'id' => 4,
            'question' => 'كيف يتم حساب رسوم التخليص الجمركي؟',
            'answer' => 'تشمل التكاليف: الرسوم الجمركية (حسب نوع البضاعة)، ضريبة القيمة المضافة، رسوم الخدمات، أتعاب التخليص. نقدم عروض أسعار مفصلة قبل البدء في العمل مع شفافية كاملة في التكاليف.',
            'category' => 'التكاليف والرسوم',
            'keywords' => 'رسوم,تكلفة,سعر,ضريبة,أتعاب,حساب'
        ],
        [
            'id' => 5,
            'question' => 'هل هناك رسوم خفية أو إضافية؟',
            'answer' => 'لا، نلتزم بالشفافية الكاملة. جميع الرسوم والتكاليف موضحة في عرض السعر المبدئي. أي رسوم إضافية (مثل رسوم الفحص أو التأخير) يتم إبلاغكم بها مسبقاً وبموافقتكم.',
            'category' => 'التكاليف والرسوم',
            'keywords' => 'رسوم خفية,شفافية,تكاليف إضافية,عرض سعر'
        ],
        [
            'id' => 6,
            'question' => 'ماذا لو كانت المستندات ناقصة أو خاطئة؟',
            'answer' => 'نقوم بمراجعة جميع المستندات قبل التقديم للجمارك. في حالة وجود نقص أو أخطاء، نتواصل معكم فوراً لتصحيحها. نساعدكم في الحصول على المستندات الناقصة وتصحيح الأخطاء.',
            'category' => 'المستندات',
            'keywords' => 'مستندات ناقصة,أخطاء,مراجعة,تصحيح'
        ]
    ];
    
    if (empty($categories) || count($categories) <= 1) {
        $categories = ['الكل', 'عام', 'أوقات التخليص', 'المستندات', 'التكاليف والرسوم'];
    }
}
?>

<div class="bg-white">
    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-16">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4">
                    الأسئلة الشائعة
                </h1>
                <p class="text-xl text-gray-200 mb-8">
                    أجوبة شاملة على أكثر الأسئلة شيوعاً حول خدمات التخليص الجمركي والإجراءات المطلوبة
                </p>
            </div>
        </div>
    </section>

    <!-- Search and Filter -->
    <section class="py-12 bg-gray-50">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto">
                <!-- Search Bar -->
                <form method="GET" class="relative mb-8">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <i data-lucide="search" class="h-5 w-5 text-gray-400"></i>
                    </div>
                    <input type="text" name="search" value="<?php echo htmlspecialchars($searchTerm); ?>"
                           placeholder="ابحث في الأسئلة الشائعة..." 
                           class="w-full pl-4 pr-10 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent text-right text-lg">
                    <input type="hidden" name="page" value="faq">
                    <?php if ($selectedCategory !== 'الكل'): ?>
                        <input type="hidden" name="category" value="<?php echo htmlspecialchars($selectedCategory); ?>">
                    <?php endif; ?>
                </form>

                <!-- Category Filter -->
                <div class="flex flex-wrap gap-3 justify-center">
                    <?php foreach($categories as $category): ?>
                        <a href="<?php echo get_page_url('faq', ['category' => $category, 'search' => $searchTerm]); ?>"
                           class="px-4 py-2 rounded-lg font-medium transition-colors <?php echo ($selectedCategory === $category) ? 'bg-blue-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-100'; ?>">
                            <?php echo htmlspecialchars($category); ?>
                        </a>
                    <?php endforeach; ?>
                </div>

                <!-- Results Count -->
                <div class="text-center mt-6">
                    <p class="text-gray-600">
                        عرض <?php echo count($faqItems); ?> سؤال
                        <?php if ($searchTerm): ?>
                            لـ "<?php echo htmlspecialchars($searchTerm); ?>"
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Items -->
    <section class="section-spacing">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto">
                <?php if (!empty($faqItems)): ?>
                    <div class="space-y-4">
                        <?php foreach($faqItems as $item): ?>
                            <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                                <button onclick="toggleFAQ(<?php echo $item['id']; ?>)" 
                                        class="faq-button w-full p-6 text-right flex items-center justify-between hover:bg-gray-50 transition-colors">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-blue-900 mb-2">
                                            <?php echo htmlspecialchars($item['question']); ?>
                                        </h3>
                                        <span class="text-sm text-blue-600 bg-blue-100 px-3 py-1 rounded-full">
                                            <?php echo htmlspecialchars($item['category']); ?>
                                        </span>
                                    </div>
                                    <div class="mr-4">
                                        <i data-lucide="chevron-down" class="faq-icon w-6 h-6 text-gray-400 transition-transform" id="icon-<?php echo $item['id']; ?>"></i>
                                    </div>
                                </button>
                                
                                <div id="answer-<?php echo $item['id']; ?>" class="faq-answer hidden px-6 pb-6 border-t border-gray-100">
                                    <p class="text-gray-600 leading-relaxed pt-4">
                                        <?php echo nl2br(htmlspecialchars($item['answer'])); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-12">
                        <i data-lucide="help-circle" class="w-16 h-16 mx-auto mb-4 text-gray-300"></i>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">
                            لم نجد أي نتائج
                        </h3>
                        <p class="text-gray-600 mb-6">
                            جرب البحث بكلمات مختلفة أو اختر فئة أخرى
                        </p>
                        <a href="<?php echo get_page_url('faq'); ?>" class="btn-navy-outline">
                            عرض جميع الأسئلة
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="bg-blue-900 text-white section-spacing">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">
                    لم تجد إجابة لسؤالك؟
                </h2>
                <p class="text-xl text-gray-200 max-w-3xl mx-auto">
                    فريق خدمة العملاء جاهز لمساعدتك والإجابة على جميع استفساراتك
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <a href="tel:<?php echo str_replace(' ', '', SITE_PHONE); ?>" 
                   class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 hover:bg-white hover:bg-opacity-20 transition-all text-center group">
                    <i data-lucide="phone" class="w-12 h-12 mx-auto mb-4 text-gray-200 group-hover:scale-110 transition-transform"></i>
                    <h3 class="text-lg font-semibold mb-2">اتصل بنا</h3>
                    <p class="text-gray-200"><?php echo SITE_PHONE; ?></p>
                </a>
                
                <a href="https://wa.me/<?php echo str_replace(['+', ' '], '', SITE_WHATSAPP); ?>" 
                   class="bg-green-500 bg-opacity-20 backdrop-blur-sm rounded-xl p-6 hover:bg-green-500 hover:bg-opacity-30 transition-all text-center group">
                    <i data-lucide="message-circle" class="w-12 h-12 mx-auto mb-4 text-gray-200 group-hover:scale-110 transition-transform"></i>
                    <h3 class="text-lg font-semibold mb-2">واتساب</h3>
                    <p class="text-gray-200">رد فوري على استفساراتك</p>
                </a>
                
                <a href="mailto:<?php echo SITE_EMAIL; ?>" 
                   class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 hover:bg-white hover:bg-opacity-20 transition-all text-center group">
                    <i data-lucide="mail" class="w-12 h-12 mx-auto mb-4 text-gray-200 group-hover:scale-110 transition-transform"></i>
                    <h3 class="text-lg font-semibold mb-2">بريد إلكتروني</h3>
                    <p class="text-gray-200"><?php echo SITE_EMAIL; ?></p>
                </a>
            </div>
        </div>
    </section>
</div>

<script>
function toggleFAQ(id) {
    const answer = document.getElementById('answer-' + id);
    const icon = document.getElementById('icon-' + id);
    
    if (answer.classList.contains('hidden')) {
        answer.classList.remove('hidden');
        icon.style.transform = 'rotate(180deg)';
    } else {
        answer.classList.add('hidden');
        icon.style.transform = 'rotate(0deg)';
    }
}
</script>

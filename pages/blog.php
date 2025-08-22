<?php
// جلب المقالات من قاعدة البيانات
$selectedCategory = isset($_GET['category']) ? clean_input($_GET['category']) : 'الكل';
$searchTerm = isset($_GET['search']) ? clean_input($_GET['search']) : '';

$blogPosts = [];
$categories = ['الكل'];

if ($pdo) {
    try {
        // جلب الفئات
        $stmt = $pdo->query("SELECT DISTINCT category FROM blog_posts WHERE published = 1 ORDER BY category");
        $dbCategories = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $categories = array_merge($categories, $dbCategories);

        // بناء استعلام البحث
        $sql = "SELECT * FROM blog_posts WHERE published = 1";
        $params = [];

        if ($selectedCategory !== 'الكل') {
            $sql .= " AND category = ?";
            $params[] = $selectedCategory;
        }

        if (!empty($searchTerm)) {
            $sql .= " AND (title LIKE ? OR excerpt LIKE ? OR tags LIKE ?)";
            $searchPattern = "%{$searchTerm}%";
            $params[] = $searchPattern;
            $params[] = $searchPattern;
            $params[] = $searchPattern;
        }

        $sql .= " ORDER BY created_at DESC";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $blogPosts = $stmt->fetchAll();

    } catch (Exception $e) {
        error_log("Blog query error: " . $e->getMessage());
    }
}

// بيانات تجريبية في حالة عدم وجود قاعدة بيانات
if (empty($blogPosts)) {
    $blogPosts = [
        [
            'id' => 1,
            'title' => 'دليل شامل للتخليص الجمركي في مصر 2024',
            'excerpt' => 'كل ما تحتاج معرفته عن إجراءات التخليص الجمركي الجديدة وأحدث التطورات في القوانين المصرية',
            'category' => 'تعليم جمركي',
            'author' => 'أحمد محمد علي',
            'created_at' => '2024-01-15',
            'tags' => 'تخليص جمركي,قوانين,إجراءات',
            'featured' => true
        ],
        [
            'id' => 2,
            'title' => 'التحديثات الجديدة في قانون الجمارك المصري',
            'excerpt' => 'آخر التعديلات على قانون الجمارك وأثرها على المستوردين والمصدرين',
            'category' => 'تحديثات تشريعية',
            'author' => 'فاطمة حسن',
            'created_at' => '2024-01-10',
            'tags' => 'قانون الجمارك,تحديثات,تشريعات',
            'featured' => false
        ],
        [
            'id' => 3,
            'title' => 'نصائح لتوفير التكاليف في التخليص الجمركي',
            'excerpt' => 'طرق عملية لتقليل تكاليف التخليص الجمركي والرسوم المستحقة',
            'category' => 'نصائح للمستوردين',
            'author' => 'محمد عبدالله',
            'created_at' => '2024-01-08',
            'tags' => 'توفير تكاليف,نصائح,استيراد',
            'featured' => false
        ],
        [
            'id' => 4,
            'title' => 'المستندات المطلوبة للتخليص الجمركي',
            'excerpt' => 'قائمة شاملة بجميع المستندات المطلوبة حسب نوع البضاعة ووسيلة النقل',
            'category' => 'تعليم جمركي',
            'author' => 'نورا إبراهيم',
            'created_at' => '2024-01-05',
            'tags' => 'مستندات,أوراق,متطلبات',
            'featured' => true
        ],
        [
            'id' => 5,
            'title' => 'كيفية التعامل مع المناطق الحرة في مصر',
            'excerpt' => 'دليل متكامل للاستفادة من المناطق الحرة والحوافز الاستثمارية المتاحة',
            'category' => 'نصائح للمستوردين',
            'author' => 'أحمد محمد علي',
            'created_at' => '2024-01-03',
            'tags' => 'مناطق حرة,استثمار,حوافز',
            'featured' => false
        ]
    ];
    
    if (empty($categories) || count($categories) <= 1) {
        $categories = ['الكل', 'تعليم جمركي', 'تحديثات تشريعية', 'نصائح للمستوردين'];
    }
}

$featuredPosts = array_filter($blogPosts, function($post) {
    return isset($post['featured']) && $post['featured'];
});

$recentPosts = array_slice($blogPosts, 0, 5);

function calculateReadTime($content) {
    $wordCount = str_word_count(strip_tags($content));
    $minutes = ceil($wordCount / 200); // متوسط 200 كلمة في الدقيقة
    return $minutes . ' دقائق';
}
?>

<div class="bg-white">
    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-16">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4">
                    مدونة التخليص الجمركي
                </h1>
                <p class="text-xl text-gray-200 mb-8">
                    مقالات ونصائح متخصصة في مجال التخليص الجمركي والتجارة الدولية لمساعدتكم في أعمالكم
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
                           placeholder="ابحث في المقالات..." 
                           class="w-full pl-4 pr-10 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent text-right text-lg">
                    <input type="hidden" name="page" value="blog">
                    <?php if ($selectedCategory !== 'الكل'): ?>
                        <input type="hidden" name="category" value="<?php echo htmlspecialchars($selectedCategory); ?>">
                    <?php endif; ?>
                </form>

                <!-- Category Filter -->
                <div class="flex flex-wrap gap-3 justify-center">
                    <?php foreach($categories as $category): ?>
                        <a href="<?php echo get_page_url('blog', ['category' => $category, 'search' => $searchTerm]); ?>"
                           class="px-4 py-2 rounded-lg font-medium transition-colors <?php echo ($selectedCategory === $category) ? 'bg-blue-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-100'; ?>">
                            <?php echo htmlspecialchars($category); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <div class="section-spacing">
        <div class="container-custom">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Featured Posts -->
                    <?php if ($selectedCategory === 'الكل' && !empty($featuredPosts)): ?>
                        <div class="mb-12">
                            <h2 class="text-2xl font-bold text-blue-900 mb-6 flex items-center space-x-2 space-x-reverse">
                                <span>المقالات المميزة</span>
                                <div class="w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center">
                                    <span class="text-xs">⭐</span>
                                </div>
                            </h2>
                            <div class="grid md:grid-cols-2 gap-6">
                                <?php foreach($featuredPosts as $post): ?>
                                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                                        <div class="p-6">
                                            <div class="flex items-center space-x-2 space-x-reverse mb-3">
                                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                    مميز
                                                </span>
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                    <?php echo htmlspecialchars($post['category']); ?>
                                                </span>
                                            </div>
                                            <h3 class="text-xl font-semibold text-blue-900 mb-3 leading-tight">
                                                <?php echo htmlspecialchars($post['title']); ?>
                                            </h3>
                                            <p class="text-gray-600 mb-4 leading-relaxed">
                                                <?php echo htmlspecialchars($post['excerpt']); ?>
                                            </p>
                                            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                                <div class="flex items-center space-x-2 space-x-reverse">
                                                    <i data-lucide="user" class="w-4 h-4"></i>
                                                    <span><?php echo htmlspecialchars($post['author']); ?></span>
                                                </div>
                                                <div class="flex items-center space-x-4 space-x-reverse">
                                                    <div class="flex items-center space-x-1 space-x-reverse">
                                                        <i data-lucide="calendar" class="w-4 h-4"></i>
                                                        <span><?php echo format_arabic_date($post['created_at']); ?></span>
                                                    </div>
                                                    <div class="flex items-center space-x-1 space-x-reverse">
                                                        <i data-lucide="clock" class="w-4 h-4"></i>
                                                        <span><?php echo calculateReadTime($post['excerpt']); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <div class="flex flex-wrap gap-1">
                                                    <?php 
                                                    $tags = explode(',', $post['tags']);
                                                    foreach(array_slice($tags, 0, 2) as $tag): 
                                                    ?>
                                                        <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">
                                                            <?php echo htmlspecialchars(trim($tag)); ?>
                                                        </span>
                                                    <?php endforeach; ?>
                                                </div>
                                                <button class="text-blue-600 hover:text-blue-800 font-medium flex items-center space-x-1 space-x-reverse">
                                                    <span>اقرأ المزيد</span>
                                                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- All Posts -->
                    <div>
                        <h2 class="text-2xl font-bold text-blue-900 mb-6">
                            <?php echo $selectedCategory === 'الكل' ? 'جميع المقالات' : htmlspecialchars($selectedCategory); ?>
                            <span class="text-gray-600 text-lg font-normal mr-2">
                                (<?php echo count($blogPosts); ?> مقال)
                            </span>
                        </h2>
                        
                        <?php if (!empty($blogPosts)): ?>
                            <div class="space-y-6">
                                <?php foreach($blogPosts as $post): ?>
                                    <article class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-shadow p-6">
                                        <div class="flex items-center space-x-2 space-x-reverse mb-3">
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                <?php echo htmlspecialchars($post['category']); ?>
                                            </span>
                                            <?php if (isset($post['featured']) && $post['featured']): ?>
                                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                    مميز
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <h2 class="text-2xl font-semibold text-blue-900 mb-3 leading-tight hover:text-blue-600 transition-colors cursor-pointer">
                                            <?php echo htmlspecialchars($post['title']); ?>
                                        </h2>
                                        
                                        <p class="text-gray-600 mb-4 leading-relaxed">
                                            <?php echo htmlspecialchars($post['excerpt']); ?>
                                        </p>
                                        
                                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                            <div class="flex items-center space-x-4 space-x-reverse">
                                                <div class="flex items-center space-x-2 space-x-reverse">
                                                    <i data-lucide="user" class="w-4 h-4"></i>
                                                    <span><?php echo htmlspecialchars($post['author']); ?></span>
                                                </div>
                                                <div class="flex items-center space-x-1 space-x-reverse">
                                                    <i data-lucide="calendar" class="w-4 h-4"></i>
                                                    <span><?php echo format_arabic_date($post['created_at']); ?></span>
                                                </div>
                                                <div class="flex items-center space-x-1 space-x-reverse">
                                                    <i data-lucide="clock" class="w-4 h-4"></i>
                                                    <span><?php echo calculateReadTime($post['excerpt']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center justify-between">
                                            <div class="flex flex-wrap gap-2">
                                                <?php 
                                                $tags = explode(',', $post['tags']);
                                                foreach($tags as $tag): 
                                                ?>
                                                    <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded flex items-center space-x-1 space-x-reverse">
                                                        <i data-lucide="tag" class="w-3 h-3"></i>
                                                        <span><?php echo htmlspecialchars(trim($tag)); ?></span>
                                                    </span>
                                                <?php endforeach; ?>
                                            </div>
                                            <button class="text-blue-600 hover:text-blue-800 font-medium flex items-center space-x-1 space-x-reverse">
                                                <span>اقرأ المقال كاملاً</span>
                                                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                                            </button>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-12">
                                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i data-lucide="search" class="w-8 h-8 text-gray-400"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-700 mb-2">
                                    لم نجد أي مقالات
                                </h3>
                                <p class="text-gray-600 mb-6">
                                    جرب البحث بكلمات مختلفة أو اختر فئة أخرى
                                </p>
                                <a href="<?php echo get_page_url('blog'); ?>" class="btn-navy-outline">
                                    عرض جميع المقالات
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Recent Posts -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h3 class="text-xl font-semibold text-blue-900 mb-4">
                            أحدث المقالات
                        </h3>
                        <div class="space-y-4">
                            <?php foreach($recentPosts as $post): ?>
                                <div class="border-b border-gray-200 pb-4 last:border-b-0 last:pb-0">
                                    <h4 class="font-medium text-blue-900 mb-2 leading-tight hover:text-blue-600 transition-colors cursor-pointer">
                                        <?php 
                                        $title = $post['title'];
                                        echo htmlspecialchars(mb_strlen($title) > 60 ? mb_substr($title, 0, 60) . '...' : $title);
                                        ?>
                                    </h4>
                                    <div class="flex items-center space-x-2 space-x-reverse text-xs text-gray-500">
                                        <i data-lucide="calendar" class="w-3 h-3"></i>
                                        <span><?php echo format_arabic_date($post['created_at']); ?></span>
                                        <span>•</span>
                                        <i data-lucide="clock" class="w-3 h-3"></i>
                                        <span><?php echo calculateReadTime($post['excerpt']); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="bg-white border border-gray-200 rounded-xl p-6">
                        <h3 class="text-xl font-semibold text-blue-900 mb-4">
                            الفئات
                        </h3>
                        <div class="space-y-2">
                            <?php foreach(array_slice($categories, 1) as $category): ?>
                                <?php 
                                $count = count(array_filter($blogPosts, function($post) use ($category) {
                                    return $post['category'] === $category;
                                }));
                                ?>
                                <a href="<?php echo get_page_url('blog', ['category' => $category]); ?>" 
                                   class="w-full text-right p-2 rounded-lg transition-colors flex items-center justify-between <?php echo ($selectedCategory === $category) ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-gray-100'; ?>">
                                    <span><?php echo htmlspecialchars($category); ?></span>
                                    <span class="text-xs px-2 py-1 rounded-full <?php echo ($selectedCategory === $category) ? 'bg-white bg-opacity-20' : 'bg-gray-200'; ?>">
                                        <?php echo $count; ?>
                                    </span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Newsletter Signup -->
                    <div class="bg-blue-600 text-white rounded-xl p-6">
                        <h3 class="text-xl font-semibold mb-4">
                            اشترك في النشرة الإخبارية
                        </h3>
                        <p class="text-gray-200 mb-4 text-sm">
                            احصل على آخر المقالات والنصائح في مجال التخليص الجمركي
                        </p>
                        <div class="space-y-3">
                            <input type="email" placeholder="بريدك الإلكتروني" 
                                   class="w-full px-4 py-2 rounded-lg text-gray-700 text-right">
                            <button class="w-full bg-white text-blue-600 hover:bg-gray-100 font-semibold py-2 rounded-lg transition-colors">
                                اشترك الآن
                            </button>
                        </div>
                    </div>

                    <!-- Contact CTA -->
                    <div class="bg-white border border-gray-200 rounded-xl p-6 text-center">
                        <h3 class="text-lg font-semibold text-blue-900 mb-2">
                            تحتاج مساعدة؟
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">
                            تواصل معنا للحصول على استشارة مجانية
                        </p>
                        <a href="<?php echo get_page_url('consultation'); ?>" class="btn-navy w-full text-center">
                            استشارة مجانية
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
session_start();
require_once 'config/config.php';
require_once 'includes/functions.php';

// تحديد الصفحة المطلوبة
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// صفحات مسموحة
$allowed_pages = [
    'home',
    'about', 
    'services',
    'contact',
    'blog',
    'faq',
    'consultation',
    'login',
    'privacy',
    'terms',
    'legal'
];

// التحقق من صحة الصفحة
if (!in_array($page, $allowed_pages)) {
    $page = '404';
}

// إعداد معلومات الصفحة
$page_info = get_page_info($page);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_info['title']; ?> - شركة التخليص الجمركي</title>
    <meta name="description" content="<?php echo $page_info['description']; ?>">
    <meta name="keywords" content="تخليص جمركي, جمارك, استيراد, تصدير, مصر, <?php echo $page_info['keywords']; ?>">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        cairo: ['Cairo', 'sans-serif'],
                        sans: ['Cairo', 'ui-sans-serif', 'system-ui'],
                    },
                    colors: {
                        'navy': {
                            light: '#2563EB',
                            DEFAULT: '#2563EB', 
                            medium: '#3B82F6',
                            dark: '#1E3A8A',
                            hover: '#1D4ED8',
                        },
                        'gray': {
                            text: '#6B7280',
                            card: '#F9FAFB',
                            light: '#F3F4F6',
                            medium: '#9CA3AF',
                            dark: '#374151',
                        },
                        'status': {
                            success: '#10B981',
                            warning: '#F59E0B',
                            error: '#EF4444',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>
<body class="bg-white text-navy-dark font-cairo">
    <?php include 'includes/header.php'; ?>
    
    <main>
        <?php
        $page_file = "pages/{$page}.php";
        if (file_exists($page_file)) {
            include $page_file;
        } else {
            include 'pages/404.php';
        }
        ?>
    </main>
    
    <?php include 'includes/footer.php'; ?>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script src="assets/js/main.js"></script>
    
    <!-- Initialize Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>

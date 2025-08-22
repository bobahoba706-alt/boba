<?php
/**
 * ملف الوظائف المساعدة
 */

/**
 * الحصول على معلومات الصفحة
 */
function get_page_info($page) {
    $pages = [
        'home' => [
            'title' => 'الرئيسية',
            'description' => 'شركة رائدة في مجال التخليص الجمركي في مصر. خدمات تخليص سريعة ودقيقة للواردات والصادرات.',
            'keywords' => 'تخليص جمركي, الإسكندرية, السويس, دمياط'
        ],
        'about' => [
            'title' => 'من نحن',
            'description' => 'تعرف على شركة التخليص الجمركي وفريق الخبراء المتخصصين في الجمارك والتجارة الدولية.',
            'keywords' => 'من نحن, فريق العمل, خبرة, تاريخ الشركة'
        ],
        'services' => [
            'title' => 'خدماتنا',
            'description' => 'خدمات تخليص جمركي متكاملة: تخليص بحري وجوي وبري، مناطق حرة، استشارات جمركية.',
            'keywords' => 'خدمات التخليص, بحري, جوي, بري, مناطق حرة'
        ],
        'contact' => [
            'title' => 'اتصل بنا',
            'description' => 'تواصل معنا للحصول على عرض سعر مخصص وتفصيلي لجميع احتياجاتك في التخليص الجمركي.',
            'keywords' => 'اتصل بنا, عرض سعر, تواصل, خدمة عملاء'
        ],
        'blog' => [
            'title' => 'المدونة',
            'description' => 'مقالات ونصائح متخصصة في مجال التخليص الجمركي والتجارة الدولية.',
            'keywords' => 'مدونة, مقالات, نصائح, تعليم جمركي'
        ],
        'faq' => [
            'title' => 'الأسئلة الشائعة',
            'description' => 'أجوبة شاملة على أكثر الأسئلة شيوعاً حول خدمات التخليص الجمركي والإجراءات المطلوبة.',
            'keywords' => 'أسئلة شائعة, إجابات, مساعدة, دعم'
        ],
        'consultation' => [
            'title' => 'استشارة مجانية',
            'description' => 'احصل على استشارة مجانية من خبراء التخليص الجمركي لحل مشاكلك التجارية.',
            'keywords' => 'استشارة مجانية, خبراء, مساعدة'
        ],
        'login' => [
            'title' => 'دخول العملاء',
            'description' => 'دخول العملاء لمتابعة حالة الشحنات والحصول على التقارير.',
            'keywords' => 'دخول العملاء, تسجيل الدخول, حساب العميل'
        ],
        'privacy' => [
            'title' => 'سياسة الخصوصية',
            'description' => 'سياسة حماية خصوصية البيانات والمعلومات الشخصية للعملاء.',
            'keywords' => 'سياسة الخصوصية, حماية البيانات'
        ],
        'terms' => [
            'title' => 'الشروط والأحكام',
            'description' => 'شروط وأحكام استخدام موقع شركة التخليص الجمركي وخدماتها.',
            'keywords' => 'شروط وأحكام, قوانين الاستخدام'
        ],
        'legal' => [
            'title' => 'التنويه القانوني',
            'description' => 'التنويه القانوني وإخلاء المسؤولية لموقع شركة التخليص الجمركي.',
            'keywords' => 'تنويه قانوني, إخلاء مسؤولية'
        ],
        '404' => [
            'title' => 'الصفحة غير موجودة',
            'description' => 'الصفحة المطلوبة غير موجودة.',
            'keywords' => '404, صفحة غير موجودة'
        ]
    ];
    
    return isset($pages[$page]) ? $pages[$page] : $pages['404'];
}

/**
 * تنسيق التاريخ بالعربية
 */
function format_arabic_date($date) {
    $months = [
        1 => 'يناير', 2 => 'فبراير', 3 => 'مارس', 4 => 'أبريل',
        5 => 'مايو', 6 => 'يونيو', 7 => 'يوليو', 8 => 'أغسطس',
        9 => 'سبتمبر', 10 => 'أكتوبر', 11 => 'نوفمبر', 12 => 'ديسمبر'
    ];
    
    $timestamp = is_string($date) ? strtotime($date) : $date;
    $day = date('j', $timestamp);
    $month = $months[(int)date('n', $timestamp)];
    $year = date('Y', $timestamp);
    
    return "$day $month $year";
}

/**
 * تنظيف البيانات المدخلة
 */
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * التحقق من صحة البريد الإلكتروني
 */
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * إرسال بريد إلكتروني
 */
function send_email($to, $subject, $message, $from = SITE_EMAIL) {
    $headers = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=utf-8',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'X-Mailer: PHP/' . phpversion()
    ];
    
    return mail($to, $subject, $message, implode("\r\n", $headers));
}

/**
 * حفظ الملفات المرفوعة
 */
function save_uploaded_file($file, $allowed_types = ['pdf', 'jpg', 'jpeg', 'png', 'docx', 'xlsx']) {
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return false;
    }
    
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    if (!in_array($file_extension, $allowed_types)) {
        return false;
    }
    
    if ($file['size'] > MAX_FILE_SIZE) {
        return false;
    }
    
    $new_filename = uniqid() . '_' . time() . '.' . $file_extension;
    $upload_path = UPLOAD_DIR . $new_filename;
    
    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0755, true);
    }
    
    if (move_uploaded_file($file['tmp_name'], $upload_path)) {
        return $new_filename;
    }
    
    return false;
}

/**
 * إنشاء رابط آمن للصفحات
 */
function get_page_url($page, $params = []) {
    $url = "?page=" . urlencode($page);
    
    if (!empty($params)) {
        foreach ($params as $key => $value) {
            $url .= "&" . urlencode($key) . "=" . urlencode($value);
        }
    }
    
    return $url;
}

/**
 * عرض الأخطاء
 */
function show_error($message) {
    return '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">' . 
           htmlspecialchars($message) . '</div>';
}

/**
 * عرض النجاح
 */
function show_success($message) {
    return '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">' . 
           htmlspecialchars($message) . '</div>';
}
?>

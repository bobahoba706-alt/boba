-- إنشاء قاعدة البيانات
CREATE DATABASE IF NOT EXISTS customs_clearance CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE customs_clearance;

-- جدول طلبات عر��ض الأسعار
CREATE TABLE quote_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    company VARCHAR(255),
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    operation_type ENUM('وارد', 'صادر', 'ترانزيت', 'منطقة حرة') NOT NULL,
    transport_method ENUM('بحري', 'جوي', 'بري') NOT NULL,
    cargo_description TEXT NOT NULL,
    weight DECIMAL(10,2),
    volume DECIMAL(10,2),
    packages INT,
    value DECIMAL(15,2),
    incoterms VARCHAR(10),
    hs_code VARCHAR(20),
    contact_preference ENUM('phone', 'whatsapp', 'email'),
    privacy_agreement BOOLEAN DEFAULT FALSE,
    status ENUM('جديد', 'قيد المراجعة', 'تم الرد', 'مكتمل') DEFAULT 'جديد',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- جدول مرفقات طلبات عروض الأسعار
CREATE TABLE quote_attachments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quote_id INT NOT NULL,
    filename VARCHAR(255) NOT NULL,
    original_name VARCHAR(255) NOT NULL,
    file_size INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (quote_id) REFERENCES quote_requests(id) ON DELETE CASCADE
);

-- جدول مقالات المدونة
CREATE TABLE blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(500) NOT NULL,
    excerpt TEXT,
    content LONGTEXT NOT NULL,
    category VARCHAR(100) NOT NULL,
    author VARCHAR(255) NOT NULL,
    tags TEXT,
    featured BOOLEAN DEFAULT FALSE,
    published BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- جدول الأسئلة الشائعة
CREATE TABLE faq_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    answer LONGTEXT NOT NULL,
    category VARCHAR(100) NOT NULL,
    keywords TEXT,
    display_order INT DEFAULT 0,
    active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- إدراج بيانات تجريبية للمدونة
INSERT INTO blog_posts (title, excerpt, content, category, author, tags, featured) VALUES
('دليل شامل للتخليص الجمركي في مصر 2024', 'كل ما تحتاج معرفته عن إجراءات التخليص الجمركي الجديدة وأحدث التطورات في القوانين المصرية', 'محت��ى مفصل عن التخليص الجمركي...', 'تعليم جمركي', 'أحمد محمد علي', 'تخليص جمركي,قوانين,إجراءات', TRUE),
('التحديثات الجديدة في قانون الجمارك المصري', 'آخر التعديلات على قانون الجمارك وأثرها على المستوردين والمصدرين', 'تفاصيل التحديثات الجديدة...', 'تحديثات تشريعية', 'فاطمة حسن', 'قانون الجمارك,تحديثات,تشريعات', FALSE),
('نصائح لتوفير التكاليف في التخليص الجمركي', 'طرق عملية لتقليل تكاليف التخليص الجمركي والرسوم المستحقة', 'نصائح عملية للتوفير...', 'نصائح للمستوردين', 'محمد عبدالله', 'توفير تكاليف,نصائح,استيراد', FALSE);

-- إدراج بيانات تجريبية للأسئلة الشائعة
INSERT INTO faq_items (question, answer, category, keywords, display_order) VALUES
('ما هي خدمات التخليص الجمركي التي تقدمونها؟', 'نقدم خدمات شاملة تشمل التخليص البحري والجوي والبري، تخليص الواردات والصادرات، التعامل مع المناطق الحرة، والاستشارات الجمركية.', 'عام', 'خدمات,تخليص,بحري,جوي,بري', 1),
('كم من الوقت يستغرق التخليص الجمركي؟', 'يختلف وقت التخليص حسب نوع البضاعة ووسيلة النقل. في المتوسط: التخليص الجوي 24-48 ساعة، البحري 3-5 أيام، البري 1-2 يوم.', 'أوقات التخليص', 'وقت,مدة,تخليص', 2),
('ما هي المستندات المطلوبة للتخليص؟', 'المستندات الأساسية تشمل: الفاتورة التجارية، قائمة التعبئة، شهادة المنشأ، بوليصة الشحن، تفويض التخليص، رقم تسجيل المستورد.', 'المستندات', 'مستندات,فاتورة,شهادة', 3);

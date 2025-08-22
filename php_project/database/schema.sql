-- إنشاء قاعدة البيانات
CREATE DATABASE IF NOT EXISTS customs_clearance CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE customs_clearance;

-- جدول طلبات عروض الأسعار
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

-- جدول رسائل التواصل
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(500),
    message LONGTEXT NOT NULL,
    status ENUM('جديد', 'قيد المراجعة', 'تم الرد', 'مغلق') DEFAULT 'جديد',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- جدول العملاء (للدخول والمتابعة)
CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    company VARCHAR(255),
    status ENUM('نشط', 'معطل') DEFAULT 'نشط',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL
);

-- جدول شحنات العملاء
CREATE TABLE shipments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    reference_number VARCHAR(100) UNIQUE NOT NULL,
    description TEXT,
    port VARCHAR(255),
    transport_type ENUM('بحري', 'جوي', 'بري') NOT NULL,
    status ENUM('مستلم', 'قيد التخليص', 'فحص جمركي', 'مكتمل', 'مُسلم') DEFAULT 'مستلم',
    estimated_completion DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE
);

-- جدول تحديثات الشحنات
CREATE TABLE shipment_updates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    shipment_id INT NOT NULL,
    status VARCHAR(255) NOT NULL,
    note TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (shipment_id) REFERENCES shipments(id) ON DELETE CASCADE
);

-- إدراج بيانات تجريبية للمدونة
INSERT INTO blog_posts (title, excerpt, content, category, author, tags, featured) VALUES
('دليل شامل للتخليص الجمركي في مصر 2024', 'كل ما تحتاج معرفته عن إجراءات التخليص الجمركي الجديدة وأحدث التطورات في القوانين المصرية', 'محتوى مفصل عن التخليص الجمركي...', 'تعليم جمركي', 'أحمد محمد علي', 'تخليص جمركي,قوانين,إجراءات', TRUE),
('التحديثات الجديدة في قانون الجمارك المصري', 'آخر التعديلات على قانون الجمارك وأثرها على المستوردين والمصدرين', 'تفاصيل التحديثات الجديدة...', 'تحديثات تشريعية', 'فاطمة حسن', 'قانون الجمارك,تحديثات,تشريعات', FALSE),
('نصائح لتوفير التكاليف في التخليص الجمركي', 'طرق عملية لتقليل تكاليف التخليص الجمركي والرسوم المستحقة', 'نصائح عملية للتوفير...', 'نصائح للمستوردين', 'محمد عبدالله', 'توفير تكاليف,نصائح,استيراد', FALSE);

-- إدراج بيانات ت��ريبية للأسئلة الشائعة
INSERT INTO faq_items (question, answer, category, keywords, display_order) VALUES
('ما هي خدمات التخليص الجمركي التي تقدمونها؟', 'نقدم خدمات شاملة تشمل التخليص البحري والجوي والبري، تخليص الواردات والصادرات، التعامل مع المناطق الحرة، والاستشارات الجمركية.', 'عام', 'خدمات,تخليص,بحري,جوي,بري', 1),
('كم من الوقت يستغرق التخليص الجمركي؟', 'يختلف وقت التخليص حسب نوع البضاعة ووسيلة النقل. في المتوسط: التخليص الجوي 24-48 ساعة، البحري 3-5 أيام، البري 1-2 يوم.', 'أوقات التخليص', 'وقت,مدة,تخليص', 2),
('ما هي المستندات المطلوبة للتخليص؟', 'المستندات الأساسية تشمل: الفاتورة التجارية، قائمة التعبئة، شهادة المنشأ، بوليصة الشحن، تفويض التخليص، رقم تسجيل المستورد.', 'المستندات', 'مستندات,فاتورة,شهادة', 3);

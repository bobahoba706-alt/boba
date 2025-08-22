# موقع شركة التخليص الجمركي - PHP

موقع شركة التخليص الجمركي محول من React إلى PHP مع MySQL، مع الحفاظ على نفس التصميم والوظائف.

## المتطلبات

- PHP 7.4 أو أحدث
- MySQL 5.7 أو أحدث
- خادم ويب (Apache/Nginx)
- مدير قاعدة البيانات (phpMyAdmin أو مشابه)

## التركيب

### 1. إعداد قاعدة البيانات

```sql
-- إنشاء قاعدة البيانات
CREATE DATABASE customs_clearance CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- استيراد الجداول
mysql -u root -p customs_clearance < database/schema.sql
```

### 2. تكوين الإعدادات

قم بتحديث ملف `config/config.php`:

```php
// إعدادات قاعدة البيانات
define('DB_HOST', 'localhost');
define('DB_NAME', 'customs_clearance');
define('DB_USER', 'root');
define('DB_PASS', 'your_password');

// إعدادات الموقع
define('SITE_EMAIL', 'info@yoursite.com');
define('SITE_PHONE', '+20 10 1234 5678');
define('SITE_WHATSAPP', '+201234567890');
```

### 3. إعداد الصلاحيات

```bash
chmod 755 uploads/
chmod 644 config/config.php
```

## الملفات والمجلدات

```
php_project/
├── index.php              # الملف الرئيسي
├── config/
│   └── config.php         # إعدادات قاعدة البيانات والموقع
├── includes/
│   ├── functions.php      # الوظائف المساعدة
│   ├── header.php         # الهيدر
│   └── footer.php         # الفوتر
├── pages/
│   ├── home.php           # الصفحة الرئيسية
│   ├── services.php       # صفحة الخدمات
│   ├── about.php          # صفحة من نحن
│   ├── contact.php        # صفحة اتصل بنا
│   ├── blog.php           # صفحة المدونة
│   ├── faq.php            # الأسئلة الشائعة
│   └── ...
├── handlers/
│   └── contact_handler.php # معالج نموذج الاتصال
├── assets/
│   ├── css/
│   │   └── style.css      # ملف CSS المخصص
│   └── js/
│       └── main.js        # ملف JavaScript الرئيسي
├── database/
│   └── schema.sql         # مخطط قاعدة البيانات
└── uploads/               # مجلد الملفات المرفوعة
```

## المميزات

### التصميم

- ✅ نفس التصميم الأصلي من React
- ✅ دعم كامل للغة العربية (RTL)
- ✅ خط Cairo من Google Fonts
- ✅ Tailwind CSS للتنسيق
- ✅ تصميم متجاوب لجميع الشاشات
- ✅ أيقونات Lucide

### الوظائف

- ✅ نموذج طلب عرض السعر مع رفع الملفات
- ✅ نظام إدارة المحتوى للمدونة
- ✅ الأسئلة الشائعة التفاعلية
- ✅ نظام البحث والتصفية
- ✅ إرسال رسائل البريد الإلكتروني
- ✅ حفظ البيانات في قاعدة البيانات

### الأمان

- ✅ تنظيف وتعقيم جميع المدخلات
- ✅ حماية من SQL Injection
- ✅ التحقق من صحة البيانات
- ✅ رفع آمن للملفات

## قاعدة البيانات

### الجداول الرئيسية

1. **quote_requests** - طلبات عروض الأسعار
2. **quote_attachments** - مرفقات طلبات عروض الأسعار
3. **blog_posts** - مقالات المدونة
4. **faq_items** - الأسئلة الشائعة
5. **contact_messages** - رسائل التواصل
6. **clients** - بيانات العملاء
7. **shipments** - الشحنات
8. **shipment_updates** - تحديثات الشحنات

## الاستخدام

### إضافة مقال جديد للمدونة

```sql
INSERT INTO blog_posts (title, excerpt, content, category, author, tags, featured, published)
VALUES ('عنوان المقال', 'ملخص المقال', 'محتوى المقال الكامل', 'الفئة', 'اسم الكاتب', 'تاج1,تاج2', true, true);
```

### إضافة سؤال شائع جديد

```sql
INSERT INTO faq_items (question, answer, category, keywords, display_order, active)
VALUES ('السؤال', 'الإجابة', 'الفئة', 'كلمات مفتاحية', 1, true);
```

## التطوير

### إضافة صفحة جديدة

1. أنشئ ملف PHP في مجلد `pages/`
2. أ��ف اسم الصفحة إلى `$allowed_pages` في `index.php`
3. أضف معلومات الصفحة في دالة `get_page_info()` في `includes/functions.php`

### تخصيص التصميم

- عدّل ملف `assets/css/style.css` للتنسيقات المخصصة
- استخدم Tailwind CSS للتنسيقات السريعة
- عدّل ملف `tailwind.config.js` في `index.php` لإضافة ألوان جديدة

## النشر على الخادم

1. ارفع جميع الملفات إلى مجلد الموقع
2. أنشئ قاعدة البيانات واستورد `database/schema.sql`
3. عدّل إعدادات قاعدة البيانات في `config/config.php`
4. تأكد من صلاحيات مجلد `uploads/`
5. اختبر الموقع والنماذج

## الدعم الفني

للمساعدة أو الاستفسارات:

- البريد الإلكتروني: support@yoursite.com
- الهاتف: +20 10 1234 5678

## الترخيص

هذا المشروع مرخص تحت رخصة MIT.

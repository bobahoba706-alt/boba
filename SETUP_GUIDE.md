# موقع شركة التخليص الجمركي - PHP

## 🚀 مشروع PHP محول من React مع MySQL

تم تحويل الموقع بالكامل من React/TypeScript إلى PHP مع الحفاظ على نفس التصميم والوظائف.

## 📋 المتطلبات

- PHP 7.4 أو أحدث
- MySQL 5.7 أو أحدث  
- خادم ويب (Apache/Nginx)
- مدير قاعدة البيانات (phpMyAdmin)

## 🛠️ خطوات التشغيل

### 1. إعداد قاعدة البيانات

```sql
-- إنشاء قاعدة البيانات
CREATE DATABASE customs_clearance CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- استيراد الجداول
mysql -u root -p customs_clearance < database/schema.sql
```

### 2. تكوين الإعدادات

عدّل ملف `config/config.php`:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'customs_clearance'); 
define('DB_USER', 'root');
define('DB_PASS', 'your_password');

define('SITE_EMAIL', 'info@yoursite.com');
define('SITE_PHONE', '+20 10 1234 5678');
define('SITE_WHATSAPP', '+201234567890');
```

### 3. إعداد الصلاحيات

```bash
mkdir uploads
chmod 755 uploads/
chmod 644 config/config.php
```

### 4. رفع الملفات

ارفع جميع الملفات إلى خادم الويب أو localhost.

## 📁 هيكل المشروع

```
/
├── index.php              # الملف الرئيسي
├── config/
│   └── config.php         # إعدادات قاعدة البيانات
├── includes/
│   ├── functions.php      # الوظائف المساعدة
│   ├── header.php         # الهيدر
│   └── footer.php         # الفوتر
├── pages/
│   ├── home.php           # الصفحة الرئيسية
│   ├── services.php       # صفحة الخدمات
│   ├── about.php          # من نحن
│   ├── contact.php        # اتصل بنا
│   ├── blog.php           # المدونة
│   ├── faq.php            # الأسئلة الشائعة
│   ├── consultation.php   # استشارة مجانية
│   ├── login.php          # تسجيل الدخول
│   ├── privacy.php        # سياسة الخصوصية
│   ├── terms.php          # الشروط والأحكام
│   ├── legal.php          # التنويه القانوني
│   └── 404.php            # صفحة الخطأ
├── handlers/
│   └── contact_handler.php # معالج نموذج الاتصال
├── assets/
│   ├── css/style.css      # ملف CSS المخصص
│   └── js/main.js         # JavaScript الرئيسي
├── database/
│   └── schema.sql         # مخطط قاعدة البيانات
└── uploads/               # مجلد الملفات المرفوعة
```

## ✨ المميزات

### التصميم
- ✅ نفس تصميم React الأصلي
- ✅ دعم كامل للغة العربية (RTL)
- ✅ خط Cairo من Google Fonts
- ✅ Tailwind CSS
- ✅ تصميم متجاوب
- ✅ أيقونات Lucide

### الوظائف
- ✅ نموذج طلب عرض السعر مع رفع الم��فات
- ✅ نظام إدارة المدونة
- ✅ الأسئلة الشائعة التفاعلية
- ✅ نظام البحث والتصفية
- ✅ إرسال رسائل البريد الإلكتروني

### الأمان
- ✅ حماية من SQL Injection
- ✅ تنظيف وتعقيم المدخلات
- ✅ رفع آمن للملفات
- ✅ التحقق من صحة البيانات

## 🗄️ قاعدة البيانات

### الجداول الرئيسية:
1. **quote_requests** - طلبات عروض الأسعار
2. **quote_attachments** - مرفقات الطلبات
3. **blog_posts** - مقالات المدونة  
4. **faq_items** - الأسئلة الشائعة

## 📱 الاستخدام

### إضافة مقال جديد:
```sql
INSERT INTO blog_posts (title, excerpt, content, category, author, tags, featured) 
VALUES ('عنوان المقال', 'ملخص', 'المحتوى', 'الفئة', 'الكاتب', 'تاج1,تاج2', true);
```

### إضافة سؤال شائع:
```sql
INSERT INTO faq_items (question, answer, category, keywords) 
VALUES ('السؤال', 'الإجابة', 'الفئة', 'كلمات مفتاحية');
```

## 🌐 الروابط

- الرئيسية: `/?page=home`
- الخدمات: `/?page=services`
- من نحن: `/?page=about` 
- اتصل بنا: `/?page=contact`
- المدونة: `/?page=blog`
- الأسئلة الشائعة: `/?page=faq`

## 📞 الدعم

للمساعدة:
- البريد: info@customsclearance.com
- الهاتف: +20 10 1234 5678

---
### 🎉 المشروع جاهز للاستخدام!

تم تحويل المشروع بالكامل من React إلى PHP مع الحفاظ على جميع الميزات والتصميم الأصلي.

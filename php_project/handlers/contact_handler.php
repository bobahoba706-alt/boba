<?php
require_once '../config/config.php';
require_once '../includes/functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'طريقة الطلب غير مسموحة']);
    exit;
}

try {
    // التحقق من صحة البيانات
    $fullName = clean_input($_POST['fullName'] ?? '');
    $company = clean_input($_POST['company'] ?? '');
    $phone = clean_input($_POST['phone'] ?? '');
    $email = clean_input($_POST['email'] ?? '');
    $city = clean_input($_POST['city'] ?? '');
    $operationType = clean_input($_POST['operationType'] ?? '');
    $transportMethod = clean_input($_POST['transportMethod'] ?? '');
    $cargoDescription = clean_input($_POST['cargoDescription'] ?? '');
    $weight = isset($_POST['weight']) ? floatval($_POST['weight']) : null;
    $volume = isset($_POST['volume']) ? floatval($_POST['volume']) : null;
    $packages = isset($_POST['packages']) ? intval($_POST['packages']) : null;
    $value = isset($_POST['value']) ? floatval($_POST['value']) : null;
    $incoterms = clean_input($_POST['incoterms'] ?? '');
    $hsCode = clean_input($_POST['hsCode'] ?? '');
    $contactPreference = clean_input($_POST['contactPreference'] ?? '');
    $privacyAgreement = isset($_POST['privacyAgreement']) ? true : false;

    // التحقق من الحقول المطلوبة
    if (empty($fullName) || empty($phone) || empty($email) || empty($city) || 
        empty($operationType) || empty($transportMethod) || empty($cargoDescription)) {
        throw new Exception('يرجى ملء جميع الحقول المطلوبة');
    }

    // التحقق من صحة البريد الإلكتروني
    if (!is_valid_email($email)) {
        throw new Exception('البريد الإلكتروني غير صحيح');
    }

    // التحقق من الموافقة على الخصوصية
    if (!$privacyAgreement) {
        throw new Exception('يجب الموافقة على سياسة الخصوصية للمتابعة');
    }

    // التحقق من اتصال قاعدة البيانات
    if (!$pdo) {
        throw new Exception('خطأ في الاتصال بقاعدة البيانات');
    }

    // حفظ البيانات في قاعدة البيانات
    $stmt = $pdo->prepare("
        INSERT INTO quote_requests (
            full_name, company, phone, email, city, operation_type, 
            transport_method, cargo_description, weight, volume, 
            packages, value, incoterms, hs_code, contact_preference, 
            privacy_agreement
        ) VALUES (
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
        )
    ");

    $stmt->execute([
        $fullName, $company, $phone, $email, $city, $operationType,
        $transportMethod, $cargoDescription, $weight, $volume,
        $packages, $value, $incoterms, $hsCode, $contactPreference,
        $privacyAgreement
    ]);

    $quoteId = $pdo->lastInsertId();

    // معالجة الملفات المرفوعة
    $uploadedFiles = [];
    if (isset($_FILES['files']) && is_array($_FILES['files']['name'])) {
        $fileCount = count($_FILES['files']['name']);
        
        for ($i = 0; $i < $fileCount; $i++) {
            if ($_FILES['files']['error'][$i] === UPLOAD_ERR_OK) {
                $tempFile = [
                    'name' => $_FILES['files']['name'][$i],
                    'tmp_name' => $_FILES['files']['tmp_name'][$i],
                    'size' => $_FILES['files']['size'][$i],
                    'error' => $_FILES['files']['error'][$i]
                ];
                
                $filename = save_uploaded_file($tempFile);
                if ($filename) {
                    // حفظ معلومات الملف في قاعدة البيانات
                    $stmt = $pdo->prepare("
                        INSERT INTO quote_attachments (quote_id, filename, original_name, file_size) 
                        VALUES (?, ?, ?, ?)
                    ");
                    $stmt->execute([
                        $quoteId, 
                        $filename, 
                        $_FILES['files']['name'][$i], 
                        $_FILES['files']['size'][$i]
                    ]);
                    
                    $uploadedFiles[] = $_FILES['files']['name'][$i];
                }
            }
        }
    }

    // إرسال بريد إلكتروني للإدارة
    $subject = "طلب عرض سعر جديد من {$fullName}";
    $message = "
    <h2>طلب عرض سعر جديد</h2>
    <p><strong>الاسم:</strong> {$fullName}</p>
    <p><strong>الشركة:</strong> {$company}</p>
    <p><strong>الهاتف:</strong> {$phone}</p>
    <p><strong>البريد الإلكتروني:</strong> {$email}</p>
    <p><strong>المدينة/الميناء:</strong> {$city}</p>
    <p><strong>نوع العملية:</strong> {$operationType}</p>
    <p><strong>وسيلة النقل:</strong> {$transportMethod}</p>
    <p><strong>وصف البضاعة:</strong> {$cargoDescription}</p>
    ";

    if ($weight) $message .= "<p><strong>الوزن:</strong> {$weight} كجم</p>";
    if ($volume) $message .= "<p><strong>الحجم:</strong> {$volume} متر مكعب</p>";
    if ($packages) $message .= "<p><strong>عدد الطرود:</strong> {$packages}</p>";
    if ($value) $message .= "<p><strong>القيمة:</strong> {$value} جنيه مصري</p>";
    if ($incoterms) $message .= "<p><strong>إنكوترمز:</strong> {$incoterms}</p>";
    if ($hsCode) $message .= "<p><strong>HS Code:</strong> {$hsCode}</p>";
    if ($contactPreference) $message .= "<p><strong>تفضيل التواصل:</strong> {$contactPreference}</p>";

    if (!empty($uploadedFiles)) {
        $message .= "<p><strong>الملفات المرفقة:</strong> " . implode(', ', $uploadedFiles) . "</p>";
    }

    $message .= "<p><strong>وقت الطلب:</strong> " . date('Y-m-d H:i:s') . "</p>";

    // إرسال البريد (يمكن تخصيص هذا حسب خدمة البريد المستخدمة)
    send_email(SITE_EMAIL, $subject, $message);

    // إرسال بريد شكر للعميل
    $thankYouSubject = "شكرًا لطلب عرض السعر - " . SITE_NAME;
    $thankYouMessage = "
    <h2>شكرًا لك {$fullName}</h2>
    <p>تم استلام طلب عرض السعر الخاص بك بنجاح.</p>
    <p>سنقوم بمراجعة تفاصيل طلبك وإرسال عرض سعر مفصل خلال 24-48 ساعة.</p>
    <p>في حالة وجود أي استفسارات عاجلة، يمكنك التواصل معنا على:</p>
    <ul>
        <li>الهاتف: " . SITE_PHONE . "</li>
        <li>واتساب: " . SITE_WHATSAPP . "</li>
        <li>البريد الإلكتروني: " . SITE_EMAIL . "</li>
    </ul>
    <p>مع أطيب التحيات،<br>فريق " . SITE_NAME . "</p>
    ";

    send_email($email, $thankYouSubject, $thankYouMessage);

    echo json_encode([
        'success' => true, 
        'message' => 'تم إرسال طلبك بنجاح! سنتواصل معك خلال 24-48 ساعة.',
        'quote_id' => $quoteId
    ]);

} catch (Exception $e) {
    error_log("Contact form error: " . $e->getMessage());
    echo json_encode([
        'success' => false, 
        'message' => $e->getMessage()
    ]);
}
?>

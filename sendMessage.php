<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    if (!empty($fullname) && !empty($message)) {
        $data = "--- رسالة جديدة ---\n";
        $data .= "الاسم: " . $fullname . "\n";
        $data .= "الميساج: " . $message . "\n";
        $data .= "التاريخ: " . date("Y-m-d H:i:s") . "\n\n";

        // يحفظ الرسالة في ملف نصي بنفس المجلد للتأكد من شغل الكود
        if (file_put_contents('messages.txt', $data, FILE_APPEND)) {
            echo "تم استلام الرسالة بنجاح!";
        } else {
            echo "حدث خطأ أثناء كتابة الملف.";
        }
    } else {
        echo "يرجى ملء جميع الحقول!";
    }
}
?>
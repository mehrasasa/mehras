<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if ($data) {
        $story_data = [];
        foreach ($data as $section) {
            $story_data[] = "بخش " . $section['section'] . ":\n" . $section['content'];
        }
        $story_text = implode("\n\n", $story_data);

        // **امنیت:** در اینجا باید اقدامات امنیتی مانند اعتبارسنجی کاربر و جلوگیری از حملات SQL Injection را انجام دهید.
        // برای مثال، می‌توانید از جلسات (sessions) برای مدیریت ورود کاربر استفاده کنید.
        // در این مثال ساده، فرض شده که کاربر معتبر است.

        $filename = 'story.txt'; // نام فایل برای ذخیره داستان
        if (file_put_contents($filename, $story_text)) {
            echo json_encode(['success' => true, 'message' => 'داستان با موفقیت ذخیره شد.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'خطا در ذخیره داستان.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'داده‌ای دریافت نشد.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'روش نامعتبر.']);
}
?>
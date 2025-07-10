<?php
$username = $_POST['username'];
$password = $_POST['password'];

// خواندن اطلاعات ثبت‌نام‌شده
$lines = file("users.txt", FILE_IGNORE_NEW_LINES);
$loginSuccess = false;

foreach ($lines as $line) {
    list($storedUser, $storedEmail, $storedPass) = explode("|", $line);
    if ($storedUser == $username && password_verify($password, $storedPass)) {
        $loginSuccess = true;
        break;
    }
}

if ($loginSuccess) {
    echo "ورود موفقیت‌آمیز بود. <a href='login.php'>رفتن به صفحه اصلی</a>";
} else {
    echo "نام کاربری یا رمز عبور اشتباه است. <a href='index.php'>بازگشت</a>";
}
?>

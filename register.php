<?php
// دریافت اطلاعات از فرم
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// هش کردن رمز عبور برای امنیت
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// برای این مرحله، اطلاعات را در فایل متنی ذخیره می‌کنیم (به جای دیتابیس)
$file = fopen("users.txt", "a");
fwrite($file, "$username|$email|$hashedPassword\n");
fclose($file);

// نمایش پیام موفقیت
echo "ثبت‌نام با موفقیت انجام شد. <a href='login.html'>ادامه</a>";
?>

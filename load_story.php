<?php
header('Content-Type: text/plain; charset=utf-8'); // مهم برای پشتیبانی از فارسی

$filename = 'story.txt';

if (file_exists($filename)) {
    echo file_get_contents($filename);
} else {
    echo "هنوز داستانی ذخیره نشده است.";
}
?>
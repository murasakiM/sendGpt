<?php
// Укажи свой email администратора
$admin_email = "tropaapachi@gmail.com"; // ← замени на свой

// Получаем данные формы
$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$message = trim($_POST['message']);

// Проверяем, что поля не пустые
if ($name === "" || $phone === "" || $message === "") {
    echo "Пожалуйста, заполните все поля.";
    exit;
}

// Тема письма
$subject = "Новое обращение с сайта";

// Тело письма
$body = "
Имя: $name
Телефон: $phone
Сообщение:
$message
";

// Заголовки письма
$headers = "From: Сайт <no-reply@" . $_SERVER['SERVER_NAME'] . ">\r\n" .
           "Reply-To: $admin_email\r\n" .
           "Content-Type: text/plain; charset=utf-8\r\n";

// Отправляем
if (mail($admin_email, $subject, $body, $headers)) {
    echo "Спасибо! Ваше сообщение успешно отправлено.";
} else {
    echo "Ошибка при отправке письма. Попробуйте позже.";
}
?>

<?php

// В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "1670273806:AAED917Gd7nWkgDDq_TKv2GRZFe9ens1W8w";

// Сюда вставляем chat_id
$chat_id = "538615330";

// Приняли данные (методом post) инициализируем и присваиваем значение переменным данными из сообщения.
if ($_POST['act'] == 'order') {
    $brief = 'Заполнен Бриф';
    $dateIssue = ($_POST['dateIssue']);                 // дата заполнения брифа
    $nameCompany = ($_POST['nameCompany']);             // название компании
    $fieldActivity = ($_POST['fieldActivity']);         // сфера деятельности компании
    $innCompany = ($_POST['innCompany']);               // ИНН компании
    $companySite = ($_POST['companySite']);             // сайт компании
    $companyContact = ($_POST['companyContact']);       // контакт компании
    $companyPhone = ($_POST['companyPhone']);           // телефон для связи
    $companyEmail = ($_POST['companyEmail']);           // почта компании email
    $siteRival = ($_POST['siteRival']);                 // сайты конкурентов
    $siteLike = ($_POST['siteLike']);                   // сайты которые нравятся
    $companyFonts = ($_POST['companyFonts']);           // фирменный шрифт компании
    $companyLogo = ($_POST['companyLogo']);             // логотип компании
    $sitelayout = ($_POST['sitelayout']);               // верстка сайта
}

// Собираем в массив то, что будет передаваться боту
$arr = array(
    'Сайт:' => $brief,
    'Контакт: ' => $companyContact,
    'Телефон: ' => $companyPhone,
    'E-mail: ' => $companyEmail
);

// Настраиваем внешний вид сообщения в телеграмме
foreach ($arr as $key => $value) {
    $txt .= "<b>" . $key . "</b> " . $value . "%0A";
};

// Передаем данные боту
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");
header('Content-Type: text/html; charset=utf-8');

// Выводим сообщение о результате отправки

if ($sendToTelegram) {
    echo "Спасибо! Ваша сообщение принято. Мы свяжемся с Вами в ближайшее время.";
}

// А здесь сообщение об ошибке при отправке
else {
    echo "Что-то пошло не так. Сообщение в телеграмм не отправлено! ";
}



// Инициализация коннектора к базе данных SQL
$conn = new mysqli("gubinv.beget.tech", "gubinv_brief", "JL69ki0&", "gubinv_brief");
// проверка подключения
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 


// Добавление данных в таблицу
$ins = "INSERT INTO `brief__table` (
    `dateIssue`, 
    `nameCompany`, 
    `fieldActivity`, 
    `innCompany`, 
    `companySite`, 
    `companyContact`, 
    `companyPhone`, 
    `companyEmail`, 
    `siteRival`, 
    `siteLike`, 
    `companyFonts`, 
    `companyLogo`,
    `sitelayout`
    
    )
    VALUES (
    '$dateIssue', 
    '$nameCompany', 
    '$fieldActivity', 
    '$innCompany', 
    '$companySite', 
    '$companyContact', 
    '$companyPhone', 
    '$companyEmail', 
    '$siteRival', 
    '$siteLike', 
    '$companyFonts', 
    '$companyLogo',
    '$sitelayout'
    
    )";

if ($conn->query($ins)) {
    die ("Данные успешно добавлены в базу данных");
} else {
    die ("Ошибка: " . $connector->error);
}

// -- завершение соединения с базой
$connector->close();

?>
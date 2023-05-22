<?php

    //В переменную $token нужно вставить токен, который нам прислал @botFather
    $token = "1670273806:AAED917Gd7nWkgDDq_TKv2GRZFe9ens1W8w";

    // // Проверка на наличие ссылки
    $validation = "/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i";
    
    //Сюда вставляем chat_id
    $chat_id = "538615330";

    //Определяем переменные для передачи данных из нашей формы
    if ($_POST['act'] == 'order') {
        $site = 'Разработка сайтов';
        $name = ($_POST['name']);
        $telephone = ($_POST['telephone']);
        $email = ($_POST['email']);
        $message = ($_POST['message']);

        //Собираем в массив то, что будет передаваться боту
        $arr = array(
            'Сайт:' => $site,
            'Имя: ' => $name,
            'Телефон: ' => $telephone,
            'E-mail: ' => $email,
            'Сообщение: ' => $message
        );

        //Настраиваем внешний вид сообщения в телеграмме
        foreach($arr as $key => $value) {
            $txt .= "<b>".$key."</b> ".$value."%0A";
        };

        include "chechStopWord.php";
        
        echo "$result = CheckMassege($name, $message)";


        // Проверяем на стоп слова, если нет продолжаем отправку, если нет заканчиваем
        // if ((bool)preg_match($validation, $message) === false) 
        
        if($result === false) {
            // -- Передаем данные боту
            $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");
            header('Content-Type: text/html; charset=utf-8');
            echo 'Все ок';

        } else {
            echo 'Привет! Мне не нужен робот!';
        };

        //Выводим сообщение об успешной отправке
        if ($sendToTelegram) {
            echo "Спасибо! Ваше сообщение принято. Я свяжусь с Вами в ближайшее время.";
            header('Content-Type: text/html; charset=utf-8');
        }

        //А здесь сообщение об ошибке при отправке
        else {
            echo "Спасибо! Но что-то пошло не так. Можно мне позвонить пока отправка не работает";
            header('Content-Type: text/html; charset=utf-8');
        }
    }


?>
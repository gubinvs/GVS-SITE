

<?php
// Обработка формы отправки ссылки на шаблон сайта
    //В переменную $token нужно вставить токен, который нам прислал @botFather
    $token = "1670273806:AAED917Gd7nWkgDDq_TKv2GRZFe9ens1W8w";
    

    //Сюда вставляем chat_id
    $chat_id = "538615330";

    //Определяем переменные для передачи данных из нашей формы
    if ($_POST['act'] == 'order') {
        $site = 'Ссылка на шаблон';
        $email = ($_POST['email']);
        $link = ($_POST['link']);

        //Собираем в массив то, что будет передаваться боту
            $arr = array(
                'Сайт:' => $site,
                'E-mail: ' => $email,
                'Шаблон: ' => $link
            );

        //Настраиваем внешний вид сообщения в телеграмме
            foreach($arr as $key => $value) {
                $txt .= "<b>".$key."</b> ".$value."%0A";
            };

        // если ссылок нет продолжаем отправку, если нет заканчиваем
        if ((bool)preg_match($validation, $message) === false) {

            //Передаем данные боту
            $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");
            header('Content-Type: text/html; charset=utf-8');

        } else {
            echo 'There is a link in the post';
        }

        //Выводим сообщение об успешной отправке

            if ($sendToTelegram) {
                echo "Спасибо! Ваша сообщение принято. Я свяжусь с Вами в ближайшее время.";
                header('Content-Type: text/html; charset=utf-8');
            }

        //А здесь сообщение об ошибке при отправке
            else {
                echo "Спасибо! Но что-то пошло не так. Можно мне позвонить пока отправка не работает";
                header('Content-Type: text/html; charset=utf-8');
            }
    }

?>

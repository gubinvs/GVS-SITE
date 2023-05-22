<?php
    // -- Подключаю файл обработки формы, для видимости переменных в POSTзапросе
    include ("send__wd.php");


    //-- Функция принимает два массива со стоп именами и стоп словами
    // и строку с параметрами наличия в сообщении ссылки, сообщение и имя из пост запроса.

    function CheckMassege ($name, $message) {
        // -- Создаю переменнуя которая будет содержать булевое значение, 
        // -- если стоп слово есть =  true, если нет по умолчанию false.
        // Наличие ссылки в сообщении
        $validation = '"/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i"';

        // -- Массив со стоп именами
        $stopLogin = ["Crytothast"];

        // -- Массив со стоп словами в сообщении
        $stopWords = ["робот", "зарабатывайте/i", "робота/i", "робот/i",];

        if($validation == $message){
            return true;
        } else {
            $i = 0; ;
            do {
                if($stopLogin[$i] == $name) {
                    return true;
                    break;
                }
                $i++;
            } while($i <= count($stopLogin));

            do {
                $j = 0;
                if($stopWords[$j] == $message) {
                    return true;
                    break;
                }
                $i++;
            } while($j <= count($stopWords));
        } 
        return false;
    };

    $message = " jsfk";
    $name = ['ddd'];

    $result.CheckMassege($name, $message);
    echo "'ssfdsfd' $result";

?>

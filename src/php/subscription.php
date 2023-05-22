<?php
    //запускаю сессию для работы с глобальной переменной
    

    // Инициализация коннектора к базе данных SQL
    $connectorSQL = new mysqli("gubinv.beget.tech", "gubinv_subscript", "H9CQx&Oj", "gubinv_subscript");
    $new_url = 'https://gubinvs.ru/';
    
    // проверка подключения
    if (!$connectorSQL) {
    die("Connection failed: " . mysqli_connect_error());
    }

    // Принял данные (методом post) инициализируем и присваиваем значение переменным данными из сообщения.
    if ($_POST['act'] == 'order') {
        $email = ($_POST['email']); // адрес эл. почты
    }

    // Добавление данных в таблицу
    $inst = "INSERT INTO `subscript`(`e-mail`) VALUES ('$email')";

    if ($connectorSQL->query($inst)) {
        header('Location: ' . $new_url);
    } else {
        header('Location: ' . $new_url);
    }

    // -- завершение соединения с базой
    $connectorSQL->close();
?>
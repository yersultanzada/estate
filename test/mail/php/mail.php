<?php
$msgs = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $token = "1840994147:AAHKoVhYHHmwRZxN7k6MeOq736FEwcNY7Co";
    $chat_id = "-447412630";

    if (!empty($_POST['name']) && !empty($_POST['tel'])){

        if (isset($_POST['name'])) {
            if (!empty($_POST['name'])){
                $name = "Имя: " . strip_tags($_POST['name']) . "%0A";
            }
        }
        if (isset($_POST['tel'])) {
            if (!empty($_POST['tel'])){
                $tel = "Телефон: " . "%2B" . strip_tags($_POST['tel']) . "%0A";
            }
        }
        if (isset($_POST['step1'])) {
            if (!empty($_POST['step1'])){
                $step1 = "Город: " .strip_tags($_POST['step1']) . "%0A";
            }
        }
        if (isset($_POST['step2'])) {
            if (!empty($_POST['step2'])){
                $step2 = "Цель: " .strip_tags($_POST['step2']) . "%0A";
            }
        }
        if (isset($_POST['step3'])) {
            if (!empty($_POST['step3'])){
                $step3 = "Тип недвижимости: " .strip_tags($_POST['step3']) . "%0A";
            }
        }
        if (isset($_POST['step4'])) {
            if (!empty($_POST['step4'])){
                $step4 = "Количество комнат: " .strip_tags($_POST['step4']) . "%0A";
            }
        }
        if (isset($_POST['step5'])) {
            if (!empty($_POST['step5'])){
                $step5 = "Бюджет: " .strip_tags($_POST['step5']) . "%0A";
            }
        }
        if (isset($_POST['step6'])) {
            if (!empty($_POST['step6'])){
                $step6 = "Срок: " .strip_tags($_POST['step6']) . "%0A";
            }
        }
        if (isset($_POST['step7'])) {
            if (!empty($_POST['step7'])){
                $step7 = "Дата приезда: " .strip_tags($_POST['step7']);
            }
        }
        // Формируем текст сообщения
        $txt = $name . $tel . $step1 . $step2 . $step3 . $step4 . $step5 . $step6 . $step7;

        $sendTextToTelegram = file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}");
        if ($sendTextToTelegram) {
            $msgs['okSend'] = 'Спасибо за отправку вашего сообщения!';
            echo json_encode($msgs);
        } elseif ($sendTextToTelegram) {
            $msgs['okSend'] = 'Спасибо за отправку вашего сообщения!';
            echo json_encode($msgs);
            return true;
        } else {
            $msgs['err'] = 'Ошибка. Сообщение не отправлено!';
            echo json_encode($msgs);
            die('Ошибка. Сообщение не отправлено!');
        }

    } else {
        $msgs['err'] = 'Ошибка. Вы заполнили не все обязательные поля!';
        echo json_encode($msgs);;
    }
} else {
    header ("Location: /");
}
?>

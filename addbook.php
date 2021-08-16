<?php

$message = '';
$error = '';

if (!$_COOKIE['auth']) header('Location: /');

if (isset($_POST['save'])) {
    if (empty($_POST['kniga'])) {
        $error = "<label class = 'text-danger'>Введите имя книги</lable>";
    }else if (empty($_POST['year'])) {
        $error = "<label class = 'text-danger'>Введите год книги</lable>";
    }else {
        if(file_exists('books.json')) {
            $current_data = file_get_contents('books.json');
            $array_data = json_decode($current_data, true);
            $extraI = array (
                'name' => $_POST['kniga'],
                'year' => $_POST['year']
            );
            $array_data[] = $extraI;
            $final_data = json_encode($array_data);
            if (file_put_contents('books.json', $final_data)) {
                $message = "<lable class = 'text-success'>Файл добавлен</label>";
                echo header("location: http://{$_SERVER['SERVER_NAME']}/kniga.php");
            }
        }else {
            $error = 'Файл не найден';
        }
    }
}
elseif (isset($_POST['exit'])) {
    setcookie('auth', false);
    header('Location: /');
}

?>
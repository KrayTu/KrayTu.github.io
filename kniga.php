<?php
session_start();

$message = '';
$error = '';

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
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="forma">
        <form method="post">
           <?php
            if (isset($error)) {
              echo $error;
            }
            ?>
            <label>Название книги</label>
            <input type="text" name="kniga" placeholder="Введите название">
            <label>Год книги</label>
            <input type="text" name="year" placeholder="Введите год">
            <button type="submit" name="save">Сохранить</button>
            <button type="submit" class="close">Закрыть</button>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </form>
    </div>
    <div class="library">
        <?php
        $library = file_get_contents('books.json');
        $start_library = json_decode($library, true);
        echo "<pre>";
        print_r($start_library);
        echo "<pre>";
        print_r($start_library['1']['books']);
        ?>
    </div>
<form method="post">
    <input type="submit" value="Выйти" name="exit">
</form>

<script src="modal.js"></script>
</body>
</html>

<?php

if (isset($_POST['exit'])) {
    header('Location: index.php');
}

?>
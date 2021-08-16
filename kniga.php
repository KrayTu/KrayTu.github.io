<?php
require_once('addbook.php');
require_once('search.php');

$page = $_GET['page'];
/*$count = 3;

$library = file_get_contents('books.json');
$start_library = json_decode($library, true);
foreach ($start_library as $book) {
    $arBook[] = $book;
}
$page_count = floor(count($start_library) / $count);

for ($i = $page*$count; $i < ($page + 1)*$count; $i++) {}*/

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
            <input type="submit" class="exit" value="Выйти" name="exit">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <div class="form-search">
                <input class="" type="search" name="search" placeholder="Введите что ищите"><input type="submit" class="search" name="submitSearch" value="Поиск">
                <div class="endSearch"><?php echo "Книга найдена: ".$finalBook['name']." Год: ".$finalBook['year'] ?></div>
            </div>
        </form>
    </div>
    <div class="numberPage">
        <h1>Страница <?php echo $page + 1;?></h1>
    </div>
    <div class="book">
        <ul class="library">
            <?php
            $page = $_GET['page'];
            $count = 3;
            $library = file_get_contents('books.json');
            $start_library = json_decode($library, true);
            $page_count = ceil(count($start_library) / $count);
            for ($i = $page*$count; $i < ($page + 1)*$count; $i++) {
                if ($start_library[$i] != NULL) {
                    echo '<li>Название книги: ' . $start_library[$i]['name'] . ' Год: ' . $start_library[$i]['year'] . '</li>';
                }
            }
            ?>
        </ul>
    </div>
    <div class="page_list">
        <?php for ($p = 0; $p <= $page_count; $p++)  :?>
            <a href="?page=<?php echo $p;?>"><button class="page_button"><?php echo $p + 1; ?></button></a>
        <?php endfor; ?>
    </div>
</body>
</html>
<?php

if (isset($_POST['submitSearch']) && isset($_POST['search'])) {
    $search = $_POST['search'];
    $library_books = file_get_contents('books.json');
    $library_data = json_decode($library_books,true);
    foreach ($library_data as $searchBook) {
        if ($search == $searchBook['name'] || $search == $searchBook['year']) {
            $arSearchedBooks[] = $searchBook;
            foreach ($arSearchedBooks as $finalBook) {
            }
        }
    }
} //elseif (count($arSearchedBooks) === 0) echo 'Книга не найдена';

?>


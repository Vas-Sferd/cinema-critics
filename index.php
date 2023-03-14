<?php require 'db.php' ?>

<!DOCTYPE html>
<html>

<head>
    <title>Movie Reviews</title>
</head>

<body>
    <?php

    // // Выборка названий таблиц
    // $query = $connection->query("SELECT name FROM sqlite_master WHERE type='table'");

    // // Вывод результатов запроса
    // while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    //     echo $row['name'] . '<br>';
    // }

    //Проверяем, авторизован ли пользователь
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $user_role = $_SESSION['user_role'];

        //Выводим приветствие и ссылку на создание нового обзора, если пользователь администратор или модератор
        if ($user_role == 'admin' || $user_role == 'moderator') {
            echo "<p>Welcome, User #$user_id. <a href='add_review.php'>Create a new review</a>.</p>";
        } else {
            echo "<p>Welcome, User #$user_id.</p>";
        }

        //Выводим кнопку выхода из аккаунта
        echo "<form action='logout.php' method='POST'><input type='submit' value='Log out'></form>";
    } else {
        //Выводим ссылки на авторизацию и регистрацию для не авторизованных пользователей
        echo "<p><a href='login.php'>Log in</a> to post reviews and comments, or <a href='register.php'>register</a> if you're new here.</p>";
    }

    //Запрос на получение всех обзоров фильмов из базы данных
    $query = "SELECT * FROM 'reviews'";
    $stmt = $connection->query($query);
    $reviews = $stmt->fetch(PDO::FETCH_ASSOC);

    //Отображаем каждый обзор на главной странице
    foreach ($reviews as $review) {
        echo "<h2><a href='review.php?id={$review['id']}'>{$review['title']}</a></h2>";
        echo "<p>By {$review['author']} at " . date('F j, Y', strtotime($review['date'])) . "</p>";
        echo "<img src='{$review['poster']}' alt='{$review['title']}'>"; // для отображения постера фильма
        echo "<p>{$review['summary']}</p>";
        echo "<hr>";
    }
    unset($connection)
    ?>
</body>

</html>
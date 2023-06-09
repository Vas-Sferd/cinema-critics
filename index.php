<!DOCTYPE html>
<html>

<head>
    <title>Movie Reviews</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>Movie Reviews</h1>
        </div>
    </header>

    <main>
        <div class="container">
            <?php
            // Подключаемся к базе данных PostgreSQL
            $dbname = "movie_reviews";   // getenv('PG_DBNAME');
            $user = "appuser";           // getenv('PG_USER');
            $pass = "avx512";            // getenv('PG_PASS');
            $host = "localhost";         // getenv('PG_HOST');
            $port = "5432";               // getenv('PG_PORT');

            $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);

            // Проверяем, авторизован ли пользователь
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                $user_role = $_SESSION['user_role'];

                // Выводим приветствие и ссылку на создание нового обзора, если пользователь администратор или модератор
                if ($user_role == 'admin' || $user_role == 'moderator') {
            ?>
                    <p>Welcome, User #<?= $user_id ?>. <a href='add_review.php'>Create a new review</a>.</p>
                <?php
                } else {
                ?>
                    <p>Welcome, User #<?= $user_id ?>.</p>
                <?php
                }

                // Выводим кнопку выхода из аккаунта
                ?>
                <form action='logout.php' method='POST'><input type='submit' value='Log out'></form>
            <?php
            } else {
                // Выводим ссылки на авторизацию и регистрацию для не авторизованных пользователей
            ?>
                <p><a href='login.php'>Log in</a> to post reviews and comments, or <a href='register.php'>register</a> if you're new here.</p>
            <?php
            }

            // Запрос на получение всех обзоров фильмов из базы данных
            $query = "SELECT * FROM reviews";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $reviews = $stmt->fetchAll();

            // Отображаем каждый обзор на главной странице
            foreach ($reviews as $review) {
            ?>
                <h2><a href='review.php?id=<?= $review['id'] ?>'><?= $review['title'] ?></a></h2>
                <p>By <?= $review['author'] ?> at <?= date('F j, Y', strtotime($review['date'])) ?></p>
                <img src='<?= $review['poster'] ?>' alt='<?= $review['title'] ?>'>
                <p><?= $review['summary'] ?></p>
                <hr>
            <?php
            }
            ?>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2022 Movie Reviews</p>
        </div>
    </footer>
</body>

</html>
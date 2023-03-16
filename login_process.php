<?php
session_start(); // начинаем сессию

// проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // получаем данные из формы
  $username = $_POST['username'];
  $password = $_POST['password'];

  // подключаемся к базе данных
  $dbconn = pg_connect("host=localhost dbname=mydb user=myuser password=mypass")
    or die('Не удалось соединиться: ' . pg_last_error());

  // ищем пользователя в базе данных
  $query = "SELECT * FROM users WHERE username=$1";
  $result = pg_prepare($dbconn, "", $query);
  $result = pg_execute($dbconn, "", array($username));
  $row = pg_fetch_assoc($result);

  // проверяем, найден ли пользователь и соответствует ли его пароль
  if ($row && password_verify($password, $row['password'])) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $row['role'];
    header("Location: index.php");
    exit();
  } else {
    echo "Неправильный логин или пароль";
  }

  // закрываем соединение с базой данных
  pg_close($dbconn);

} else {
  header("Location: index.php");
  exit();
}

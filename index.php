<?php require 'db.php' ?>

<?php

$query = "SELECT * FROM `screenshot` WHERE public = 1 ORDER BY `date` DESC LIMIT 2";
$images = $connection->query($query);

$output = "";

session_start();

$welcome = "";
if (isset($_SESSION['name'])) {
  $welcome = "привет," . $_SESSION['name'];
}

?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style.css">

  <form class="login-form" id="login-form" method="POST" dataset="login-form">
    <div class="form-container">
      <label for="loginForm-name-input">имя</label>
      <input id="loginForm-name-input" type="name" name="name" required="" placeholder="Иван" pattern="[А-Яа-яA-Za-z\s-]*" title="Используйте русские или латинские буквы">

      <label for="loginForm-password-input">Пароль</label>
      <input id="loginForm-password-input" type="password" name="password" required="">

      <input type="submit" value="Войти">

      <div class="button" id="login-form-button-to-signup">Регистрация</div>
    </div>
  </form>
  <form class="login-form" id="signup-form" dataset="singup-form">
    <div class="form-container">
      <label for="signupForm-name-input">Имя</label>
      <input id="signupForm-name-input" type="name" name="name" required="" placeholder="Иван" pattern="[А-Яа-яA-Za-z\s-]*" title="Используйте русские или латинские буквы">

      <label for="signupForm-email-input">E-mail</label>
      <input id="signupForm-email-input" type="email" name="email" required="" placeholder="example@example.com" title="Введите email">

      <label for="signupForm-phone-input">Телефон</label>
      <input id="signupForm-phone-input" type="text" name="phone" required="" placeholder="89205108779" pattern="8\d{3}\d{3}\d{2}\d{2}" title="Введите телефон в формате 8**********">

      <label for="signupForm-password-input">Пароль</label>
      <input id="signupForm-password-input" type="password" name="password" required="" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" title="Минимум 6 символов. Обязательно наличие букв и цифр">

      <label for="signupForm-passwordRepeat-input" class="form-label password-form-label">Повторите пароль</label>
      <input id="signupForm-passwordRepeat-input" type="password" required="" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Минимум 8 символов. Обязательно наличие букв и цифр">

      <label for="signupForm-checkbox-input">Соглашение на обработку персональных данных</label>
      <input id="signupForm-checkbox-input" type="checkbox" required="">

      <input type="submit" class="form-signup-button" value="Регистрация">

      <div class="button" id="signup-form-button-to-login">Вход</div>
    </div>
  </form>

</head>

<body>
  <div class="main-content">
    <header>
      <a href="">
        Файлообменник
      </a>
      <?= $welcome ?>
      <?php
      if (isset($_SESSION['name'])) {
        echo "<div class='login-button' id='header_logout_button'>Выход</div>";
      } else {
        echo "<div class='login-button' id='header_login_button'>Вход</div>";
      }
      ?>
    </header>

    <div class="upload-shot">
      Перетащите сюда скриншот
    </div>

    <div id="images-container" class="screenshot-container">
      <?php foreach ($images as $row) : ?>
        <a href="detailed_page.php?idd=<?= $row['path'] ?>">
          <div class="screenshot">
            <img src="images/<?= $row['path'] ?>">
            Дата добавления: <?= $row['date'] ?>
          </div>
        </a>
      <?php
      endforeach;
      ?>

    </div>
    <button id="load_new_images" offset="2">ЗАГРУЗИТЬ СЛЕДУЮЩЕЕ</button>
    <div class="h-footer">
      <div>
      </div>
</body>
<!-- script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script -->
<script src="script.js"></script>

</html>
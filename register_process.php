<?php
// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Подключаемся к базе данных
  include "db.php";
  
  // Получаем значения полей из формы
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];
  
  // Проверяем, что пароли совпадают
  if ($password !== $confirm_password) {
    // Если пароли не совпадают, перенаправляем обратно на страницу регистрации
    header("Location: register.php?error=password_mismatch");
    exit();
  }
  
  // Хэшируем пароль
  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  
  // Записываем нового пользователя в базу данных
  $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
  $stmt->execute([$username, $email, $password_hash, "user"]);
  
  // Редиректим на главную страницу сайта
  header("Location: index.php");
  exit();
}

// Если форма не была отправлена, перенаправляем обратно на страницу регистрации
header("Location: register.php");
exit();
?>
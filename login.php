<!DOCTYPE html>
<html>
<head>
  <title>Login - Movie Reviews</title>
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
      <h2>Login</h2>
      
      <form action="login_process.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        
        <input type="submit" value="Log in">
      </form>
      
      <p>Don't have an account yet? <a href="register.php">Register now</a>.</p>
    </div>
  </main>
  
  <footer>
    <div class="container">
      <p>&copy; 2022 Movie Reviews</p>
    </div>
  </footer>
  
  <script src="login.js"></script>
</body>
</html>
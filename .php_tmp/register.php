<!DOCTYPE html>
<html>
<head>
  <title>Register - Movie Reviews</title>
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
      <h2>Register</h2>
      
      <form action="register_process.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        
        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br>
        
        <input type="submit" value="Register">
      </form>
      
      <p>Already have an account? <a href="login.php">Log in</a>.</p>
    </div>
  </main>
  
  <footer>
    <div class="container">
      <p>&copy; 2022 Movie Reviews</p>
    </div>
  </footer>
  
  <script src="register.js"></script>
</body>
</html>
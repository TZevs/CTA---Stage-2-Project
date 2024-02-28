<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <script src="https://kit.fontawesome.com/683ed5d49e.js" crossorigin="anonymous"></script>
    <title>LoginPage</title>
</head>
<body>
    <header>
        <div class="header-logo">
            <h1 class="header-logo-text">C.T.A</h1>
            <p class="header-logo-text">Currency Transfer Application</p>
        </div>
    </header>
    <main>
        <div class="container login-container">
            <form method="post" class="form login-form">
                <h2>Login</h2>
                <div class="login-form-input">
                    <div>
                        <label for="username">Username: </label>
                        <input type="text" name="username" id="username" placeholder="Enter Your Username" value="" />
                    </div>
                    <div>
                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password" placeholder="Enter Your Password" value="" />
                    </div>
                    <div>
                        <input type="checkbox" name="remember" id="remember" value="1" />
                        <label for="remember">Remember Me</label>
                    </div>
                </div>
                <div class="login-form-btn">
                    <input type="submit" value="Login" />
                    <input type="submit" value="Staff Login" />
                    <a href="register.php" class="login-form-register">Register</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
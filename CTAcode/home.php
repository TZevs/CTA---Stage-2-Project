<?php
    require_once("includes/db_conn.php");
    $wallets = "SELECT * FROM currencywallets";
    $wallet_result = $mysqli->query($wallets);
    // Inner join the wallet currency id to the currency table id so i can get the currency info theough the id in wallet table.
    // Update PHPADMIN db so that it matches updates in sqlite.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <script src="https://kit.fontawesome.com/683ed5d49e.js" crossorigin="anonymous"></script>
    <title>Home and Wallets</title>
</head>
<body>
    <header>
        <div class="header-logo">
            <h1 class="header-logo-text">C.T.A</h1>
            <p class="header-logo-text">Currency Transfer Application</p>
        </div>
        <nav class="header-navbar">
            <ul class="header-navbar-list">
                <li class="header-navbar-list-item item-active"><a href="home.php">Wallets</a></li>
                <li class="header-navbar-list-item"><a href="exchangeRate.php">Exchange Rates</a></li>
                <li class="header-navbar-list-item"><a href="transfers.php">Transfers</a></li>
                <li class="header-navbar-list-item"><a href="profile.php"><i class="fa-solid fa-user"></i></a></li>
                <li class="header-navbar-list-item"><a href="register.php">Register</a></li>
                <li class="header-navbar-list-item"><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <h2>Currency Wallets</h2>
                <?php
                    while ($obj = $wallet_result->fetch_object()) {
                        echo "<div class=\"container-wallet\">";
                        echo "<h3>Currency Name</h3>";
                        echo "<h4>Amount: {}</h4>";
                        echo "</div>";
                    }
                ?>
        </div>
    </main>
</body>
</html>
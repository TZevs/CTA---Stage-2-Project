<?php
    require_once("includes/db_conn.php");
    $rates = "SELECT * FROM currencies";
    $rate_results = $mysqli->query($rates);
    // Add more data to the currency table. - Probably done manually.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/683ed5d49e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/main.css">
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
                <li class="header-navbar-list-item"><a href="home.php">Wallets</a></li>
                <li class="header-navbar-list-item item-active"><a href="exchangeRate.php">Exchange Rates</a></li>
                <li class="header-navbar-list-item"><a href="transfers.php">Transfers</a></li>
                <li class="header-navbar-list-item"><a href="profile.php"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <h2>Exchange Rates</h2>
            <table class="exchange-table">
                <tr class="exchange-table-headers">
                    <th>Currency Name</th>
                    <th>Exchange Rate</th>
                    <th>Highest</th>
                    <th>Lowest</th>
                </tr>
                <?php
                    while ($obj = $rate_results->fetch_object()) {
                       echo "<tr class=\"exchange-table-content\">";
                        echo "<td>{$obj->shorthand}</td>";
                        echo "<td>{$obj->exchange_rate}<td>";
                        echo "<td>{$obj->highest_yr_rate}<td>";
                        echo "<td>{$obj->lowest_yr_rate}<td>";
                       echo "</tr>"; 
                    }
                ?>
            </table>
        </div>
    </main>
</body>
</html>
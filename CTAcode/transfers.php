<?php
    require_once("includes/db_conn.php");
    $exchange = "SELECT * FROM currencies";
    $exchange_result = $mysqli->query($exchange);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <script src="js/main.js"></script>
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
                <li class="header-navbar-list-item"><a href="home.php">Wallets</a></li>
                <li class="header-navbar-list-item"><a href="exchangeRate.php">Exchange Rates</a></li>
                <li class="header-navbar-list-item item-active"><a href="transfers.php">Transfers</a></li>
                <li class="header-navbar-list-item"><a href="profile.php"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container transfer-container">
            <div class="transfer-tabs">
                <button class="transfer-tab-links" onclick="openTransfers(event, 'from-bank')">From Bank</button>
                <button class="transfer-tab-links" onclick="openTransfers(event, 'wallet-transfers')">Wallet Transfers</button>
                <button class="transfer-tab-links" onclick="openTransfers(event, 'create-wallet')">Create Wallet</button>
            </div>
            <div id="from-bank" class="transfer-tab-content">
                <h2>Transaction</h2>
            </div>
            <div id="wallet-transfers" class="transfer-tab-content">
                <h2>Transaction</h2>
            </div>
            <div id="create-wallet" class="transfer-tab-content"> 
                <form action="" method="" class="form wallet-form">
                    <h2>Create Wallet</h2>
                    <div class="wallet-form-input">
                        <div>
                            <label for="currency">Currency: </label>
                            <select name="currency" id="currency">
                                <option>--Please Select a Currency--</option>
                                <?php
                                while ($obj = $exchange_result->fetch_object()) {
                                    echo "<option>{$obj->shorthand} : {$obj->currency_name} : {$obj->currency_sign}</option>";
                                }
                                ?>
                            </select>
                        </div> 
                        <div>
                            <label for="new-wallet-amount">Amount: </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
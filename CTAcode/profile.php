<?php
    require_once("includes/db_conn.php");
    $prof_info = "SELECT * FROM customeraccounts WHERE user_id = 1";
    $prof_result = $mysqli->query($prof_info);
    $user_email = "SELECT email_address FROM users WHERE user_id = 1";
    $email_result =$mysqli->query($user_email);
?>
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
                <li class="header-navbar-list-item"><a href="home.php">Wallets</a></li>
                <li class="header-navbar-list-item"><a href="exchangeRate.php">Exchange Rates</a></li>
                <li class="header-navbar-list-item"><a href="transfers.php">Transfers</a></li>
                <li class="header-navbar-list-item item-active"><a href="profile.php"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container profile-container">
            <form action="" method="" class="form profile-form">
                <h2><i class="fa-regular fa-user"></i></h2>
                <h3>Account Profile</h3>
                <?php
                    $obj = $prof_result->fetch_object();
                    $email = $email_result->fetch_object();
                    echo "<div class=\"profile-form-input\">";
                        echo "<div>";
                            echo "<label for=\"firstName\">First Name: </label>";
                            echo "<input type=\"text\" name=\"firstName\" id=\"firstName\" value={$obj->first_name} required />";
                        echo "</div>";
                        echo "<div>";
                            echo "<label for=\"middleName\">Middle Name: </label>";
                            echo "<input type=\"text\" name=\"middleName\" id=\"middleName\" value={$obj->middle_name} />";
                        echo "</div>";
                        echo "<div>";
                            echo "<label for=\"lastName\">Surname: </label>";
                            echo "<input type=\"text\" name=\"lastName\" id=\"lastName\" value={$obj->last_name} required />";
                        echo "</div>";
                        echo "<div>";
                            echo "<label for=\"email\">Email Address: </label>";
                            echo "<input type=\"email\" name=\"email\" id=\"email\" value={$email->email_address} required />";
                        echo "</div>";
                        echo "<div>";
                            echo "<label for=\"dob\">Date of Birth: </label>";
                            echo "<input type=\"text\" name=\"dob\" id=\"dob\" value={$obj->dob} required />";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class=\"profile-form-input\">";
                        echo "<h3>Home Address</h3>";
                        echo "<div>";
                            echo "<label for=\"homeAddress1\">Home Address: </label>";
                            echo "<input type=\"text\" name=\"homeAddress1\" id=\"homeAddress1\" value={$obj->home_address_1} required />";
                        echo "</div>";
                        echo "<div>";
                            echo "<label for=\"homeAddress2\">Home Address: </label>";
                            echo "<input type=\"text\" name=\"homeAddress2\" id=\"homeAddress2\" value={$obj->home_address_2} required />";
                        echo "</div>";
                        echo "<div>";
                            echo "<label for=\"city\">City: </label>";
                            echo "<input type=\"text\" name=\"city\" id=\"city\" value={$obj->city} required />";
                        echo "</div>";
                        echo "<div>";
                            echo "<label for=\"postcode\">Postcode: </label>";
                            echo "<input type=\"text\" name=\"postcode\" id=\"postcode\" value={$obj->postcode} required />";
                        echo "</div>";
                    echo "</div>";
                ?>
                <div class="profile-form-btn">
                    <input type="submit" value="Update">
                </div>
            </form>
        </div>
    </main>
</body>
</html>

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
                <div class="profile-form-input">
                    <label for="firstName">First Name: </label>
                    <input type="text" name="firstName" id="firstName" value="" required />

                    <label for="middleName">Middle Name: </label>
                    <input type="text" name="middleName" id="middleName" value="" />

                    <label for="lastName">Surname: </label>
                    <input type="text" name="lastName" id="lastName" value="" required />

                    <label for="email">Email Address: </label>
                    <input type="email" name="email" id="email" value="" required />

                    <label for="dob">Date of Birth: </label>
                    <input type="text" name="dob" id="dob" value="" required />
                </div>
                <div class="profile-form-input">
                    <h3>Home Address</h3>
                    <label for="houseNum">House Number: </label>
                    <input type="text" name="houseNum" id="HouseNum" value="" required />

                    <label for="streetName">Street Name: </label>
                    <input type="text" name="streetName" id="streetName" value="" required />

                    <label for="city">City: </label>
                    <input type="text" name="city" id="city" value="" required />

                    <label for="postcode">Postcode: </label>
                    <input type="text" name="postcode" id="postcode" value="" required />
                </div>
                <div class="profile-form-btn">
                    <input type="submit" value="Update">
                </div>
            </form>
        </div>
    </main>
</body>
</html>
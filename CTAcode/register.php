<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <script src="https://kit.fontawesome.com/683ed5d49e.js" crossorigin="anonymous"></script>
    <title>RegisterHere</title>
</head>
<body>
    <header>
        <div class="header-logo">
            <h1 class="header-logo-text">C.T.A</h1>
            <p class="header-logo-text">Currency Transfer Application</p>
        </div>
    </header>
    <main>
        <div class="container register-container">
            <form action="" method="" class="form register-form">
                <h2>Register</h2>
                <div class="register-form-input">
                    <div>
                        <label for="firstName">First Name: </label>
                        <input type="text" name="firstName" id="firstName" placeholder="Enter Your First Name" required />
                    </div>
                    <div>
                        <label for="middleName">Middle Name: </label>
                        <input type="text" name="middleName" id="middleName" placeholder="Enter Your Middle Name" />
                    </div>
                    <div>
                        <label for="lastName">Surname: </label>
                        <input type="text" name="lastName" id="lastName" placeholder="Enter Your Surname" required />
                    </div>
                    <div>
                        <label for="email">Email Address: </label>
                        <input type="email" name="email" id="email" placeholder="Enter Your Email" required />
                    </div>
                    <div>
                        <label for="dob">Date of Birth: </label>
                        <input type="date" name="dob" id="dob" required />
                    </div>
                </div>
                <div class="register-form-input">
                    <h3>Home Address</h3>
                    <div>
                        <label for="houseNum">House Number: </label>
                        <input type="text" name="houseNum" id="HouseNum" placeholder="Enter Your House Number" required />
                    </div>
                    <div>
                        <label for="streetName">Street Name: </label>
                        <input type="text" name="streetName" id="streetName" placeholder="Enter Your Street Name" required />
                    </div>
                    <div>
                        <label for="city">City: </label>
                        <input type="text" name="city" id="city" placeholder="Enter Your City" required />
                    </div>
                    <div>
                        <label for="postcode">Postcode: </label>
                        <input type="text" name="postcode" id="postcode" placeholder="Enter Your Postcode" required />
                    </div>
                </div>
                <div class="register-form-btn">
                    <input type="submit" value="Register">
                    <a href="login.php">Back</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/createAccount.css">
    <title>Create Account</title>
</head>
<body>
    <div class="header">
        <div class="left">
            <a href="/index.php">Participants</a>
            <a href="/index.php">Times</a>
            <a href="/index.php">Directors</a>
        </div>
        <div class="right">
            <a href="">Login</a>
            <a href="">Create Account</a>
        </div>
    </div>
    <h2>Create a Race Entry Account</h2>
    <form method="POST" action="">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required><br><br>

        <label for="lastName">Last Name:</label>
        <input type="lastName" id="lastName" name="lastName" placeholder="Enter your last name" required><br><br>

        <label for="orgName">Organization Name:</label>
        <input type="text" id="orgName" name="orgName" placeholder="Enter your org name" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" placeholder="Enter your phone #" required><br><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" placeholder="Enter your email" required><br><br>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" placeholder="Enter your password" required><br><br>

        <label for="accountType">Account Type:</label>
        <input type="text" id="accountType" name="accountType" placeholder="Enter your account type" required><br><br>

        <button type="submit">Create Account</button>
    </form>
</body>

<?php

    function createAccount($firstName, $lastName, $orgName, $phone, $email, $password, $accountType) {
        echo "<p>createAccount function run</p>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // grab data
        $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_STRING);
        $orgName = filter_input(INPUT_POST, "orgName", FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
        $accountType = filter_input(INPUT_POST, "accountType", FILTER_SANITIZE_STRING);

        debug_to_console($num01);
        
        // error handlers
        $errors = false;
        if (empty($firstName) || empty($lastName) || empty($orgName) || empty($phone) || empty($email) || empty($password) || empty($accountType)) {
            echo "<p>Fill in all fields</p>";
            $errors = true;
        }
        
        //insert data if no errors
        if (!$errors) {
            createAccount($firstName, $lastName, $orgName, $phone, $email, $password, $accountType);
        }
    };

?>
</html>
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
        <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required><br><br>

        <label for="orgName">Organization Name:</label>
        <input type="text" id="orgName" name="orgName" placeholder="Enter your org name" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" placeholder="Enter your phone #" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required><br><br>

        <label for="accountType">Account Type:</label>
        <input type="text" id="accountType" name="accountType" placeholder="Enter your account type" required><br><br>

        <button type="submit">Create Account</button>
    </form>

<?php
include 'db.php';

function createAccount($conn, $firstName, $lastName, $orgName, $phone, $email, $password, $accountType) {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); 

    $sql = "INSERT INTO users (first_name, last_name, org_name, phone, email, password, account_type) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $firstName, $lastName, $orgName, $phone, $email, $hashedPassword, $accountType);

    if ($stmt->execute()) {
        echo "<p>Account created successfully!</p>";
    } else {
        error_log("Database Error: " . $stmt->error); 
        echo "<p>Something went wrong. Please try again later.</p>";
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_SPECIAL_CHARS);
    $orgName = filter_input(INPUT_POST, "orgName", FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $accountType = filter_input(INPUT_POST, "accountType", FILTER_SANITIZE_SPECIAL_CHARS);

    $errors = false;
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
        echo "<p>All fields are required!</p>";
        $errors = true;
    }

    if (!$errors) {
        createAccount($conn, $firstName, $lastName, $orgName, $phone, $email, $password, $accountType);
    }
}
?>
</body>
</html>

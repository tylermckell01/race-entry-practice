<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/createRace.css">
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
            <a href="">Create Race</a>
        </div>
    </div>
    <h2>Create a Race Entry Account</h2>
    <form method="POST" action="">
        <label for="name">First Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required><br><br>

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

        <button type="submit">Submit</button>
    </form>
</body>
</html>
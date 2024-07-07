<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log in</title>
    <link rel="stylesheet" href="./stylesheets/login.css" />
</head>
<body>
    <header>
        <div>
            <div class="logo-text">
                <h2>Aquatrack</h2>
                <p>Drink Pure, Live Pure</p>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="customers_information.php">View Record</a></li>
            </ul>
        </nav>
    </header>

    <div class="form">
        <form action="login_process.php" method="POST">
            <h1>Log In</h1>
            <input type="email" name="email" id="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit">Submit</button>
        </form>
    </div>

    <section class="footer">
        <p class="copyright">© 2024 by PPG. All rights reserved.</p>
    </section>
</body>
</html>

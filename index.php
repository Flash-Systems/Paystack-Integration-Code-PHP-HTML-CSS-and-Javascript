<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Paystack Payment Integration</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class ="container">
            <img src="images/phpback.jpg" alt="">
            <small>PHP Savvy E-book</small>
            <small>Price: N1,500</small>
            <form action="pay.php" method="POST">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="" placeholder="First Name...">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="" placeholder="Last Name...">
                <label for="email">Email</label>
                <input type="email" name="email" id="" placeholder="Email...">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="" placeholder="Phone number...">
                <button name="sub">Buy!</button>
            </form>
        </div>
    </body>
</html>
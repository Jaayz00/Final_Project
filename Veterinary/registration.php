<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'database.php';

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $checkUser = "SELECT * FROM Users WHERE username='$username' OR email='$email'";
    $result = $conn->query($checkUser);

    if ($result->num_rows > 0) {
        echo "Username or email already exists.";
    } else {
        $sql = "INSERT INTO Users (username, password, email, phone, role) VALUES ('$username', '$password', '$email', '$phone', 'user')";

        if ($conn->query($sql) === TRUE) {
            echo "New user registered successfully.";
            header("Location: login.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            font-family: Century Gothic;
        }
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('pics/milad-fakurian-IQN_eAgUyI4-unsplash.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        img{
            position: absolute;
            top: 0;
            left: 0;
            margin: 0;
            margin-top: -70px;
            width: 300px;
            height: auto;
        }
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .registration-form {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            padding: 70px 70px;
            border-radius: 10px;
            box-shadow: 0 0 5px #DAD7CD, 0 0 15px #DAD7CD;
            backdrop-filter: blur(4px);
        }
        .registration-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .registration-form label {
            display: flex;
            margin-bottom: 10px;
        }
        .registration-form input {
            width: 92%;
            margin-bottom: 20px;
            border: 2px solid white;
            border-radius: 5px;
            padding: 10px;
            background-color: transparent;
            color: #fff;
        }
        .registration-form button {
            width: 100%;
            padding: 10px;
            background-color: transparent;
            color: #fff;
            border: 2px solid white;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.6s ease-out;
            font-size: 18px;
        }
        .registration-form button:hover {
            background-color: #F1B6AC;
            color: #fff;
            box-shadow: 0 0 5px #DAD7CD, 0 0 15px #DAD7CD;
        }
        footer {
            background-color: #fff;
            color: black;
            padding: 6px 0;
            text-align: center;
            width: 100%;
        }
        footer .footer-content {
            display: flex;
            justify-content: space-around;
            max-width: 1200px;
            margin: auto;
            flex-wrap: wrap;
        }
        footer .footer-content div {
            flex: 1;
            margin: 10px;
        }
        footer .footer-content h3 {
            margin-bottom: 5px;
            font-size: 16px;
        }
        footer .footer-content p,
        footer .footer-content a {
            color:black;
            text-decoration: none;
            font-size: 14px;
        }
        footer .footer-content a:hover {
            text-decoration: underline;
        }
        footer .social-media {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        footer .social-media a {
            color: black;
            font-size: 18px;
            margin: 0 8px;
            transition: 0.6s ease-out;
        }
        footer .social-media a:hover {
            color: #ddd;
        }
    </style>
</head>
<body>
    <img src="pics/logo.png">
    <div class="content">
        <form class="registration-form" action="registration.php" method="post">
            <h2>Registration</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone">
            
            <button type="submit">Register</button>
        </form>
    </div>
    <footer>
        <div class="footer-content">
            <div>
                <h3>About Mayon veterinary Care Specialist Co</h3>
                <p>Providing passionate pet care since 2008.</p>
            </div>
            <div>
                <h3>Contact Us</h3>
                <p>Phone: 0938 866 4009</p>
                <p>Address: 1st Floor ARNISP Building, P. Burgos cor MH del Pilar St, Sipi, Daraga, Albay, Daraga, Philippines</p>
            </div>
        </div>
        <div class="social-media">
            <a href="https://www.facebook.com/mayonveterinarycarespecialists"><i class="fab fa-facebook"></i></a>
        </div>
    </footer>
</body>
</html>
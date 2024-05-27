<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Veterinary Services, Grooming, Pet Supplies">
    <meta name="keywords" content="Vaccinatio, Pet grooming">
    <meta name="author" content="Mayon veterinary Clinic">
    <title>Salon Booking System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style type="text/css">
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Century Gothic;
    }
    body, html {
        height: 100%;
    }
    header {
        background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('pics/milad-fakurian-IQN_eAgUyI4-unsplash.jpg');
        height: 80vh;
        background-size: cover;
        background-position: center;
        position: relative;
    }
    .main img {
        position: absolute;
        top: 0;
        left: 0;
        margin: 0;
        margin-top: -70px;
        width: 300px;
        height: auto; 
    }
    ul {
        float: right;
        list-style-type: none;
        margin-top: 20px;
    }
    ul li {
        display: inline-block;
    }
    ul li a {
        text-decoration: none;
        color: #fff;
        padding: 5px 20px;  
        border: 1px solid #fff;
        transition: 0.6s ease-out;
    }
    ul li a:hover {
        background-color: #fff;
        color: #000;
    }
    ul li.active a {
        background-color: #fff;
        color: #000;
    }
    .main {
        max-width: 1200px;
        margin: auto;
    }
    .title {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .title h1 {
        color: #fff;
        font-size: 50px;
        font-family: Brush Script MT;
    }
    .title p {
        color: #fff;
        font-size: 20px;
        text-align: center;
    }
    .button {
        position: absolute;
        top: 65%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .btn {
        border: 1px solid #fff;
        padding: 10px 30px;
        text-decoration: none;
        transition: 0.6s ease-out;
    }
    .btn:hover {
        background-color: #fff;
        color: #000;
    }
    .dropbtn {
        color: #000;
        font-size: 16px;
        border: none;
        text-decoration: none;
        padding: 5px 20px;  
        border: 1px solid #fff;
        transition: 0.6s ease-out;
    }
    .dropdown {
        position: relative;
        display: inline-block;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
    .dropdown-content a {
        color: #fff;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        transition: 0.6s ease-out;
    }
    .dropdown-content a:hover {
        color: #000;
        background-color: #fff;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }
    .services {
        padding: 50px 0;
        background-color: #f4f4f4;
        text-align: center;
    }
    .services h2 {
        font-size: 40px;
        margin-bottom: 20px;
    }
    .services p {
        font-size: 18px;
        margin-bottom: 10px;
        color: #555;
    }
    .service-box {
        max-width: 1200px;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }
    .service-box div {
        background: #fff;
        margin: 10px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        flex-basis: 30%;
    }
    .service-box div img {
        width: 100%;
        border-radius: 10px;
    }
    .service-box div h3 {
        margin: 15px 0 10px;
        font-size: 22px;
    }
    .service-box div p {
        color: #777;
    }
    footer {
        background-color: #F1B6AC;
        color: #fff;
        padding: 6px 0;
        text-align: center;
        position: relative;
        bottom: 0;
        width: 100%;
        height: 191px;
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
        color: #fff;
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
        color: #fff;
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
    <header>
        <div class="main">
            <img src="pics/logo.png" alt="SkinFab Spa Logo">
            <nav>
                <ul>
                    <li><a href="landing_page.php">Home</a></li>
                    <li  class="active"><a href="#services">Services</a></li>
                    <div class="dropdown">
                        <button class="dropbtn">Account Login</button>
                        <div class="dropdown-content">
                            <a href="registration.php">Registration</a>
                            <a href="login.php">User Login</a>
                            <a href="admin_login.php">Admin Login</a>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>
        <div class="title">
            <h1>Mayon Veterinary Care Specialist Co.</h1>
            <p>"Providing compassionate pet care since 2008"</p>
        </div>
    </header>

    <section id="services" class="services">
        <h2>Our Services</h2>
        <div class="service-box">
             <div>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXemnXXOqmLd5xIdl5dKYG15cQH5vTy-P8M0VRsC8auw&s" alt="andrey">
                <h3>Pet Vaccination</h3>
                <p>Get your Pet Vaccinated.</p>
            </div>
            <div>
                <img src="https://static01.nyt.com/images/2020/12/20/multimedia/20virus-vaccine1a/20virus-vaccine1a-superJumbo-v2.jpg" alt="Service 2">
                <h3>Rabies vaccination</h3>
                <p>Get Vaccinated for rabies</p>
            </div>
             <div>
                <img src="data:image/jpeg;base64,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" alt="Service 3">
                <h3>Pet Grooming</h3>
                <p>Get your pet groomed to Look Fabulous</p>
            </div>
            
        </div>
        <div class="social-media">
            <a href="https://www.facebook.com/mayonveterinarycarespecialists"><i class="fab fa-facebook"></i></a>
        </div>
    </footer>
</body>
</html>

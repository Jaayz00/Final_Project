<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id']; // Get user ID from session
    
    if (isset($_POST['make_appointment'])) {
        $date = $_POST['date'];
        $time = $_POST['time'];
        $service = $_POST['service'];

        // Check if the user_id exists in the Users table
        $checkUserSql = "SELECT * FROM Users WHERE user_id = ?";
        $checkUserStmt = $conn->prepare($checkUserSql);
        $checkUserStmt->bind_param("i", $user_id);
        $checkUserStmt->execute();
        $userResult = $checkUserStmt->get_result();

        if ($userResult->num_rows > 0) {
            // Insert appointment into the database
            $sql = "INSERT INTO Appointments (user_id, date, time, service) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isss", $user_id, $date, $time, $service);

            if ($stmt->execute()) {
                $appointment_id = $stmt->insert_id; // Get the ID of the last inserted appointment
                echo "Appointment made successfully. Your Appointment ID is: $appointment_id";
            } else {
                echo "Error making appointment: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error: User ID does not exist.";
        }

        $checkUserStmt->close();
    } elseif (isset($_POST['cancel_appointment'])) {
        $appointment_id = $_POST['appointment_id'];

        // Check if the appointment_id exists in the Appointments table
        $checkAppointmentSql = "SELECT * FROM Appointments WHERE appointment_id = ? AND user_id = ?";
        $checkAppointmentStmt = $conn->prepare($checkAppointmentSql);
        $checkAppointmentStmt->bind_param("ii", $appointment_id, $user_id);
        $checkAppointmentStmt->execute();
        $appointmentResult = $checkAppointmentStmt->get_result();

        if ($appointmentResult->num_rows > 0) {
            // Delete the appointment from the database
            $deleteSql = "DELETE FROM Appointments WHERE appointment_id = ?";
            $deleteStmt = $conn->prepare($deleteSql);
            $deleteStmt->bind_param("i", $appointment_id);

            if ($deleteStmt->execute()) {
                echo "Appointment canceled successfully.";
            } else {
                echo "Error canceling appointment: " . $deleteStmt->error;
            }

            $deleteStmt->close();
        } else {
            echo "Error: Appointment ID does not exist.";
        }

        $checkAppointmentStmt->close();
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
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
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('pics/3.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .appointment-form {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            padding: 50px 50px;
            border-radius: 10px;
            box-shadow: 0 0 5px #DAD7CD, 0 0 15px #DAD7CD;
            backdrop-filter: blur(4px);
        }
        .appointment-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .appointment-form label {
            display: block;
            margin-bottom: 10px;
        }
        .appointment-form input,
        .appointment-form select {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            border: 2px solid white;
            border-radius: 5px;
            background-color: transparent;
            color: #000;
        }
        .appointment-form button {
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
        .appointment-form button:hover {
            background-color: #F1B6AC;
            color: #fff;
            box-shadow: 0 0 5px #DAD7CD, 0 0 15px #DAD7CD;
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
        img {
            position: absolute;
            top: 0;
            left: 0;
            margin: 0;
            margin-top: -70px;
            width: 300px;
            height: auto; 
        }
    </style>
</head>
<body>
    <div class="content">
        <img src="pics/1.png">
        <div class="appointment-form">
            <h2>Make Appointment</h2>
            <form action="make_appointment.php" method="post">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br>
                
                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required><br>
                
                <label for="service">Service:</label>
                <select id="service" name="service" required>
                    <option value="Manicure">Manicure</option>
                    <option value="Pedicure">Pedicure</option>
                    <option value="Foot Spa">Foot Spa</option>
                    <option value="Foot Jelly">Foot Jelly</option>
                    <option value="Foot Bleach and Scrub">Foot Bleach and Scrub</option>
                    <option value="Basic Facial">Basic Facial</option>
                    <option value="Premium Whitening Facial">Premium Whitening Facial</option>
                    <option value="Acne Clear Facial">Acne Clear Facial</option>
                    <option value="SkinFab Signature Facial">SkinFab Signature Facial</option>
                    <option value="Eyelash Extensions Classic">Eyelash Extensions Classic</option>
                    <option value="Eyelash Perming/Lift">Eyelash Perming/Lift</option>
                    <option value="Eyebrow Lamination">Eyebrow Lamination</option>

                    <!-- Add more options as needed -->
                </select><br>
                
                <button type="submit" name="make_appointment">Make Appointment</button>
            </form>
            <h2>Cancel Appointment</h2>
            <form action="make_appointment.php" method="post">
                <label for="appointment_id">Appointment ID:</label>
                <input type="number" id="appointment_id" name="appointment_id" required><br>
                
                <button type="submit" name="cancel_appointment">Cancel Appointment</button>
            </form>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <div>
                <h3>About SkinFab Spa</h3>
                <p>Experience the best in beauty and relaxation. Our expert staff is dedicated to providing you with top-notch services to transform and rejuvenate your look.</p>
            </div>
            <div>
                <h3>Contact Us</h3>
                <p>Phone: 0910 827 1648/0522012792</p>
                <p>Address: P-2 Burgos St. Corner, T. Claudio st. Ilawod, Daraga Albay, Philippines, 4501</p>
            </div>
        </div>
        <div class="social-media">
            <a href="https://www.facebook.com/Skintabbeautywellnesscenter"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/skintabbeautywellnesscenter"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>
</body>
</html>

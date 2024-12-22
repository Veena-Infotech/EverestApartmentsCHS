<?php

// Start the session
session_start();

// Include database connection
include("php-files/conn.php");

// Function to sanitize input
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Initialize an error message variable
$error_message = "";

// Check if the form is submitted using the 'login_btn'
if (isset($_POST['login_btn'])) {

    // Fetch and sanitize the posted email and password
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);

    // Validate inputs
    if (empty($email) || empty($password)) {
        $error_message = "Both email and password are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } else {
        // Ensure database connection is established
        if ($conn) {
            // Query to fetch user by email and password
            $query = "SELECT * FROM users WHERE email_id = ?";
            $stmt = $conn->prepare($query);

            if ($stmt) {
                // Bind parameters and execute the query
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                // Check if the user exists
                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();

                    // Verify password (assuming passwords are hashed)
                    if (password_verify($password, $user['password'])) {
                        // User authenticated
                        $_SESSION['email'] = $email; // Store email in session

                        // Redirect to the homepage
                        header("Location: main-page.php");
                        exit;
                    } else {
                        $error_message = "Invalid email or password.";
                    }
                } else {
                    $error_message = "Invalid email or password.";
                }

                // Close the statement
                $stmt->close();
            } else {
                $error_message = "Failed to prepare the SQL statement: " . $conn->error;
            }
        } else {
            $error_message = "Database connection failed.";
        }
    }

    // Close the connection
    $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/logos/EverestLogo.png">
    <title>Everest Apartments CHS Ltd. | login</title>
    <title>Glass Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: url('media/evest-login-bg.avif') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .container {
            width: 500px;
            padding: 2rem;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
            position: relative;
        }

        .container h2 {
            margin-bottom: 1.5rem;
            font-size: 2rem;
            font-weight: bold;
            color: #fff;
            text-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 1rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 8px;
            outline: none;
            background: rgba(255, 255, 255, 0.3);
            color: #000;
            font-size: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group input::placeholder {
            color: #666;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 0.8rem;
            margin-top: 1rem;
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(90deg, #ff7eb3, #ff758c);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(255, 117, 140, 0.3);
            margin-top: 10%;
        }

        .btn:hover {
            background: linear-gradient(90deg, #ff758c, #ff7eb3);
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(255, 117, 140, 0.4);
        }

        .forgot-password {
            position: absolute;
            bottom: -2rem;
            right: 0;
            color: #ffffff;
            font-size: 1rem;
            text-decoration: none;
            transition: color 0.3s;
        }

        .forgot-password:hover {
            color: #fff;
        }

        .error-message {
            color: #ff5e57;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
        .logo img{
            width: 170px;
            height: 170px;
            border-radius: 1000px;
            border: rgba(255, 255, 255, 0.1) solid 5px;
        }
        .row{
            margin-top: -120px;
            margin-bottom: 15px;
        }
        .error-message{
            color: red;
            font-size: 20px;
            margin-top: 30px;
        }
    </style>
    <script>
        function validateForm(event) {
            event.preventDefault();

            const username = document.getElementById('username');
            const password = document.getElementById('password');
            const usernameError = document.getElementById('username-error');
            const passwordError = document.getElementById('password-error');

            let valid = true;

            if (username.value.trim() === '') {
                usernameError.textContent = 'Username is required';
                valid = false;
            } else {
                usernameError.textContent = '';
            }

            if (password.value.trim() === '') {
                passwordError.textContent = 'Password is required';
                valid = false;
            } else {
                passwordError.textContent = '';
            }

            if (valid) {
                document.getElementById('login-form').submit();
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="logo">
                <img src="media/long-1.jpg" alt="Evest Logo">
            </div>
        </div>
        
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="email" placeholder="Enter your username">
                <div id="username-error" class="error-message"></div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <div id="password-error" class="error-message"></div>
            </div>
            <button type="submit" name="login_btn" class="btn">Login</button>
        </form>
        <div class="error-message">
            <?php       
                // Output error message (can be handled on the same page or redirected to another)
                if (!empty($error_message)) {
                    echo "<p>'$error_message'</p>";
                }
            ?>
        </div>
 
</body>
</html>

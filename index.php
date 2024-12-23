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
            // Query to fetch user by email
            $query = "SELECT * FROM users WHERE email_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if the user exists
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Directly compare the entered password with the stored password
                if ($password == $user['password']) {
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Everest Apartments CHS Ltd. | Login</title>
    <meta name="description" content="">
    <script src="themekit/scripts/jquery.min.js"></script>
    <script src="themekit/scripts/main.js"></script>
    <link rel="stylesheet" href="themekit/css/bootstrap-grid.css">
    <link rel="stylesheet" href="themekit/css/style.css">
    <link rel="stylesheet" href="themekit/css/glide.css">
    <link rel="stylesheet" href="themekit/css/magnific-popup.css">
    <link rel="stylesheet" href="themekit/css/content-box.css">
    <link rel="stylesheet" href="themekit/css/media-box.css">
    <link rel="stylesheet" href="themekit/css/contact-form.css">
    <link rel="stylesheet" href="skin.css">
    <link rel="icon" href="media/logos/EverestLogo.png">

    <style>
        .btn {
            display: block;
            width: 100%;
            padding: 0.8rem;
            margin-top: 1rem;
            font-size: 1rem;
            font-weight: bold;
            font-color: #ffffff;
            background: linear-gradient(90deg,#8fbeff, #8fbeff);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px #062754;
            margin-top: 10%;
        }
        .error-message{
            color: red;
            font-size: 20px;
            margin-top: 30px;
        }
        .toast {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: green;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    opacity: 0;
    transition: opacity 0.5s ease;
    font-weight: bold;
}

    </style>

    <script>
        function validateForm(event) {
            event.preventDefault();

            const email id = document.getElementById('email id');
            const password = document.getElementById('password');
            const usernameError = document.getElementById('email id-error');
            const passwordError = document.getElementById('password-error');

            let valid = true;

            if (email id.value.trim() === '') {
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

<body class="page-main">
    <div id="preloader"></div>
    </div>
    </div>
    </nav>
    <header class="header-image ken-burn-center light" data-parallax="true" data-natural-height="1080"
        data-natural-width="1920" data-bleed="0" data-image-src="media/bg.jpg" data-offset="0">
        <div class="container">
            <h1>Everest Apartments CHS</h1>
            <h2>(Regn.No: BOM/HSG/556 of 1964, Dated: 13-01-1964)</h2>
            <!--<ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li><a href="#">History</a></li>
            </ol>-->
        </div>
    </header>
    <?php
    if (isset($_GET['logged_out']) && $_GET['logged_out'] == 'true') {
        echo "
        <div id='toast' class='toast'>
            You have successfully logged out.
        </div>
        <script>
            // Show toast and hide it after 3 seconds
            window.onload = function () {
                var toast = document.getElementById('toast');
                toast.style.opacity = 1;
                setTimeout(function () {
                    toast.style.opacity = 0;
                }, 3000);
            }
        </script>
        ";
    }
?>


    <section class="section-base" id="contact-us">
        <div class="container">
            <!--<div class="google-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1974.1427773757296!2d72.79979462572422!3d18.954021244502954!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7cde3062e4c27%3A0x96c86a21c5a99102!2sEverest%20Apartments!5e1!3m2!1sen!2sin!4v1734885574555!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>-->
            <hr class="space" />
            <div class="row">
                <div class="col-lg-8">
                    <div class="title">
                        <h2>LOG IN</h2>
                        <p>LOG IN TO EXPLORE</p>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <p>User Name</p>
                                <input type="text" id="email id" name="email" placeholder="Enter your email id">
                                <div id="email id-error" class="error-message"></div>
                            </div>
                            <!--<div class="col-lg-6">
                                <p>Email</p>
                                <input id="email" name="email" placeholder="Email" type="email" class="input-text"
                                    required>
                            </div>-->
                            <div class="col-lg-6">
                                <p>Password</p>
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
                        <!--</div>
                        <p>Message</p>
                        <textarea id="message" name="message" class="input-textarea" placeholder="Write something ..."
                            required></textarea>
                        <div class="form-checkbox">
                            <input type="checkbox" id="check" name="check" value="check" required>
                            <label for="check">You accept the terms of service and the privacy policy</label>
                        </div>
                        <button class="btn btn-sm" type="submit">Send message</button>
                        <div class="success-box" style="display:none;">
                            <div class="alert alert-success">Congratulations. Your message has been sent
                                successfully</div>
                        </div>
                        <div class="error-box" style="display:none;">
                            <div class="alert alert-warning">Error, please retry. Your message has not been sent
                            </div>
                        </div>-->

                    </form>

                </div>
                <!--<div class="col-lg-4">
                    <div class="title">
                        <h2>Contacts</h2>
                        <p>Information</p>
                    </div>
                    <ul class="text-list text-list-line">
                        <li><b>Address</b>
                            <hr />
                            <p>EVEREST APARTMENTS CO-OP. <br> HOUSING SOCIETY LTD <br>OPP: MOUNT PLEASANT ROAD,
                                <br>MALABAR HILL
                            </p>
                        </li>

                        <li><b>Email</b>
                            <hr />
                            <p>everestapts@gmail.com</p>
                        </li>
                        <li><b>Phone</b>
                            <hr />
                            <p>022-23633911</p>
                        </li>

                    </ul>-->
                    <hr class="space-sm" />
                    <!-- <div class="icon-links icon-social icon-links-grid social-colors-hover">
                        <a class="facebook"><i class="icon-facebook"></i></a>
                        <a class="twitter"><i class="icon-twitter"></i></a>
                        <a class="instagram"><i class="icon-instagram"></i></a>
                        <a class="google"><i class="icon-google"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    </main>
    <footer class="light">
        <div class="container">
            <div class="row ">
                <div class="col-lg-5" style="margin-right: 140px;">
                    <img src="./media//logos//Everest_Apartments_CHS.png" class="mb-4" alt="">
                    <p>EVEREST APARTMENTS CO-OP. HOUSING SOCIETY LTD.
                        Located at Mount Pleasant Road, Malabar Hill,
                        a prime residential area offering comfort and convenience.</p>
                </div>
                <div class="col-lg-5">
                    <h3>Contacts</h3>
                    <ul class="icon-list icon-line">
                        <li>EVEREST APARTMENTS CO-OP. HOUSING SOCIETY LTD. OPP: MOUNT PLEASANT ROAD, MALABAR HILL</li>
                        <li>everestapts@gmail.com</li>
                        <li>022-23633911</li>
                    </ul>
                </div>
                <!-- <div class="col-lg-4">
                <div class="icon-links icon-social icon-links-grid social-colors">
                    <a class="facebook"><i class="icon-facebook"></i></a>
                    <a class="twitter"><i class="icon-twitter"></i></a>
                    <a class="instagram"><i class="icon-instagram"></i></a>
                    <a class="google"><i class="icon-google"></i></a>
                </div> -->
                <hr class="space-sm" />
            </div>
        </div>
        <div class="footer-bar">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center text-center py-3">
                    <span>
                        © 2024 EVEREST APARTMENTS CHS LTD - DEVELOPED BY
                        <a href="https://www.theveenagroup.com/index.html" target="_blank">Veena Infotech</a>.
                    </span>
                </div>
            </div>

        </div>
        <link rel="stylesheet" href="themekit/media/icons/iconsmind/line-icons.min.css">
        <script src="themekit/scripts/parallax.min.js"></script>
        <script src="themekit/scripts/glide.min.js"></script>
        <script src="themekit/scripts/magnific-popup.min.js"></script>
        <script src="themekit/scripts/tab-accordion.js"></script>
        <script src="themekit/scripts/imagesloaded.min.js"></script>
        <script src="themekit/scripts/progress.js" async></script>
        <script src="themekit/scripts/custom.js" async></script>
        <script src="themekit/scripts/contact-form/contact-form.js" async></script>
        <script src="../../themekit.dev/tools/sidebar/sidebar.js" data-setting="alpins"></script>
        <script src="https://kit.fontawesome.com/7260486d2e.js" crossorigin="anonymous"></script>

    </footer>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- Include Bootstrap CSS (if not already included) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--<script>
        document.querySelector('.form-box').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission behavior

            const form = e.target;
            const formData = new FormData(form);

            // Hide existing messages
            document.querySelector('.success-box').style.display = 'none';
            document.querySelector('.error-box').style.display = 'none';

            // Send the form data via fetch
            fetch('php-files/contactus.php', {
                method: 'POST',
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        document.querySelector('.success-box').style.display = 'block';
                        document.querySelector('.form-box').reset();
                    } else {
                        document.querySelector('.error-box').style.display = 'block';
                    }
                })
                .catch(() => {
                    // Show error box if the request fails
                    document.querySelector('.error-box').style.display = 'block';
                });
        });

    </script>-->
</body>

</html>
<?php
// Start the session to access session variables
session_start();

// Set session timeout duration in seconds (30 minutes)
$timeout_duration = 30 * 60; // 30 minutes = 1800 seconds

// Check if the user is logged in by verifying the email session variable
if (!isset($_SESSION['email'])) {
    // If the email session is not set, redirect to the login page
    header("Location: index.php");
    exit;
}

// Check for session timeout
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    // If the session is older than 30 minutes, destroy the session and redirect to the login page
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: index.php?session_timeout=true");
    exit;
}

// Update the last activity time to the current time
$_SESSION['last_activity'] = time();

// Get the logged-in user's email
$user_email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from templates.themekit.dev/alpins/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Dec 2024 05:27:26 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Everest Apartments CHS LTD</title>
    <meta name="description" content="">
    <script src="themekit/scripts/jquery.min.js"></script>
    <script src="themekit/scripts/main.js"></script>
    <link rel="stylesheet" href="themekit/css/bootstrap-grid.css">
    <link rel="stylesheet" href="themekit/css/style.css">
    <link rel="stylesheet" href="themekit/css/glide.css">
    <link rel="stylesheet" href="themekit/css/magnific-popup.css">
    <link rel="stylesheet" href="themekit/css/content-box.css">
    <link rel="stylesheet" href="themekit/css/contact-form.css">
    <link rel="stylesheet" href="themekit/css/media-box.css">
    <link rel="stylesheet" href="skin.css">
    <link rel="icon" href="media/logos/EverestLogo.png">
    <style>
        .slider {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .slider li {
            flex: 1;
            position: relative;
        }

        .slider img {
            width: 100%;
            /* Make images fill the container */
            height: auto;
            /* Maintain aspect ratio */
            display: block;
            /* Prevent any space below the image */
        }

        .table-container {
            max-height: 400px;
            /* Max height for the table container */
            border: 1px solid #ddd;
            /* Add a border around the table container */
            border-radius: 4px;
            /* Rounded corners for the table container */
            margin-left: 10px;
            /* Center the table container */
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            background-color: #f9f9f9;
            /* Light background for the table */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            /* Light shadow inside the table */
            text-align: center;
        }

        .table th,
        .table td {
            padding: 12px 18px;
            /* Spacing for table cells */
            font-size: 16px;
            /* Font size for text */
        }

        .table th {
            background-color: #4CAF50;
            /* Green header */
            color: black;
            /* White text */
            text-transform: uppercase;
            /* Uppercase text for headers */
            letter-spacing: 1px;
            /* Slight letter-spacing for headers */
            border-bottom: 2px solid #ddd;
            /* Bottom border for the header */
            text-align: center;
        }

        .table td {
            border-bottom: 1px solid #ddd;
            /* Light border between rows */
            color: #555;
            /* Darker text for content */
            text-align: center;
        }

        .table tbody tr:hover {
            /* Light green background on row hover */
            cursor: pointer;
            /* Change cursor to pointer on hover */
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
            /* Light gray background for odd rows */
        }

        .table td a {
            color: #062754;
            /* Blue color for links */
            text-decoration: none;
            font-weight: bold;
            /* Bold links */
        }

        .table td a:hover {
            text-decoration: underline;
            /* Underline link on hover */
        }

        @media (max-width: 768px) {
            .table-container {
                max-height: 200px;
                /* Smaller max-height for mobile */
            }

            .table th,
            .table td {
                font-size: 14px;
                /* Smaller font size on mobile */
            }
        }

        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            color: red;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: darkred;
        }

        #latest-documents {
            background-color: white;
        }

      
    </style>
</head>

<body class="page-main">
    <div id="preloader"></div>
    <nav class="menu-classic menu-fixed menu-transparent light align-right" data-menu-anima="fade-in">
        <div class="container">
            <div class="menu-brand">
                <a href="#">
                    <img src="./media//logos//Everest_Apartments_CHS.png" alt="">
                    <!-- <img class="logo-default scroll-hide" src="media/logo-white-blue.svg" alt="logo" />
                    <img class="logo-retina scroll-hide" src="media/logo-white-blue.svg" alt="logo" />
                    <img class="logo-default scroll-show" src="media/logo-white-solid.svg" alt="logo" />
                    <img class="logo-retina scroll-show" src="media/logo-white-solid.svg" alt="logo" /> -->
                </a>
            </div>
            <i class="menu-btn"></i>
            <div class="menu-cnt">
                <ul id="main-menu">
                    <li class="dropdown">
                        <a href="#home">Home</a>
                        <!--<ul>
                <li><a href="index.html">Main</a></li>
                <li><a href="index-2.html">Home two</a></li>
                <li><a href="index-3.html">Home three</a></li>
            </ul>-->
                    </li>
                    <li class="dropdown">
                        <a href="#latest-documents">Latest Documents</a>
                    </li>
                    <li class="dropdown">
                        <a href="#about-us">About Us</a>
                    </li>
                    <li>
                        <a href="#committe">Managing Committee</a>
                    </li>
                    <li>
                        <a href="#contact-us">Contact Us</a>
                    </li>
                    <li style="color: red;">
                        <a href="./php-files/logout.php" class="logout-btn">Logout</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
    <main>
        <section class="section-image section-full-width-right light ken-burn-center" data-parallax="scroll"
            data-image-src="media/bg-3.jpg" id="home">
            <div class="container">
                <hr class="space-lg" />
                <hr class="space-sm" />
                <div class="row">
                    <!--<div class="col-lg-6">
                        <h1 data-anima="fade-left" data-time="2000" class="text-lg text-uppercase text-black">Everest
                            Apartments CHS LTD</h1>
                        <hr class="space-lg" />
                        <hr class="space-sm hidden-lg" />
                        <ul class="slider width-50" data-options="type:slider,perView:1">
                            <li>
                                <p class="quote">
                                    (Regn.No: BOM/HSG/556 of 1964, Dated: 13-01-1964)
                                </p>
                            </li>-->
                    <!--<li>
                                <p class="quote">
                                    When everything feels like an uphill struggle. Just wait and think of the view from the top.
                                    <span class="quote-author">Wislawa Symborska</span>
                                </p>
                            </li>-->
                    </ul>
                </div>
                <!--<div class="col-lg-6">
                        <hr class="space-xs" />
                        <div class="counter counter-vertical counter-icon">
                            <div>
                                <h3>Altitude</h3>
                                <div class="value">
                                    <span class="text-md" data-to="1650" data-speed="5000">1650</span>
                                    <span>m</span>
                                </div>
                            </div>
                        </div>
                        <hr class="space-sm" />
                        <div class="counter counter-vertical counter-icon">
                            <div>
                                <h3>Tracks</h3>
                                <div class="value">
                                    <span class="text-md" data-to="7" data-speed="5000">7</span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <hr class="space-sm" />
                        <div class="counter counter-vertical counter-icon">
                            <div>
                                <h3>Tourists / year</h3>
                                <div class="value">
                                    <span class="text-md" data-to="2000" data-speed="5000">2000</span>
                                    <span>+</span>
                                </div>
                            </div>
                        </div>-->
                <hr class="space" />



            </div>
            </div>
            <hr class="space-lg" />
            </div>
        </section>
        <!---modal section-->
        <section class="section-base ">
            <div class="container">
                <div class="title align-center">
                    <h2>Societal highlights</h2>
                    <p>Experiences you can't miss!</p>
                </div>
                <table class=" table-grid  table-6-md ">
                    <tbody>
                        <tr>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <div class="caption">
                                        <h3>Prime Location</h3>
                                        <p>Situated in upscale Malabar Hills near iconic landmarks.</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="fa-solid fa-street-view"></i>
                                    <div class="caption">
                                        <h3>Scenic Views</h3>
                                        <p>Overlooks the Arabian Sea, greenery, and Mumbai’s cityscape.</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="fa-regular fa-building"></i>
                                    <div class="caption">
                                        <h3>Spacious Apartments</h3>
                                        <p>Offers modern units with elegant interiors.</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="fa-regular fa-face-smile"></i>
                                    <div class="caption">
                                        <h3>Luxury Living</h3>
                                        <p>Premium construction with high-end finishes and amenities.</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="fa-solid fa-square-parking"></i>
                                    <div class="caption">
                                        <h3>Convenient Amenities</h3>
                                        <p>Includes elevators, parking, and 24/7 security systems</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="fa-solid fa-road"></i>
                                    <div class="caption">
                                        <h3>Great Connectivity</h3>
                                        <p>Easily accessible via major roads and public transport options</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="im-globe"></i>
                                    <div class="caption">
                                        <h3>Prestigious Neighborhood</h3>
                                        <p>Peaceful, safe, and surrounded by elite residential buildings</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="fa-solid fa-tree"></i>
                                    <div class="caption">
                                        <h3>Nearby Essentials</h3>
                                        <p>Close to schools, hospitals, markets, and recreational spots</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>


        <!-- Your section with blog posts and modal triggers -->
        <section id="latest-documents" class="blog-area pt-125">
            <div class="container">
                <hr class="space-sm" />
                <div class="col-lg-8">
                    <div class="title">
                        <h2>Important Documents</h2>
                        <p>Stay informed and engaged with the latest updates, announcements, and minutes from our society meetings.</p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">

                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <!-- First Blog Post -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog mt-30">
                                <div class="blog-image">
                                    <img src="./Images/Note2.png" alt="CIRCULAR DATED 28.11.2024 FOR BUILDER INFORMATION">
                                </div>
                                <div class="blog-content">
                                    <div class="content">
                                        <h4 class="title">
                                            <a class="clickLink" data-bs-toggle="modal"
                                                data-bs-target="#CircularDated28thNov">
                                                SGBM Minutes Meeting Date 24th November 2024
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog mt-30">
                                <div class="blog-image">
                                    <img src="./Images//Note1.png"
                                        alt="Notice  for Special General Body Meeting 17th Nov 2024">
                                </div>
                                <div class="blog-content">
                                    <div class="content">
                                        <h4 class="title"><a class="clickLink" data-bs-toggle="modal"
                                                data-bs-target="#NoticeSGBM17th">SGBM Notice Meeting Date 24th November 2024</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for Circular Dated 28th Nov (error in zooming) -->
                        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="CircularDated28thNov"
                            tabindex="-1" aria-labelledby="CircularDated28thNovLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <object width="100%" height="700"
                                            data="./Documents//SGBM 24Nov24 Minutes.pdf?#zoom=85&scrollbar=0&toolbar=0&navpanes=0"
                                            type="application/pdf"> </object>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-lg-4">
                        <hr class="space-sm visible-sm" />
                        <div class="title">
                            <h2>Newly Provided Documents</h2>
                            <p>Explore a wealth of resources and discover new possibilities.</p>
                        </div>
                        <p>
                            Access a collection of carefully curated documents to enrich your knowledge.
                            These materials are designed to guide, inform, and inspire your journey.
                        </p>
                    </div>
                </div>
            </div>-->

        </section>

        <section>
            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="NoticeSGBM17th" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe src="./Documents//SGM Notice _ Meeting Date-24th November 2024.pdf?#zoom=15&scrollbar=0&toolbar=0&navpanes=0"
                                width="100%" height="700" style="border: none;"></iframe>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>



        </section>





        <!-- <div class="row">
                    <div class="col-lg-8">
                        <ul class="slider controls-right" data-options="perView:2,perViewSm:1,gap:30,controls:out">
                            <li>
                                <div class="cnt-box cnt-box-info">
                                    <a href="treks-single.html" class="img-box"><img src="./Images/Note1.png" alt="" /></a>
                                    <div class="caption">
                                        <h2>EVEREST APARTMENTS CHSL_SGM NOTICE MEETING Date-24th November 2024</h2>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="cnt-box cnt-box-info">
                                    <a href="treks-single.html" class="img-box"><img src="./Images/Note2.png" alt="" /></a>
                                    <div class="caption">
                                        <h2>EA SGBM 24 NOV 2024 MINUTES</h2>

                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <hr class="space-sm visible-sm" />
                        <div class="title">
                            <h2>Newly Provided Documents</h2>
                            <p>Explore a wealth of resources and discover new possibilities.</p>
                        </div>
                        <p>
                            Access a collection of carefully curated documents to enrich your knowledge.
                            These materials are designed to guide, inform, and inspire your journey.
                        </p>
                    </div>
                </div> -->
        </div>
        </section>
        <section class="section-base section-color" id="about-us">
            <div class="container">
                <div class="title align-center align-left-md">
                    <h2>About us</h2>
                    <p>We live for the nature</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <p>
                            Everest Apartments is a residential building located on Mount Pleasant Road in Malabar Hill, Mumbai. The property offers spacious apartments. Amenities various facilities such as ample parking, a gym and lounge.

                        </p>
                    </div>
                    <div class="col-lg-6 no-margin-md">
                        <p>
                            Malabar Hill is an upscale residential area in South Mumbai, known for its affluent neighborhoods and proximity to landmarks such as the Hanging Gardens, Priyadarshani Park and Chief Ministers residence Varsha.
                            <hr class="space-sm" />
                    </div>
                    <!--<div class="col-lg-6">
                        <ul class="accordion-list" data-open="1">
                            <li>
                                <a href="#">Our mountains and our location</a>
                                <div class="content">
                                    <p>
                                        Nestled in the serene Malabar Hills, our location offers stunning views of lush
                                        greenery and majestic peaks. Discover tranquility in the heart of nature, just
                                        minutes away from city life.

                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href="#">Living at Everest Apartments Malabar Hill</a>
                                <div class="content">
                                    <p>
                                        Everest Apartments Malabar Hill offers a refined living experience with spacious
                                        homes and world-class amenities. Nestled in the iconic Malabar Hill area,
                                        residents enjoy easy access to key locations, panoramic views, and a tranquil
                                        atmosphere
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href="#">Amenities at Everest Apartments</a>
                                <div class="content">
                                    <p>
                                        Everest Apartments Malabar Hill boasts a range of top-tier amenities designed
                                        for ultimate comfort and convenience.

                                    </p>
                                </div>
                            </li>
                        </ul>-->
                </div>
            </div>
            </div>
        </section>

        <section class="section-slider alpins-slider light section-full-width-left" data-slider-parallax="true" data-interval="0" id="committe">
            <div class="background-slider">
                <div class="active" style="background-image:url(media/hd-3.jpg)"></div>
                <div style="background-image:url(media/hd-4.jpg)"></div>
                <div style="background-image:url(media/hd-5.jpg)"></div>
                <div style="background-image:url(media/hd-6.jpg)"></div>
                <div style="background-image:url(media/hd-7.jpg)"></div>
            </div>
            <div class="container">
                <div class="row">
                    <!-- Responsive Table Section -->
                    <div class="col-lg-6 col-md-12">
                        <div>
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Member's Name</th>
                                        <th>Designation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sanjay Menon</td>
                                        <td>Hon. Chairman</td>
                                    </tr>
                                    <tr>
                                        <td>Shailesh Ghatlia</td>
                                        <td>Hon. Secretary</td>
                                    </tr>
                                    <tr>
                                        <td>Dhiraj Mahtaney</td>
                                        <td>Hon. Treasurer</td>
                                    </tr>
                                    <tr>
                                        <td>Jai Thakur</td>
                                        <td>Redevelopment Core Committee</td>
                                    </tr>
                                    <tr>
                                        <td>Ajay Jain</td>
                                        <td>Hon. Member</td>
                                    </tr>
                                    <tr>
                                        <td>Mekaal Godhwani</td>
                                        <td>Hon. Member</td>
                                    </tr>
                                    <tr>
                                        <td>Jalpa Vithalani</td>
                                        <td>Hon. Member</td>
                                    </tr>
                                    <tr>
                                        <td>Anjali Shetty</td>
                                        <td>Hon. Member</td>
                                    </tr>
                                    <tr>
                                        <td>Jagdish Moorjani</td>
                                        <td>Redevelopment Core Committee</td>
                                    </tr>
                                    <tr>
                                        <td>Karan Singh Dugal</td>
                                        <td>Redevelopment Core Committee</td>
                                    </tr>
                                    <tr>
                                        <td>Suveer Khemlani</td>
                                        <td>Associate Member</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Content Section -->
                    <div class="col-lg-6 col-md-12" data-anima="fade-left" data-time="2000">
                        <h1 class="text-lg text-uppercase text-black">Empowering Our Future: Meet the Committee</h1>
                        <p>
                            "Our dedicated committee members bring together a wealth of experience, passion, and vision to drive our initiatives forward. Together, they lead with purpose and inspire positive change."
                        </p>
                        <hr class="space hidden-md" />
                    </div>
                </div>
            </div>
        </section>
<<<<<<< HEAD
=======
        <section class="section-base">
            <div class="container">
                <div class="title align-center">
                    <h2>Societal highlights</h2>
                    <p>Experiences you can't miss!</p>
                </div>
                <table class="table table-grid table-border table-6-md">
                    <tbody>
                        <tr>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <div class="caption">
                                        <h3>Prime Location</h3>
                                        <p>Situated in upscale Malabar Hills near iconic landmarks.</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="fa-solid fa-street-view"></i>
                                    <div class="caption">
                                        <h3>Scenic Views</h3>
                                        <p>Overlooks the Arabian Sea, greenery, and Mumbai’s cityscape.</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="fa-regular fa-building"></i>
                                    <div class="caption">
                                        <h3>Spacious Apartments</h3>
                                        <p>Offers modern units with elegant interiors.</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="fa-regular fa-face-smile"></i>
                                    <div class="caption">
                                        <h3>Luxury Living</h3>
                                        <p>Premium construction with high-end finishes and amenities.</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="fa-solid fa-square-parking"></i>
                                    <div class="caption">
                                        <h3>Convenient Amenities</h3>
                                        <p>Includes elevators, parking, and 24/7 security systems</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="fa-solid fa-road"></i>
                                    <div class="caption">
                                        <h3>Great Connectivity</h3>
                                        <p>Easily accessible via major roads and public transport options</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="im-globe"></i>
                                    <div class="caption">
                                        <h3>Prestigious Neighborhood</h3>
                                        <p>Peaceful, safe, and surrounded by elite residential buildings</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="icon-box icon-box-top align-center">
                                    <i class="fa-solid fa-tree"></i>
                                    <div class="caption">
                                        <h3>Nearby Essentials</h3>
                                        <p>Close to schools, hospitals, markets, and recreational spots</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <section class="section-slider alpins-slider light section-full-width-left" data-slider-parallax="true" data-interval="0" id="committe">
    <div class="background-slider">
        <div class="active" style="background-image:url(media/bg.jpg)"></div>
        <div style="background-image:url(media/hd-4.jpg)"></div>
        <div style="background-image:url(media/hd-5.jpg)"></div>
        <div style="background-image:url(media/hd-6.jpg)"></div>
        <div style="background-image:url(media/hd-7.jpg)"></div>
    </div>
    <div class="container">
        <div class="row">
            <!-- Responsive Table Section -->
            <div class="col-lg-6 col-md-12">
                <div>
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Member's Name</th>
                                <th>Designation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sanjay Menon</td>
                                <td>Hon. Chairman</td>
                            </tr>
                            <tr>
                                <td>Shailesh Ghatlia</td>
                                <td>Hon. Secretary</td>
                            </tr>
                            <tr>
                                <td>Dhiraj Mahtaney</td>
                                <td>Hon. Treasurer</td>
                            </tr>
                            <tr>
                                <td>Jai Thakur</td>
                                <td>Redevelopment Core Committee</td>
                            </tr>
                            <tr>
                                <td>Ajay Jain</td>
                                <td>Hon. Member</td>
                            </tr>
                            <tr>
                                <td>Mekaal Godhwani</td>
                                <td>Hon. Member</td>
                            </tr>
                            <tr>
                                <td>Jalpa Vithalani</td>
                                <td>Hon. Member</td>
                            </tr>
                            <tr>
                                <td>Anjali Shetty</td>
                                <td>Hon. Member</td>
                            </tr>
                            <tr>
                                <td>Jagdish Moorjani</td>
                                <td>Redevelopment Core Committee</td>
                            </tr>
                            <tr>
                                <td>Karan Singh Dugal</td>
                                <td>Redevelopment Core Committee</td>
                            </tr>
                            <tr>
                                <td>Suveer Khemlani</td>
                                <td>Associate Member</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Content Section -->
            <div class="col-lg-6 col-md-12" data-anima="fade-left" data-time="2000">
                <h1 class="text-lg text-uppercase text-black">Empowering Our Future: Meet the Committee</h1>
                <p>
                    "Our dedicated committee members bring together a wealth of experience, passion, and vision to drive our initiatives forward. Together, they lead with purpose and inspire positive change."
                </p>
                <hr class="space hidden-md" />
            </div>
        </div>
    </div>
</section>
>>>>>>> 9d6542b593971e3388ff90b73c6c1db98caeb621



        <section class="section-base" id="contact-us">
            <div class="container">
                <div class="google-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1974.1427773757296!2d72.79979462572422!3d18.954021244502954!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7cde3062e4c27%3A0x96c86a21c5a99102!2sEverest%20Apartments!5e1!3m2!1sen!2sin!4v1734885574555!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!--<hr class="space" />
                <div class="row">
                    <div class="col-lg-8">
                        <div class="title">
                            <h2>Write us</h2>
                            <p>Contact us from here</p>
                        </div>
                        <form action="php-files/contactus.php" class="form-box" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Name</p>
                                    <input id="name" name="name" placeholder="Name" type="text" class="input-text"
                                        required>
                                </div>
                                <div class="col-lg-6">
                                    <p>Email</p>
                                    <input id="email" name="email" placeholder="Email" type="email" class="input-text"
                                        required>
                                </div>
                            </div>
                            <p>Message</p>
                            <textarea id="message" name="message" class="input-textarea"
                                placeholder="Write something ..." required></textarea>
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
                            </div>

                        </form>

                    </div>-->
                <hr class="space-sm" />
                <div class="col-lg-8">
                    <div class="title">
                        <h2>Contact Us</h2>
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

                    </ul>
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

        <!---Disallows users to access Developer tools--->
        <script>
            // Disable right-click menu
            document.addEventListener("contextmenu", (e) => {
                e.preventDefault();
            });

            // Disable keyboard shortcuts like F12, Ctrl+Shift+I, Ctrl+Shift+C
            document.addEventListener("keydown", (e) => {
                if (e.key === "F12" ||
                    (e.ctrlKey && e.shiftKey && (e.key === "I" || e.key === "C" || e.key === "J")) ||
                    (e.ctrlKey && e.key === "U")) {
                    e.preventDefault();
                }
            });
        </script>

    </footer>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- Include Bootstrap CSS (if not already included) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        document.querySelector('.form-box').addEventListener('submit', function(e) {
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
    </script>
</body>

</html>
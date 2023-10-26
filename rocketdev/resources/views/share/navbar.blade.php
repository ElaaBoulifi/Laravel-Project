<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.graygrids.com/themes/jobmate/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Oct 2023 10:42:12 GMT -->
<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>JobMate | Job List</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="assets/css/slick.css">

    <!--====== Summer Note CSS ======-->
    <link rel="stylesheet" href="assets/css/summernote.css">
    <link rel="stylesheet" href="assets/css/summernote-bs4.css">

    <!--====== Date Picker CSS ======-->
    <link rel="stylesheet" href="assets/css/gijgo.min.css">

    <!--====== Flaticon CSS ======-->
    <link rel="stylesheet" href="assets/css/flaticon.css">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!--====== Nice Select CSS ======-->
    <link rel="stylesheet" href="assets/css/nice-select.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="assets/css/style.css">




</head>
<body>
<div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<header class="header-area">
        <div class="header-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="Logo"></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li><a href="{{ route('share.home') }}">Home</a></li>
                            <li>
                                <a href="#">Page</a>

                                <ul class="sub-menu">
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="job-list.html">Job Page</a></li>
                                    <li><a href="job-details.html">Job Details</a></li>
                                    <li><a href="resume.html">Resume Page</a></li>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="pricing.html">Pricing Tables</a></li>
                                    <li><a href="change-password.html">Change Password</a></li>
                                    <li><a href="notifications.html">Notifications</a></li>
                                    <li><a href="register.html">Register</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Candidates</a>
                                
                                <ul class="sub-menu">
                                    <li><a href="browse-categories.html">Browse Categories</a></li>
                                    <li><a href="bookmarked.html">Bookmarked</a></li>
                                    <li><a href="{{ route('freelancer-resumes.create') }}">Add Resume</a></li>
                                    <li><a href="manage-resume.html">Manage Resumes</a></li>
                                    <li><a href="job-alerts.html">Job Alerts</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Employers</a>
                                
                                <ul class="sub-menu">
                                    <li><a href="post-job.html">Post Job</a></li>
                                    <li><a href="manage-jobs.html">Manage Jobs</a></li>
                                    <li><a href="manage-applications.html">Manage Applications</a></li>
                                    <li><a href="browse-resumes.html">Browse Resumes</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="blog.html">Blog</a>
                                
                                <ul class="sub-menu">
                                    <li><a href="blog.html">Blog</a></li>

                                </ul>
                            </li>
                            <style>
    .login-prompt {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 9999;
    }

    .login-prompt-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    .login-prompt-button {
        margin-top: 10px;
    }
</style>

                            @guest
                            <div class="login-prompt">
                                <div class="login-prompt-content">
                                    <p>Please log in to access this content..</p>
                                    <a href="{{ route('login') }}" class="btn btn-primary login-prompt-button">Log In</a>
                                    <button class="btn btn-secondary login-prompt-button" id="close-login-prompt">Close</button>
                                </div>
                            </div>
                            @else
                            <li><a href="{{ route('reclamations.create') }}">Réclamer</a></li>
                            @endguest

                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="/login">Login</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                            Logout
                                        </a>
                                    </form>
                                </li>
                            @endguest                            
                            <li><a class="main-btn" href="post-job.html">Post a job</a></li>
                        </ul> <!-- navbar nav -->
                    </div>

                    <div class="language">
                        <div class="dropdown">
                            <button class="language_btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">en </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="#">English</a>
                                <a href="#">Deutsch</a>
                                <a href="#">Русский</a>
                                <a href="#">Español</a>
                                <a href="#">Français</a>
                            </div>
                        </div>
                    </div> <!-- language -->
                </nav>
            </div> <!-- container -->
        </div> <!-- header navbar -->

        <div class="page_banner bg_cover" style="background-image: url(assets/images/page_banner.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner_content d-sm-flex align-items-center justify-content-between">
                            <div class="content">
                                <h3 class="page_title">Login</h3>
                                <p>More than 6 million jobseekers turn to Fitcareer in their search for work, making over 150,000 applications every day.</p>
                            </div> <!-- content -->
                            <div class="banner_btn">
                                <a class="main-btn " href="#">75K JOBS</a>
                            </div> <!-- banner btn -->
                        </div> <!-- banner content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- page banner -->
    </header>
    <script>
                                document.getElementById('close-login-prompt').addEventListener('click', function () {
                                    document.querySelector('.login-prompt').style.display = 'none';
                                });
                            </script>
</body>
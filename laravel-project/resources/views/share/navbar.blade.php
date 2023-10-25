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
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">

    <!--====== Summer Note CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/summernote.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/summernote-bs4.css') }}">

    <!--====== Date Picker CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/gijgo.min.css') }}">

    <!--====== Flaticon CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }} ">

    <!--====== Nice Select CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">




</head>
<body>

<header class="header-area">
        <div class="header-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="index.html"><img src="{{asset('assets/images/logo.png')}}" alt="Logo"></a>

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
                                    <li><a href="add-resume.html">Add Resume</a></li>
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
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                            <li class="active"><a href="{{ route('share.login') }}">Log In</a></li>
                            
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

       
    </header>
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>

    <!--====== Nice Select js ======-->
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>

    <!--====== Counter Up js ======-->
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.js') }}"></script>

    <!--====== Summer Note js ======-->
    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote-bs4.min.js') }}"></script>

    <!--====== Date Picker js ======-->
    <script src="{{ asset('assets/js/gijgo.min.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
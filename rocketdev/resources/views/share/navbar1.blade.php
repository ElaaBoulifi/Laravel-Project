<nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ route('share.home') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="Logo"></a>
      
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="active"><a href="index.html">Home</a></li>
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
                                    <li><a href="">Add Resume</a></li>
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
                            <li><a href="contact.html">Contactt</a></li>
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

                
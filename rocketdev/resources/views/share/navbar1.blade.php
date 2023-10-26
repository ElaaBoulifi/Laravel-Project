<nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ route('share.home') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="Logo"></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="active"><a href="{{ route('share.home') }}">Home</a></li>
                           
                           
                            <li>
                                <a href="{{ route('projet') }}">Posutler pour un projet</a>

                            </li>
                          
                          
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

                           
                          
                            <li><a class="main-btn" href="{{ route('projet.create') }}">Post a job</a></li>
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
                        </ul> <!-- navbar nav -->
                    </div>

                 
                </nav>

                

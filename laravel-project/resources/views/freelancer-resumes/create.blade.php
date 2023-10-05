@extends('share.main')
@section("content")
<div class="page_banner bg_cover" style="background-image: url({{ asset('assets/images/page_banner.jpg') }})">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner_content d-sm-flex align-items-center justify-content-between">
                    <div class="content">
                        <h3 class="page_title">Create Resume</h3>
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
<section class="add_resume_area pt-80 pb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="add_resume_form">
                    <form action="#">
                        <div class="resume_account">
                            <p>Already have an account? <a href="#">Click here to login</a></p>
                        </div> <!-- resume account -->
                        
                        <h4 class="resume_title">Basic information</h4>
                        
                        <div class="single_resume">
                            <label>Name</label>
                            <input type="text" placeholder="Name">
                        </div> <!-- single resume -->
                        
                        <div class="single_resume">
                            <label>Email</label>
                            <input type="email" placeholder="your@domain.com">
                        </div> <!-- single resume -->
                        
                        <div class="single_resume">
                            <label>Profession Title</label>
                            <input type="text" placeholder="Headline (e.g. Front-end developer)">
                        </div> <!-- single resume -->
                        
                        <div class="single_resume">
                            <label>Location</label>
                            <input type="text" placeholder="Location, e.g">
                        </div> <!-- single resume -->
                        
                        <div class="single_resume">
                            <label>Web</label>
                            <input type="text" placeholder="Website address">
                        </div> <!-- single resume -->
                        
                        <div class="single_resume">
                            <label>Pre Hour</label>
                            <input type="text" placeholder="Salary, e.g. 85">
                        </div> <!-- single resume -->
                        
                        <div class="single_resume">
                            <label>Age</label>
                            <input type="text" placeholder="Years old">
                        </div> <!-- single resume -->
                        
                        <div class="single_resume">
                            <label for="file-1">Choose a cover image</label>
                            <input id="file-1" type="file">
                        </div> <!-- single resume -->
                        
                        <h4 class="resume_title">Education</h4>
                        
                        <div class="single_resume">
                            <label>Degree</label>
                            <input type="text" placeholder="Degree, e.g. Bachelor">
                        </div> <!-- single resume -->
                        
                        <div class="single_resume">
                            <label>Field of Study</label>
                            <input type="text" placeholder="Major, e.g Computer Science">
                        </div> <!-- single resume -->
                        
                        <div class="single_resume">
                            <label>School</label>
                            <input type="text" placeholder="School name, e.g. Massachusetts Institute of Technology">
                        </div> <!-- single resume -->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single_resume">
                                    <label>From</label>
                                    <input type="text" placeholder="e.g 2014">
                                </div> <!-- single resume -->
                            </div>
                            <div class="col-md-6">
                                <div class="single_resume">
                                    <label>To</label>
                                    <input type="text" placeholder="e.g 2020">
                                </div> <!-- single resume -->
                            </div>
                        </div> <!-- row -->
                        
                        <div class="single_resume">
                            <label>Description</label>
                            <textarea placeholder=""></textarea>
                        </div> <!-- single resume -->
                        
                        <div class="single_resume">
                            <label for="file-2">Choose a cover image</label>
                            <input id="file-2" type="file">
                        </div> <!-- single resume -->
                        
                        <div class="single_resume d-flex justify-content-between">
                            <a class="add_new" href="#">Add New Education</a>
                            <a class="delete" href="#"> Delete This</a>
                        </div> <!-- single resume -->
                        
                        <h4 class="resume_title">Work Experience</h4>
                        
                        <div class="single_resume">
                            <label>Company Name</label>
                            <input type="text" placeholder="Company Name">
                        </div> <!-- single resume -->
                        
                        <div class="single_resume">
                            <label>Title</label>
                            <input type="text" placeholder="e.g UI/UX Researcher">
                        </div> <!-- single resume -->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single_resume">
                                    <label>Date Form</label>
                                    <input type="text" placeholder="e.g 2014">
                                </div> <!-- single resume -->
                            </div>
                            <div class="col-md-6">
                                <div class="single_resume">
                                    <label>Date To</label>
                                    <input type="text" placeholder="e.g 2020">
                                </div> <!-- single resume -->
                            </div>
                        </div> <!-- row -->
                        
                        <div class="single_resume">
                            <span>Description</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem quia aut modi fugit, ratione saepe perferendis odio optio repellat dolorum voluptas excepturi possimus similique veritatis nobis. Provident cupiditate delectus, optio?</p>
                        </div> <!-- single resume -->
                        
                        <div class="single_resume">
                            <label for="file-3">Choose a cover image</label>
                            <input id="file-3" type="file">
                        </div> <!-- single resume -->
                        
                        <div class="single_resume d-flex justify-content-between">
                            <a class="add_new" href="#">Add New Education</a>
                            <a class="delete" href="#"> Delete This</a>
                        </div> <!-- single resume -->
                        
                        <h4 class="resume_title">Skills</h4>
                        
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="single_resume">
                                    <label>Skill Name</label>
                                    <input type="text" placeholder="Skill name, e.g. HTML">
                                </div> <!-- single resume -->
                            </div>
                            <div class="col-md-6">
                                 <div class="single_resume">
                                    <label>% (1-100)</label>
                                    <input type="text" placeholder="Skill proficiency, e.g. 90">
                                </div> <!-- single resume -->
                            </div>
                        </div> <!-- row -->
                        
                        <div class="single_resume d-flex justify-content-between">
                            <a class="add_new" href="#">Add New Education</a>
                            <a class="delete" href="#"> Delete This</a>
                        </div> <!-- single resume -->
                        
                        <div class="single_resume d-flex justify-content-between">
                            <button class="main-btn">Save</button>
                        </div> <!-- single resume -->
                       
                    </form>
                </div> <!-- add resume form -->
            </div> 
        </div> <!-- row -->
    </div> <!-- container -->
</section>

@endsection
@extends('share.main')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <!--====== HEADER PART ENDS ======-->
  
    <!--====== JOB LIST PART START ======-->
    <div class="col-lg-4 col-sm-6">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif
</div>
<div class="page_banner bg_cover" style="background-image: url(assets/images/page_banner.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner_content d-sm-flex align-items-center justify-content-between">
                            <div class="content">
                                <h3 class="page_title">Freelancers</h3>
                                <p>More than 6  jobseekers turn to Fitcareer in their search for work, making over 150,000 applications every day.</p>
                            </div> <!-- content -->
                            <div class="banner_btn">
                                <a class="main-btn " href="#"></a>
                            </div> <!-- banner btn -->
                        </div> <!-- banner content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- page banner -->
    <section class="job_list_area pt-80">
  


<div class="job_projects">
<form action="{{ url()->current() }}" method="GET">

    
</form>

</form>


<div class="row">
        <?php $count = 0; // Add this counter ?>
        @foreach($resumes as $resume)
            @if($count % 4 == 0 && $count != 0) 
                </div> <!-- end row -->
                <div class="row"> <!-- new row after every 4 cards -->
            @endif

            <div class="col-sm-3"> <!-- changed to col-sm-3 for 4 cards in a row -->
                <div class="single_jobs jobs_border text-center mt-30">
                    <div class="jobs_image">
                        <img src="assets/images/jobs-1.jpg" alt="jobs">
                    </div>
                    <div class="jobs_content">
                        <h4 class="jobs_title"><a href="job-details.html">{{$resume->Name}}</a></h4>
                        <p class="description">
    <i class="fa fa-info-circle"></i>  {{$resume->Profession_Title}}
</p>

                    </div>
                    <div class="jobs_meta d-flex justify-content-between">
                        <p class="location"><i class="fa fa-map-marker"></i>  {{$resume->Location}} </p>
                        <p class="time"><i class="fa fa-money"></i>  {{$resume->Per_hour}}</p>
                    </div>
                    <div class="banner_btn">
                        <input type="button" value="Contacter" class="btn btn-primary"   id="emailButton"/>
                        <input type="button" value="Télécharger CV"  id="downloadButton" class="btn btn-primary" />
                             
                    </div> <!-- banner btn -->
                </div> <!-- single_jobs -->
            </div> <!-- col-sm-3 -->

            <?php $count++; // Increment the counter ?>
        @endforeach
    </div> <!-- end row -->
</div> <!-- job_projects -->


             <!-- container -->
    </section>

    <!--====== JOB LIST PART ENDS ======-->

    <!--====== SUBSCRIBE PART START ======-->

    <section class="subscribe_area pt-80 pb-80">
        <div class="container">
            <div class="subscribe_wrapper">
                <div class="subscribe_shape_1">
                    <img src="assets/images/shape-5.png" alt="shape">
                </div> <!-- subscribe shape -->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="subscribe_content">
                            <div class="section_title text-center pb-25">
                                <h5 class="sub_title">Newsletter</h5>
                                <h3 class="main_title">Subscribe Newsletter & Get Company News</h3>
                            </div> <!-- section title -->
                            <div class="subscribe_form">
                                <input type="text" placeholder="Enter Email Address">
                                <button class="main-btn">subscribe now</button>
                            </div>
                        </div> <!-- subscribe content -->
                    </div>
                </div> <!-- row -->
                <div class="subscribe_shape_2">
                    <img src="assets/images/shape-4.png" alt="shape">
                </div> <!-- subscribe shape -->
            </div> <!-- subscribe wrapper -->
        </div> <!-- container -->
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const downloadButton = document.getElementById('downloadButton');
    
            downloadButton.addEventListener('click', function() {
                // Replace the URL with the actual path to your PDF file
                const pdfFileUrl = 'http://127.0.0.1:8000/60555636.pdf';
    
                // Create an invisible anchor element
                const a = document.createElement('a');
                a.style.display = 'none';
    
                // Set the anchor's href to the PDF file URL
                a.href = pdfFileUrl;
                a.download = '60555636.pdf'; // You can set the download file name
    
                // Append the anchor to the document body and trigger the click event
                document.body.appendChild(a);
                a.click();
    
                // Clean up by removing the anchor
                document.body.removeChild(a);
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
    const emailButton = document.getElementById('emailButton');

    emailButton.addEventListener('click', function() {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        fetch('/send-email', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken, // Include CSRF token
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ /* Any data to send with the request */ })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message); // Show a success message
        })
        .catch(error => {
            console.error(error); // Handle errors
        });
    });
});

    </script>
@endsection
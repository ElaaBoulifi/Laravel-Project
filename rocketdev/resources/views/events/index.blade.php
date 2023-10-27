@extends('share.main')
@section('content')

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
                                <h3 class="page_title">Events</h3>
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
    <div class="job_list_filter row"> 
        <!-- Title Filter -->
        <div class="col-lg-3 col-sm-6">
            <div class="single_filter">
                <input type="text" name="titre" placeholder="Search by title..." value="{{ request()->get('titre') }}">
            </div>
        </div>

        <!-- Date Filter -->
        <div class="col-lg-3 col-sm-6">
            <div class="single_filter">
                <input type="text" id="datepicker" name="date_debut" placeholder="Select date..." value="{{ request()->get('date_debut') }}">
            </div>
        </div>

        <!-- Price Filter -->
        <div class="col-lg-3 col-sm-6">
            <div class="single_filter">
                <select name="price_order">
                    <option value="">Trier par prix</option>
                    <option value="asc" {{ request()->get('price_order') == 'asc' ? 'selected' : '' }}>Croissant</option>
                    <option value="desc" {{ request()->get('price_order') == 'desc' ? 'selected' : '' }}>Décroissant</option>
                </select>
            </div>
        </div>

        <!-- Filter Submit Button -->
        <div class="col-lg-3 col-sm-6">
            <div class="single_filter">
                <button type="submit" class="main-btn">Filter</button>
            </div>
        </div>
    </div>
 
    
</form>

</form>


<div class="row">
        <?php $count = 0; // Add this counter ?>
        @foreach($events as $eventt)
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
                        <h4 class="jobs_title"><a href="job-details.html">{{$eventt->titre}}</a></h4>
                        <p class="description">
    <i class="fa fa-info-circle"></i> Description : {{$eventt->desc}}
</p>

                    </div>
                    <div class="jobs_meta d-flex justify-content-between">
                        <p class="location"><i class="fa fa-map-marker"></i> Lieu: {{$eventt->lieu}} </p>
                        <p class="time"><i class="fa fa-money"></i> Prix: {{$eventt->prix}}</p>
                    </div>
                    <div class="banner_btn">
                                <a class="main-btn "href="{{ route('participate.create', ['events' => $eventt->id]) }}">Participer</a>
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

  
    
    <!--====== OVERLAY PART ENDS ======-->

    <!--====== PART START ======-->

    <!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-">
                    
                </div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->

    <!-- row -->


   



<!-- Mirrored from demo.graygrids.com/themes/jobmate/job-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Oct 2023 10:42:02 GMT -->
@endsection
@extends('share.main')
@section('content')


 <!-- header navbar -->

        <div class="page_banner bg_cover" style="background-image: url(assets/images/page_banner.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner_content d-sm-flex align-items-center justify-content-between">
                            <div class="content">
                                <h3 class="page_title">Job List</h3>
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
    <section class="job_list_area pt-80">
  
    <?php 
$titre = request()->get('titre');
$date_debut = request()->get('date_debut');
$price_order = request()->get('price_order');

$query = DB::table('projets'); // Assuming you're using Laravel's query builder

if($titre) {
    $query = $query->where('titre', 'like', '%' . $titre . '%');
}

if($date_debut) {
    $query = $query->where('date_debut', $date_debut);
}

if($price_order) {
    if ($price_order == 'asc') {
        $query->orderBy('prix', 'asc');
    } elseif ($price_order == 'desc') {
        $query->orderBy('prix', 'desc');
    }
}

$projet = $query->get(); // Execute the query to get the results
?>

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


    <div class="row">
        <?php $count = 0; // Add this counter ?>
        @foreach($projet as $projett)
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
                        <h4 class="jobs_title"><a href="job-details.html">{{$projett->titre}}</a></h4>
                        <p class="description">{!! html_entity_decode($projett->description) !!}</p>
                        <p class="duree">Durée: {{$projett->duree}} jours</p>
                        <p class="date_debut"><i class="fa fa-clock-o"></i> {{$projett->date_debut}}</p>
                        <p class="prix">Prix: {{$projett->prix}} $</p>
                    </div>
                    <div class="jobs_meta d-flex justify-content-between">
                        <p class="location"><i class="fa fa-map-marker"></i> 18 Brooklyn, NY</p>
                        <p class="time"><i class="fa fa-clock-o"></i> Freelance</p>
                    </div>
                    <div class="jobs_btn">
                        <a href="{{ route('condidature.create', ['projets' => $projett->id]) }}">postuler</a>
                    </div>
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
                            <form method="POST" action="{{ route('subscribe.store') }}">
                                       @csrf
                                <h5 class="sub_title">Newsletter</h5>
                                <h3 class="main_title">Subscribe Newsletter & Get Company News</h3>
                            </div> <!-- section title -->
                            <div class="subscribe_form">
                            <input type="email" name="email" placeholder="Enter Email Address" required>
                                <button type="submit" class="main-btn">Subscribe Now</button>
                            </div>
                    </form>

                        </div> <!-- subscribe content -->
    
        
                    </div>
                </div> <!-- row -->
                <div class="subscribe_shape_2">
                    <img src="assets/images/shape-4.png" alt="shape">
                </div> <!-- subscribe shape -->
            </div> <!-- subscribe wrapper -->
        </div> <!-- container -->
    </section>



    <!--====== SUBSCRIBE PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== OVERLAY PART START ======-->
    
    <div class="overlay"></div>
    
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


    <!--====== Jquery js ======-->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--====== Slick js ======-->
    <script src="assets/js/slick.min.js"></script>

    <!--====== Nice Select js ======-->
    <script src="assets/js/jquery.nice-select.min.js"></script>

    <!--====== Counter Up js ======-->
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.js"></script>

    <!--====== Summer Note js ======-->
    <script src="assets/js/summernote.min.js"></script>
    <script src="assets/js/summernote-bs4.min.js"></script>

    <!--====== Date Picker js ======-->
    <script src="assets/js/gijgo.min.js"></script>

    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

</body>


@endsection


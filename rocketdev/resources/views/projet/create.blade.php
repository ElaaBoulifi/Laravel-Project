@extends('share.main')
@section('content')

    <!--====== HEADER PART ENDS ======-->
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
  
    <!--====== JobMate PART START ======-->
    <section class="post_job_area pt-80 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="post_job_form">
                    <form action="{{ route('projet.store') }}" method="POST">
    @csrf
    <h4 class="post_job_title">Basic information</h4>

    <div class="single_post_job">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" >
        @error('titre')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="single_post_job">
        <label for="description">Description :</label>
        <textarea id="summernote" name="description" ></textarea>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="single_post_job">
        <label for="duree">Durée :</label>
        <input type="number" id="duree" name="duree" min="1">
        @error('duree')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="single_post_job">
        <label for="date_debut">Date de début :</label>
        <input type="date" id="datepicker" placeholder="yyyy-mm-dd" name="date_debut" >
        @error('date_debut')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="single_post_job">
        <label for="prix">Prix :</label>
        <input type="number" step="10" id="prix" name="prix"  min ="50">
        @error('prix')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button type="submit">Ajouter</button>
    </div>
</form>

    </div> <!-- JobMate form -->
                </div>
         
                    </div> <!-- JobMate form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== JobMate PART ENDS ======-->

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

@endsection

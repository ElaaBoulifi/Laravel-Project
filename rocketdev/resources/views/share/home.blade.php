

@extends('share.main')
@section('content')

<div class="page_banner bg_cover" style="background-image: url(assets/images/page_banner.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner_content d-sm-flex align-items-center justify-content-between">
                    <div class="content">
                        <h3 class="page_title">JobMate</h3>
                        <p>More than 6 million jobseekers turn to Fitcareer in their search for work, making over 150,000 applications every day.</p>
                    </div> <!-- content -->
                    <div class="banner_btn">
                        <a class="main-btn " href="{{ route('projet') }}">75K JOBS</a>
                    </div> <!-- banner btn -->
                </div> <!-- banner content -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div> <!-- page banner -->
    <section class="counter_area gray-bg pt-50 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="single_counter text-center mt-30">
                        <div class="counter_icon_bar">
                            <div class="counter_icon">
                                <i class="flaticon-businessman"></i>
                            </div>
                            <div class="counter_num">
                                <span class="num">01</span>
                            </div>
                        </div>
                        <div class="counter_content">
                            <span class="count counter">8,057</span>
                            <p>Registered Companies</p>
                        </div>
                    </div> <!-- single counter -->
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="single_counter text-center mt-30">
                        <div class="counter_icon_bar">
                            <div class="counter_icon">
                                <i class="flaticon-boy-broad-smile"></i>
                            </div>
                            <div class="counter_num">
                                <span class="num">02</span>
                            </div>
                        </div>
                        <div class="counter_content">
                            <span class="count counter">175,547</span>
                            <p>Job Seekers</p>
                        </div>
                    </div> <!-- single counter -->
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="single_counter text-center mt-30">
                        <div class="counter_icon_bar">
                            <div class="counter_icon">
                                <i class="flaticon-planet-earth"></i>
                            </div>
                            <div class="counter_num">
                                <span class="num">03</span>
                            </div>
                        </div>
                        <div class="counter_content">
                            <span class="count counter">12</span>
                            <p>Countries</p>
                        </div>
                    </div> <!-- single counter -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="counter-shape">
            <img src="assets/images/shape-1.svg" alt="Shape">
        </div>
    </section>

    <!--====== COUNTER PART ENDS ======-->

    <!--====== CATEGORY PART START ======-->


    <!--====== CATEGORY PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

 
    <!--====== ABOUT PART ENDS ======-->

    <!--====== TRENDING JOB PART START ======-->

    <section class="trending_jobs pt-75 pb-80 gray-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="section_title pb-25">
                        <h5 class="sub_title">inscrivez vous</h5>
                        <br>
                        <h2>Nos formations dans le developpement </h2>
                    </div> <!-- section title -->
                </div>
                <div class="col-md-5">
                    <div class="jobs_tabs_menu d-flex justify-content-md-end">
                        <ul class="nav" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="trending-tab" data-toggle="tab" href="#web" role="tab" aria-controls="trending" aria-selected="true">Web</a>
                            </li>
                            <li class="nav-item">
                                <a id="recent-tab" data-toggle="tab" href="#mobile" role="tab" aria-controls="recent" aria-selected="false">Mobile</a>
                            </li>
                        </ul>
                     <!-- nav -->
                    </div> <!-- jobs tabs menu -->
                </div>
            </div> <!-- row -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="web" role="tabpanel" aria-labelledby="trending-tab">
                    <div class="row">
                    @foreach($formationsweb as $formation)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_jobs text-center mt-30">
                                <div class="jobs_image">
                                <img src="{{ asset('images/' . $formation->image) }}" width="100" height="100" alt="Image"></td>
                                </div>
                                <div class="jobs_content">
                                    <h4 class="jobs_title"><a href="job-details.html">{{$formation->titre}}</a></h4>
                                    <p class="sub_title">{{$formation->description}}</p>
                                </div>
                                <div class="jobs_meta d-flex justify-content-between">
                                    <p class="location"><i class="fa fa-money"></i> {{$formation->prix}}</p>
                                    <p class="time"><i class="fa fa-clock-o"></i>{{$formation->date_debut}} </p>
                                </div>
                                <div class="jobs_btn">
                                <a class="main-btn "href="{{ route('inscription.create', ['formation' => $formation->id]) }}">inscriver vous</a>
                                </div>
                                <!-- Button trigger modal -->

<!-- Modal -->
                     </div> <!-- single jobs -->
                        </div>



                     <!-- Affichez d'autres attributs ici -->
                    @endforeach
                    </div> <!-- row -->
                </div>



</div>
                <div class="tab-pane fade" id="mobile" role="tabpanel" aria-labelledby="recent-tab">

                    <div class="row">
                    @foreach($formationsmobile as $formation)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_jobs text-center mt-30">
                                <div class="jobs_image">
                                <img src="{{ asset('images/' . $formation->image) }}" width="100" height="100" alt="Image"></td>
                                </div>
                                <div class="jobs_content">
                                    <h4 class="jobs_title"><a href="job-details.html">{{$formation->titre}}</a></h4>
                                    <p class="sub_title">{{$formation->description}}</p>
                                </div>
                                <div class="jobs_meta d-flex justify-content-between">
                                    <p class="location"><i class="fa fa-money"></i> {{$formation->prix}}</p>
                                    <p class="time"><i class="fa fa-clock-o"></i>{{$formation->date_debut}} </p>
                                </div>
                                <div class="jobs_btn">
                                <a class="main-btn "href="{{ route('inscription.create', ['formation' => $formation->id]) }}">inscriver vous</a>
                                </div>
                                <!-- Button trigger modal -->

<!-- Modal -->
                     </div> <!-- single jobs -->
                        </div>



                     <!-- Affichez d'autres attributs ici -->
                    @endforeach
                    </div> <!-- row -->
                </div>
                </div>
            </div> <!-- tab content -->
        </div> <!-- container -->
    </section>

 

</div>



    @endsection
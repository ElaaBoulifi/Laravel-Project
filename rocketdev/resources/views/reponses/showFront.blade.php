@extends('share.main')
@section('content')
<div class="page_banner bg_cover" style="background-image: url('{{ asset('assets/images/page_banner.jpg') }}'); height: 500px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner_content d-sm-flex align-items-center justify-content-between">
                            <div class="content">
                                <h3 class="page_title">Mes réclamations</h3>
                            </div> <!-- content -->
                        </div> <!-- banner content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
    </div> <!-- page banner -->
<section class="profile_area pt-30 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="profile_resume mt-50">
                        <div class="resume_author d-sm-flex">
                            <div class="author_name media-body">
                            <h3 class="resume_title">Réclamation traitée</h3>
                                <p> Réclamation concernant {{$reponse->reclamation->categorie}}</p>
                                <p> Date soumission {{$reponse->reclamation->date_soumission}}</p>
                                <p> Date réponse {{$reponse->date_reponse}}</p>
                            </div>
                        </div> <!-- resume author -->
                        
                        <div class="resume_about">
                        <h2 class="resume_title">Réponse: </h2>
                            <p> {{ $reponse->contenu }} </p><br><br>
                            <a href="{{ asset('uploads/' . $reponse->piece_jointe) }}" data-lightbox="image-set">
                                <img style="width:200px; height:130px;" src="{{ asset('uploads/' . $reponse->piece_jointe) }}" alt="Image de la pièce jointe">
                            </a>
                        </div> <!-- resume about -->
                        
<br>                        <div class="resume_education">                            
                            <div class="education">
                                <p>On espère qu'on a reglé votre problème, Profitez de votre expérience avec JobMate </p>
                                <br><h5 class="education_title">JobMate</h5>                            </div> <!-- education -->
                            
                           
                        </div> <!-- resume education -->
                        <br>                        <br>
                        <br>
                        <br>
                        <br>

                    <a style="text-align: right;" class="main-btn" href="{{route ('reclamations.index')}}">Retour aux réclamations</a>
                    </div> <!-- profile resume -->
                </div>
                
            </div> <!-- row -->
        </div> <!-- container -->
        

        @endsection
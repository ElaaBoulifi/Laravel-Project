@extends('share.main')
@section('content')
<div class="page_banner bg_cover" style="background-image: url(assets/images/page_banner.jpg); height: 500px;" >
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

<section class="contact_area pt-30 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact_form mt-45">
                        <h4 class="contact_title">Envoyer une Réclamation</h4>

                      <form method="post" action="{{route('reclamations.store')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                              
                                <div class="col-md-12">
                                    <div class="single_form">
                                        <input id="sujet" name="sujet" type="text" placeholder="Sujet">
                                        @error('sujet')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="single_form">
                                    <select class="form-control" id="categorie" name="categorie">
                                        <option value="" disabled selected>Catégorie</option>
                                      <option value="PROBLEME_TECHNIQUE">Problème technique</option>
                                      <option value="SERVICE_CLIENT">Service client</option>
                                      <option value="FACTURATION">Facturation</option>
                                    </select>
                                    @error('categorie')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="single_form">
                                    <select name="evaluation" id="evaluation" class="form-control">
                                        <option value="" disabled selected>Evaluation reclamation</option>
                                        <option value="1">1 (Basse)</option>
                                        <option value="2">2 (Moyenne)</option>
                                        <option value="3">3 (Élevée)</option>
                                        <option value="4">4 (Très élevée)</option>
                                    </select>
                                    @error('evaluation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="single_form">
                                        <textarea id="description" name="description" placeholder="Description"></textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div> 
                                </div>
                                <div class="col-md-12"><br>
                                    <input type="file" name="piece_jointe" id="piece_jointe" class="form-control-file">
                                </div>
                                <div class="col-md-12">
                                    <div class="single_form">
                                        <button class="main-btn"  type="submit">Envoyer Reclamation</button>
                                    </div> <!-- single form -->
                                </div>
                            </div> <!-- row -->
                        </form>
                    </div> <!-- contact form -->
                </div>
         
            </div> <!-- row -->
         
        </div> <!-- container -->
    </section>
   
@endsection
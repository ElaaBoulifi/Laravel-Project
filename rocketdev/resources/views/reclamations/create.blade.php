@extends('share.main')
@section('content')

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
                <div class="col-lg-6">
                    <div class="contact_info mt-45">
                        <h4 class="contact_title">Contact Address</h4>

                        <div class="contact_info_wrapper">

                            <div class="single_contact_info d-sm-flex">
                                <div class="contact_icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="contact_content media-body">
                                    <p>Main Office: NO.22-23 Street Name- City,Country </p>
                                    <p>Customer Center: NO.130-45 Streen Name- City, Country</p>
                                </div>
                            </div> <!-- single contact info -->

                            <div class="single_contact_info d-sm-flex">
                                <div class="contact_icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="contact_content media-body">
                                    <p>Customer Support: info@mail.com </p>
                                    <p>Technical Support: support@mail.com</p>
                                </div>
                            </div> <!-- single contact info -->

                            <div class="single_contact_info d-sm-flex">
                                <div class="contact_icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="contact_content media-body">
                                    <p>Main Office: +880 123 456 789 </p>
                                    <p>Customer Supprort: +880 123 456 789</p>
                                </div>
                            </div> <!-- single contact info -->

                        </div> <!-- contact info -->
                    </div> <!-- contact info -->
                </div>
            </div> <!-- row -->
         
        </div> <!-- container -->
    </section>
    <div class="footer_copyright">
            <div class="container">
                <div class="copyright_content text-center d-sm-flex justify-content-between align-items-center">
                    <a href="#" class="logo"><img src="assets/images/logo.png" alt="Logo"></a>
                    <p class="copyright">JobMate © 2024 All Right Reserved</p>
                </div> <!-- copyright content -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
@endsection
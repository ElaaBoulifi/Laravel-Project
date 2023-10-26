@extends('backoffice.main')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Réponse réclamation</h5>
                 
                    <form method="POST" action="{{route('reponses.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="reclamation_id" value="{{ $reclamation_id }}">
                        <div class="row mb-3">
                            <label for="contenu" class="col-sm-2 col-form-label">Reponse</label>
                            <div class="col-sm-10">
                                <textarea type="text" id="contenu" name="contenu" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12"><br>
                            <input type="file" name="piece_jointe" id="piece_jointe" class="form-control-file">
                        </div> 
                        <div class="row mb-3"><br>
                            <div class="col-sm-10"><br>
                                <button type="submit" class="btn btn-primary">Envoyer réponse</button>
                            </div>
                        </div>
                    </form><!-- Fin des éléments généraux du formulaire -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
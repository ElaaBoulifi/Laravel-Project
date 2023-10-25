@extends('backoffice.main')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <a class="card-title" href="{{ route('reclamations.nontraitees') }}">Réclamations non traitées</a>
                    <a class="card-title" href="{{ route('reclamations.admin_reclamations') }}">Réclamations traitées</a>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-top">


                            </div>
                            <div class="datatable-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date réponse</th>
                                            <th>Contenu</th>
                                            <th>Piece jointe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>{{ $reponse->date_reponse }}</td>
                                                <td><textarea cols="25" rows="5" disabled>{{ $reponse->contenu }}</textarea></td>
                                                <td class="image-container">
                                                    <a href="{{ asset('uploads/' . $reponse->piece_jointe) }}" data-lightbox="image-set">
                                                        <img style="width:200px; height:130px;" src="{{ asset('uploads/' . $reponse->piece_jointe) }}" alt="Image de la pièce jointe">
                                                    </a>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>

                            </div>                  
                        </div>
                    </div>
                </div>

            </div>
        </div>
       
    </section>
@endsection

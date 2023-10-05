@extends('backoffice.main')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Réclamations</h5>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-top">


                            </div>
                            <div class="datatable-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sujet</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Categorie</th>
                                            <th>Evaluation</th>
                                            <th>Etat</th>
                                            <th>Piece jointe</th>

                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($reclamations as $item)
                                            <tr>
                                                <td>{{ $item->sujet }}</td>
                                                <td><textarea cols="25" rows="8" disabled>{{ $item->description }}</textarea></td>
                                                <td>{{ $item->date_soumission }}</td>
                                                <td>{{ $item->categorie }}</td>
                                                <td>{{ $item->evaluation }}</td>
                                                <td>{{ $item->etat }}</td>
                                                <td class="image-container">
                                                <a href="{{ asset('uploads/' . $item->piece_jointe) }}" data-lightbox="image-set">
                                                  <img style="width:200px; height:130px;" src="{{ asset('uploads/' . $item->piece_jointe) }}" alt="Image de la pièce jointe">
                                                  </a>

                                                </td>
                                                <td>
                                                    <a name="{{ $item->id }}" class="btn btn-success edit-item">Traiter</a>
                                                </td>
                                                <td>
                                                  <form method="POST" action="{{ route('reclamations.destroy', $item->id) }}">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="btn btn-danger" @if ($item->etat === 'en cours de traitement') disabled @endif>
                                                          <i class="bi bi-trash"></i>
                                                      </button>
                                                  </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            
                        </div>
                       
                    
                      
                      
                     
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
       
    </section>
    <script src="{{ asset('path-to-lightbox2/js/lightbox.js') }}"></script>
<link href="{{ asset('path-to-lightbox2/css/lightbox.css') }}" rel="stylesheet">

@endsection

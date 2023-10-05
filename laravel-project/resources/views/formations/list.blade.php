@extends('backoffice.main')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formation List</h5>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-top">


                            </div>
                            <div class="datatable-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Date debut</th>
                                            <th>duree</th>
                                            <th>prix</th>
                                            <th>Actions</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($formations as $item)
                                            <tr>
                                                <td>  <img src="{{ asset('images/' . $item->image) }}" width="100" height="100" alt="Image"></td>
                                                <td>{{ $item->titre }} </td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->date_debut }}</td>
                                                <td>{{ $item->duree }}</td>
                                                <td>{{ $item->prix }}</td>
                                                <td>
                                                <form method="POST" action="{{ route('formations.delete', $item) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger delete-item" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')"> <i class="bi bi-trash"></i>Supprimer</button>
                                                </form>
                                                
                                                </td>
                                                <td>
                                                <form  action="{{ route('formations.edit', $item) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-warning delete-item"> <i class="bi bi-edit"></i>modiffier</button>
                                                </form>
                                                </td>
                                                
                                                <!-- Add more table columns to display other attributes -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>




                            </div>
                           
                        
                        </div>
                       
                        <ul class="pagination">
                          @if ($formations->onFirstPage())
                              <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                          @else
                              <li class="page-item"><a class="page-link" href="{{ $formations->previousPageUrl() }}">&laquo;</a></li>
                          @endif
                      
                          @foreach ($formations as $page => $url)
                              @if ($page == $formations->currentPage())
                                  <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                              @else
                                  <li class="page-item"><a class="page-link" href="{{ $formations->url($page) }}">{{ $page }}</a></li>
                                  {{-- Use $formations->url($page) to generate the correct URL for each page number --}}
                              @endif
                          @endforeach
                      
                          @if ($formations->hasMorePages())
                              <li class="page-item"><a class="page-link" href="{{ $formations->nextPageUrl() }}">&raquo;</a></li>
                          @else
                              <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                          @endif
                      </ul>
                      
                      
                     
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
       
    </section>
@endsection


@extends('backoffice.main')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Events List</h5>
  


<a href="{{ route('generer.pdf') }}" class="btn btn-primary">Générer PDF</a>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-top">


                            </div>
                            <div class="datatable-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                           
                                            <th>Titre</th>
                                            <th>Lieu</th>
                                            <th>Desc</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $item)
                                            <tr>
                                                <td>{{ $item->titre }} </td>
                                                <td>{{ $item->lieu }}</td>
                                                <td>{{ $item->desc }}</td>
                                                <td>  <img src="{{ asset('images/' . $item->image) }}" width="100" height="100" alt="Image"></td>

                                                <td>
                                                <form method="POST" action="{{ route('events.delete', $item) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger delete-item" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')"> <i class="bi bi-trash"></i>Supprimer</button>
                                                </form>
                                                
                                                </td>
                                                <td>
                                                <form  action="{{ route('events.edit', $item) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-warning delete-item"> <i class="bi bi-edit"></i>modifier</button>
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
                          @if ($events->onFirstPage())
                              <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                          @else
                              <li class="page-item"><a class="page-link" href="{{ $events->previousPageUrl() }}">&laquo;</a></li>
                          @endif
                      
                          @foreach ($events as $page => $url)
                              @if ($page == $events->currentPage())
                                  <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                              @else
                                  <li class="page-item"><a class="page-link" href="{{ $events->url($page) }}">{{ $page }}</a></li>
                                  {{-- Use $events->url($page) to generate the correct URL for each page number --}}
                              @endif
                          @endforeach
                      
                          @if ($events->hasMorePages())
                              <li class="page-item"><a class="page-link" href="{{ $events->nextPageUrl() }}">&raquo;</a></li>
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

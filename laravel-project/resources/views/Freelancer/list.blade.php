@extends('backoffice.main')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Freelancers List</h5>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-top">


                            </div>
                            <div class="datatable-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Speciality</th>
                                            <th>Availability</th>
                                            <th>Actions</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->nom }} {{ $item->prenom }}</td>
                                                <td>{{ $item->specialite }}</td>
                                                <td>{{ $item->disponibilite }}</td>
                                                <td>
                                                    <a name="{{ $item->id }}" class="btn btn-danger delete-item" onclick="return confirm('Are you sure you want to delete this freelancer {{ $item->nom }} {{ $item->prenom }}?')"><i class="bi bi-trash"></i></a>
                                                    <button type="button" name="{{ $item->id }}" class="btn btn-primary"><i class="bi bi-folder"></i></button>
                                                </td>
                                                <!-- Add more table columns to display other attributes -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>




                            </div>
                           
                        
                        </div>
                       
                        <ul class="pagination">
                          @if ($data->onFirstPage())
                              <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                          @else
                              <li class="page-item"><a class="page-link" href="{{ $data->previousPageUrl() }}">&laquo;</a></li>
                          @endif
                      
                          @foreach ($data as $page => $url)
                              @if ($page == $data->currentPage())
                                  <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                              @else
                                  <li class="page-item"><a class="page-link" href="{{ $data->url($page) }}">{{ $page }}</a></li>
                                  {{-- Use $data->url($page) to generate the correct URL for each page number --}}
                              @endif
                          @endforeach
                      
                          @if ($data->hasMorePages())
                              <li class="page-item"><a class="page-link" href="{{ $data->nextPageUrl() }}">&raquo;</a></li>
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











@extends('backoffice.main')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">projet List</h5>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-top">


                            </div>
                            <div class="datatable-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>titre</th>
                                            <th>description</th>
                                            <th>duree</th>
                                            <th>date</th>
                                            <th>prix</th>

                                            <th>Actions</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->titre }} </td>
                                                <td>{!! html_entity_decode($item->description) !!}</td>
                                                <td>{{ $item->duree }}</td>
                                                <td>{{ $item->date_debut }}</td>
                                                <td>{{ $item->prix }}</td>

                                                <td  style="padding: 10px;">
                                            <form method="POST" action="{{ route('projets.destroy', $item->id) }}">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger">
                                           
                                                  <i class="bi bi-trash"></i> Supprimer
                                              </button>
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


   <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">inscription List</h5>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-top">


                            </div>
                            <div class="datatable-container">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>nom</th>
                                            <th>prenom</th>
                                            <th>email</th>
                                            <th>date d'inscription</th>
                                            <th>etat</th>
                                            <th>formation</th>
                                            <th>Actions</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inscription as $item)
                                            <tr>
                                                <td>{{ $item->nom }} </td>
                                                <td>{{ $item->prenom }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->date_inscription }}</td>
                                                <td>{{ $item->etat }}</td>
                                                <td>{{ $item->formation->titre }}</td>
                                                <td>
                                                <form method="POST" action="{{ route('inscription.delete', $item) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger delete-item" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette inscription ?')"> <i class="bi bi-trash"></i>Supprimer</button>
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
                          @if ($inscription->onFirstPage())
                              <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                          @else
                              <li class="page-item"><a class="page-link" href="{{ $inscription->previousPageUrl() }}">&laquo;</a></li>
                          @endif

                          @foreach ($inscription as $page => $url)
                              @if ($page == $inscription->currentPage())
                                  <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                              @else
                                  <li class="page-item"><a class="page-link" href="{{ $inscription->url($page) }}">{{ $page }}</a></li>
                                  {{-- Use $inscription->url($page) to generate the correct URL for each page number --}}
                              @endif
                          @endforeach

                          @if ($inscription->hasMorePages())
                              <li class="page-item"><a class="page-link" href="{{ $inscription->nextPageUrl() }}">&raquo;</a></li>
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

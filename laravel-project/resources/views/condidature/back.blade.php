@extends('backoffice.main')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">candidatureq List</h5>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-top">


                            </div>
                            <div class="datatable-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>projet id</th>
                                            <th>nom</th>
                                            <th>prenom</th>
                                            <th>email</th>
                                            <th>tel</th>
                                            <th>cv</th>
                                            <th>lettre motivation</th>
                                            <th>Actions</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($candidature as $item)
                                            <tr>
                                                
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->projet_id }} </td>
                                                <td>{{ $item->nom }}</td>
                                                <td>{{ $item->prenom }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->tel }}</td>
                                                <td>{{ $item->cv }}</td>
                                                <td>{!! html_entity_decode($item->lettre_motivation) !!}</td>
                                          

                                                <td  style="padding: 10px;">
                                            <form method="POST" action="{{ route('candidature.destroy', $item->id) }}">
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
                  
                      
                     
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
       
    </section>
@endsection

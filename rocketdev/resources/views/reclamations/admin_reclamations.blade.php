@extends('backoffice.main')
@section('content')
<style>
    <style>
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .page-item {
        margin: 0 5px;
    }

    .pagination .page-item a {
        text-decoration: none;
        padding: 5px 10px;
        background-color: #007BFF;
        color: #fff;
        border-radius: 5px;
    }

    .pagination .page-item a:hover {
        background-color: #0056b3;
    }

    /* Style for the search input */
    .search-input {
        width: 350px; /* Set the width as desired */
        height: 40px; /* Set the height as desired */
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 14px; /* Increase font size for larger input */
        background-color: #f2f2f2;
        outline: none; /* Remove the outline when focused */
    }

    /* Style for the search input when focused */
    .search-input:focus {
        border-color: #007BFF; /* Change the border color when focused */
    }
    .search-box {
        display: inline-block;

    position: relative;
}

/* Style pour l'icône de recherche */
.search-icon {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    color: #888; /* Couleur de l'icône */
    cursor: pointer; /* Curseur de souris au survol de l'icône */
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
<!-- HTML for the search input -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <a class="card-title" href="{{ route('reclamations.nontraitees') }}">Réclamations non traitées</a>
                    <a class="card-title" href="{{ route('reclamations.admin_reclamations') }}">Réclamations traitées</a>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            
                            <div class="datatable-container">
                                <!-- search.blade.php -->
                                <form action="{{ url()->current() }}" id="search-form" method="GET">
                                <div class="search-box">
                                        <input class="search-input" type="text" name="search" id="search" placeholder="Rechercher par sujet, categorie.." value="{{ request('search') }}" >
                                        <i class="fa fa-search search-icon"></i></div>
                                        <br>
                                    <select class="search-input"name="categorie" id="categorie">
                                        <option disabled selected value="" >Categorie Filter</option>
                                        <option value="" >Tous</option>
                                        <option value="FACTURATION" {{ request('categorie') == 'FACTURATION' ? 'selected' : '' }}>Facturation</option>
                                        <option value="PROBLEME_TECHNIQUE" {{ request('categorie') == 'PROBLEME_TECHNIQUE' ? 'selected' : '' }}>Problème Technique</option>
                                        <option value="SERVICE_CLIENT" {{ request('categorie') == 'SERVICE_CLIENT' ? 'selected' : '' }}>Service Client</option>
                                        <!-- Add more options as needed -->
                                    </select>


                                    <select class="search-input"name="evaluation" id="evaluation">
                                        <option disabled selected value="" >Evaluation Filter</option>
                                        <option value="" >Tous</option>
                                        <option value="1" {{ request('evaluation') == '1' ? 'selected' : '' }}>Basse</option>
                                        <option value="2" {{ request('evaluation') == '2' ? 'selected' : '' }}>Moyenne </option>
                                        <option value="3" {{ request('evaluation') == '3' ? 'selected' : '' }}>Elevee </option>
                                        <option value="4" {{ request('evaluation') == '4' ? 'selected' : '' }}>Tres Elevee</option>

                                        <!-- Add more options as needed -->
                                    </select>

                                    <button class="btn btn-primary edit-item" type="submit">Filter</button>

                                </form>
                                <br>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Sujet</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Categorie</th>
                                            <th>Evaluation</th>
                                            <th>Etat</th>
                                            <th>Piece jointe </th>

                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($reclamations as $item)
                                            <tr>
                                                <td>{{ $item->user->name }} </td>
                                                <td>{{ $item->sujet }}</td>
                                                <td><textarea cols="25" rows="5" disabled>{{ $item->description }}</textarea></td>
                                                <td>{{ $item->date_soumission }} </td>
                                                <td>{{ $item->categorie }}</td>
                                                    @if ($item->evaluation == 1)
                                                        <td>Basse</td>
                                                    @elseif ($item->evaluation == 2)
                                                        <td>Moyenne</td>
                                                    @elseif ($item->evaluation == 3)
                                                        <td>Elevee</td>
                                                    @else
                                                        <td>Très elevee</td>
                                                    @endif

                                                <td>{{ $item->etat }}</td>
                                                <td class="image-container">
                                                <a href="{{ asset('uploads/' . $item->piece_jointe) }}" data-lightbox="image-set">
                                                  <img style="width:200px; height:130px;" src="{{ asset('uploads/' . $item->piece_jointe) }}" alt="Image de la pièce jointe">
                                                  </a>

                                                </td>
                                                <td>
                                                    @if ($item->etat === 'en cours de traitement')
                                                        <a class="btn btn-success edit-item" href="{{ route('reponses.create', ['reclamations' => $item->id]) }}">Traiter</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->etat === 'traité')
                                                        @if ($item->reponse) <!-- Vérifiez si la réclamation a une réponse -->
                                                            <a href="{{ route('reponses.show', ['reponse' => $item->reponse->id]) }}" class="btn btn-primary"> Réponse</a>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                  <form method="POST" action="{{ route('reclamations.destroyy', $item->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        @if ($item->etat === 'traité')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                        @endif
                                                  </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination">
                                {{ $reclamations->links('pagination::simple-bootstrap-4') }}
                            </div>

                            </div>                  
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search').on('input', function() {
            $('#search-form').submit();
        });
    });
</script> -->


@endsection

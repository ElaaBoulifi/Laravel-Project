@extends('backoffice.main')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Formation</h5>
                    <div>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div style="color:red">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                    @if(session('success'))
                        <div id="flash-message" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        <script>
                            // Utilisez setTimeout pour masquer le message flash après 3 secondes (3000 millisecondes)
                            setTimeout(function() {
                                var flashMessage = document.getElementById('flash-message');
                                if (flashMessage) {
                                    flashMessage.style.display = 'none';
                                    window.location.href = "{{ route('formations.list') }}"; // Remplacez par votre route souhaitée
                                }
                            }, 3000);
                        </script>
                    @endif
                  <!-- General Form Elements -->
<form method="POST" action="{{ route('formations.updatee', $formation) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Titre</label>
        <div class="col-sm-10">
            <input type="text" name="titre" class="form-control" value="{{ $formation->titre }}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" name="description" class="form-control" value="{{ $formation->description }}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Categorie</label>
        <div class="col-sm-10">
        <select name="gategorie" class="form-control">
                                    <option value="web">web</option>
                                    <option value="mobile">mobile</option>

            <!-- Ajoutez autant d'options que nécessaire -->
        </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Date de début</label>
        <div class="col-sm-10">
            <input type="date" name="date_debut" class="form-control" value="{{ $formation->date_debut }}">
        </div>
    </div>
    <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Date fin</label>
                            <div class="col-sm-10">
                                <input type="date" name="date_fin" class="form-control" value="{{ $formation->date_fin }}">
                            </div>
                        </div>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Prix</label>
        <div class="col-sm-10">
            <input type="text" name="prix" class="form-control" value="{{ $formation->prix }}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="file" name="image" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">modiffier</button>
        </div>
    </div>
</form><!-- Fin des éléments généraux du formulaire -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

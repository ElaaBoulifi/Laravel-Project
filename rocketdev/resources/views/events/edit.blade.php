@extends('backoffice.main')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Event</h5>
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
                                    window.location.href = "{{ route('events.list') }}"; // Remplacez par votre route souhaitée
                                }
                            }, 3000);
                        </script>
                    @endif
                  <!-- General Form Elements -->
<form method="POST" action="{{ route('events.updatee', $events) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Titre</label>
        <div class="col-sm-10">
            <input type="text" name="titre" class="form-control" value="{{ $events->titre }}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Lieu</label>
        <div class="col-sm-10">
            <input type="text" name="lieu" class="form-control" value="{{ $events->lieu }}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Desc</label>
        <div class="col-sm-10">
            <input type="text" name="desc" class="form-control" value="{{ $events->desc }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="file" name="image" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Bouton de soumission</label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Soumettre le formulaire</button>
        </div>
    </div>
</form><!-- Fin des éléments généraux du formulaire -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

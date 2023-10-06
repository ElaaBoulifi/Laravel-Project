@extends('share.main')
@section('content')

<style>
    .center-form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #e0e0e0;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }
    
    .form-input {
        margin-bottom: 20px;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        border: none;
        color: white;
        border-radius: 5px;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>
<br></br><br></br>
<br></br>
<br></br>

<div class="center-form">
    <form action="{{ route('candidature.store') }}" method="POST">
        @csrf

        <h4 class="post_job_title text-center">Basic Information</h4>

        <div class="form-input">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required class="form-control">
        </div>

        <div class="form-input">
            <label for="prenom">Prenom:</label>
            <textarea id="prenom" name="prenom" required class="form-control"></textarea>
        </div>

        <div class="form-input">
            <label for="lettre_motivation">Lettre de Motivation:</label>
            <textarea id="lettre_motivation" name="lettre_motivation" required class="form-control"></textarea>
        </div>

        <input type="hidden" name="projet_id" value="{{ $projet_id }}">

      

        <button type="submit">Ajouter</button>
    </form>
</div>

@endsection

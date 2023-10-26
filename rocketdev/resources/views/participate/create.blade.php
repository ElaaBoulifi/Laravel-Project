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
<form action="{{ route('participate.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4 class="post_job_title text-center">Basic Information</h4>

<div class="form-input">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom"  class="form-control">
    @error('nom')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-input">
    <label for="prenom">Prenom:</label>
    <input type="text" id="prenom" name="prenom"  class="form-control">
    @error('prenom')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-input">
    <label for="email">email:</label>
    <input type="email" id="email" name="email"  class="form-control">
    @error('email')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-input">
    <label for="tel">tel:</label>
    <input type="tel" id="tel" name="tel" pattern="^[0-9]+$"   class="form-control">
    @error('tel')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


<input type="hidden" name="event_id" value="{{ $event_id }}">
                                <div class="col-md-12">
                                    <div class="single_form">
                                        <button class="main-btn"  type="submit">Register now </button>
                                    </div> <!-- single form -->
                                </div>
                            </div> <!-- row -->
                        </form>
</div>
@include('events.map')
@endsection

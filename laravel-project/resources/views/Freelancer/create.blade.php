@extends('backoffice.main')
@section('content')


   

 
    <section class="section">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Create Freelancer</h5>
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
            @endif
            <script>
                // Use setTimeout to hide the flash message after 3 seconds (3000 milliseconds)
                setTimeout(function() {
                    var flashMessage = document.getElementById('flash-message');
                    if (flashMessage) {
                        flashMessage.style.display = 'none';
                        window.location.href = "{{ route('Freelancer.list') }}"; // Replace with your desired route
      
                    }
                }, 3000);
            </script>
            <!-- General Form Elements -->
                <form method="post" action="{{route('Freelancer.store')}}">
                    @csrf
                    @method('post')
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                      <input type="text" name="nom" class="form-control">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Prenom</label>
                    <div class="col-sm-10">
                      <input type="text" name="prenom" class="form-control">
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Specialité</label>
                    <div class="col-sm-10">
                      <input type="text" name="specialite" class="form-control">
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Disponibilite</label>
                    <div class="col-sm-10">
                      <input type="text" name="disponibilite" class="form-control">
                    </div>
                  </div>




                
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Submit Button</label>
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Submit Form</button>
                    </div>
                  </div>
  
                </form><!-- End General Form Elements -->
  
              </div>
            </div>
  
          </div>
  
       
        </div>
      </section>
@endsection



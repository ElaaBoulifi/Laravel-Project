@extends('share.main')
@section('content')

<div class="page_banner bg_cover" style="background-image: url(assets/images/page_banner.jpg); height: 500px;" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner_content d-sm-flex align-items-center justify-content-between">
                            <div class="content">
                                <h3 class="page_title">Mes réclamations</h3>
                            </div> <!-- content -->
                        </div> <!-- banner content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- page banner -->
        <section class="profile_area pt-30 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="profile_job_alert mt-50">
                        <h4 class="profile_job_alert_title mb-20">Mes réclamations</h4>

                        <div class="job_alert_content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="name"><p>Sujet</p></th>
                                        <th class="keywords"><p>Description</p></th>
                                        <th class="contract"><p>Date soumission</p></th>
                                        <th class="keywords"><p>Catégorie</p></th>
                                        <th class="keywords"><p>Evaluation</p></th>
                                        <th class="contract"><p>Etat</p></th>
                                        <th class="name"><p>Piece Jointe</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($reclamations as $item)
                                    <tr>

                                        <td class="name">
                                            <div class="job_alert_name">
                                                <h5 class="job_name">{{$item->sujet}}</h5>
                                            </div>
                                        </td>
                                        <td  style="padding: 10px;" class="keywords">
                                            <textarea disabled cols="20" rows="7">{{$item->description}}</textarea> 
                                        </td>
                                        <td class="name">
                                            <p ><i class="fa fa-clock-o"></i> {{$item->date_soumission}}</p>
                                        </td>
                                        <td class="name">
                                            @if ($item->categorie == "PROBLEME_TECHNIQUE")
                                                <p>Problème Technique</p>
                                            @elseif ($item->categorie == "FACTURATION")
                                                <p>Facturation</p>
                                            @else 
                                                <p>Service Client</p>
                                            
                                            @endif                            
                                        </td>
                                        <td class="name">
                                            @if ($item->evaluation == 1)
                                                <p>Basse</p>
                                            @elseif ($item->evaluation == 2)
                                                <p>Moyenne</p>
                                            @elseif ($item->evaluation == 3)
                                                <p>Haute évaluation</p>
                                            @else
                                                <p>Évaluation très haute</p>
                                            @endif                            
                                        </td>
                                        <td class="contract">
                                          @if ($item->etat === 'traité')
                                              <p class="time time_color-2">{{ $item->etat }}</p>
                                          @elseif ($item->etat === 'en cours de traitement')
                                              <p class="time time_color-1">{{ $item->etat }}</p>
                                          @else
                                              <p>{{ $item->etat }}</p>
                                          @endif
                                        </td>
                                        <td  style="padding: 10px;">
                                        <img src="{{ asset('uploads/' . $item->piece_jointe) }}" alt="Image de la pièce jointe">
                                        </td>
                                        <td>
                                            @if ($item->etat === 'traité')
                                                @if ($item->reponse) <!-- Vérifiez si la réclamation a une réponse -->

                                                    <a href="{{ route('reponses.showFront', ['reponse' => $item->reponse->id]) }}" class="btn btn-primary">Réponse</a>
                                                @endif
                                            @endif
                                        </td>
                                        <td  style="padding: 10px;">
                                            <form method="POST" action="{{ route('reclamations.destroy', $item->id) }}">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger"
                                                @if ($item->etat === 'en cours de traitement') disabled @endif>
                                                  <i class="bi bi-trash"></i> 
                                              </button>
                                          </form>
                                      </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- single job alert -->

                    </div> <!-- profile resume -->
                </div>
            </div> 

    </div>
</br></br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>

    <div class="footer_copyright">
            <div class="container">
                <div class="copyright_content text-center d-sm-flex justify-content-between align-items-center">
                    <a href="#" class="logo"><img src="assets/images/logo.png" alt="Logo"></a>
                    <p class="copyright">JobMate © 2024 All Right Reserved</p>
                </div> <!-- copyright content -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
@endsection
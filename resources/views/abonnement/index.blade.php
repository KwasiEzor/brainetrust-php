@extends('layouts.app')
@section('content')
<div class="container-xl py-5">
    <div class="container">
        <div class="row mb-4">
            <h2 class="page-title">Abonnement</h2>
        </div>
        <div class="card row border-0 p-3 shadow-sm">
            <div class="col-lg-8 col-md-auto mx-auto ">
                <figure class="figure d-flex justify-content-center align-items-center">
                    <img src="{{asset('images/man-thumbs-up.png')}}" style="max-width: 80%; width:100%;" alt="Man thumbs up" class="figure-img img-fluid abonnement-img">
                </figure>
            </div>
            <div class="container " style="margin-top: -3rem;">
                <div class="row abonnement-group py-4 g-4">
                    {{-- pricing item start --}}
                    <div class="col-lg-4 col-md-6 col-sm-auto pricing-box">
                        <div class="card pricing-item text-center h-100">
                            <div class="card-header border-0 ">
                                <h4 class="py-3">Plan Débutant</h4>
                            </div>
                            <h1 class="card-title py-3"> <span class="badge bg-warning text-shadow">0€</span> <span class="text-muted fs-5">/an</span> </h1>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item border-0">
                                        <p class="text-center"> <span class="text-success"><i class="bi bi-check-circle-fill"></i></span> Inscription</p>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <p class="text-center"> <span class="text-success"><i class="bi bi-check-circle-fill"></i></span> Entraînement /semaine</p>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <p class="text-center text-decoration-line-through"> <span class="text-danger"><i class="bi bi-check-circle-fill"></i></span> Revue <span>Le Scrabbleur</span></p>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <p class="text-center text-decoration-line-through"> <span class="text-danger"><i class="bi bi-check-circle-fill"></i></span> Affiliation à la Fédération</p>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <p class="text-center text-decoration-line-through"> <span class="text-danger"><i class="bi bi-check-circle-fill"></i></span> Participation aux compétitions</p>
                                    </li>
                                </ul>
                            </div>
                            <div class=" card-footer call-to-action d-grid">
                                <a href="{{route('register')}}" class="btn btn-lg btn-primary">Je m'abonne</a>
                            </div>
                        </div>
                    </div>
                    {{-- pricing item end --}}
                    {{-- pricing item start --}}
                    <div class="col-lg-4 col-md-6 col-sm-auto pricing-box">
                        <div class="card pricing-item text-center h-100">
                            <div class="card-header border-0 ">
                                <h4 class="py-3">Plan Amateur</h4>
                            </div>
                            <h1 class="card-title py-3"> <span class="badge bg-warning text-shadow">45€</span> <span class="text-muted fs-5">/an</span> </h1>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item border-0">
                                        <p class="text-center"> <span class="text-success"><i class="bi bi-check-circle-fill"></i></span> Inscription</p>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <p class="text-center"> <span class="text-success"><i class="bi bi-check-circle-fill"></i></span> Entraînement /semaine</p>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <p class="text-center"> <span class="text-success"><i class="bi bi-check-circle-fill"></i></span> Revue <span>Le Scrabbleur</span></p>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <p class="text-center text-decoration-line-through"> <span class="text-danger"><i class="bi bi-check-circle-fill"></i></span> Affiliation à la Fédération</p>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <p class="text-center text-decoration-line-through"> <span class="text-danger"><i class="bi bi-check-circle-fill"></i></span> Participation aux compétitions</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer call-to-action d-grid">
                                <a href="{{route('abonnement.amateur')}}" class="btn btn-lg btn-primary">Je m'abonne</a>
                            </div>
                        </div>
                    </div>
                    {{-- pricing item end --}}
                    {{-- pricing item start --}}
                    <div class="col-lg-4 col-md-6 col-sm-auto pricing-box">
                        <div class="card pricing-item text-center h-100">
                            <div class="card-header border-0 ">
                                <h4 class="py-3">Plan Confirmé</h4>
                            </div>
                            <h1 class="card-title py-3"> <span class="badge bg-warning text-shadow">68€</span> <span class="text-muted fs-5">/an</span> </h1>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item border-0">
                                        <p class="text-center"> <span class="text-success"><i class="bi bi-check-circle-fill"></i></span> Inscription</p>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <p class="text-center"> <span class="text-success"><i class="bi bi-check-circle-fill"></i></span> Entraînement /semaine</p>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <p class="text-center"> <span class="text-success"><i class="bi bi-check-circle-fill"></i></span> Revue <span>Le Scrabbleur</span></p>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <p class="text-center"> <span class="text-success"><i class="bi bi-check-circle-fill"></i></span> Affiliation à la Fédération</p>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <p class="text-center"> <span class="text-success"><i class="bi bi-check-circle-fill"></i></span> Participation aux compétitions</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer call-to-action d-grid">
                                <a href="{{route('abonnement.confirmed-payment')}}" class="btn btn-lg btn-primary">Je m'abonne</a>
                            </div>
                        </div>
                    </div>
                    {{-- pricing item end --}}
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
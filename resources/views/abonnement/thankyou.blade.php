@extends('layouts.app')
@section('content')

<div class="container-xl py-5">
    <div class="container">
        <div class="row mb-4">
            <h2 class="text-center ">
                <a href="{{ route('abonnement.index') }}" class="page-title ">
                    Abonnement
                </a>
            </h2>
        </div>
        <div class="card row border-0 px-3 py-5 shadow-sm" style="min-height: 100vh;">
            <div class="col-lg-8 col-md-auto mx-auto  text-center rounded-1 pt-4" >
                <div class="row" id="amateur-lady-box"  style="background-color: #1D59FC; color:#fff; border-radius:1rem;">
                    <div class="col-lg-5 col-md-6 col-sm-auto">
                        <figure class="figure d-flex justify-content-center align-items-center" style="margin-bottom: -1rem;">
                            <img src="{{asset('images/lady-thumbs-up.png')}}" style="max-width: 80%; width:15rem;" alt="Man thumbs up" class="figure-img img-fluid abonnement-img">
                        </figure>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-auto d-flex justify-content-lg-start justify-content-center align-items-center">

                        <div class="py-4">
                            <h3 class="text-warning">Confirmation votre Abonnement</h3>
                            <p class="text-light text-shadow">Membre du club</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container ">
                <div class="row abonnement-group py-4 g-4">
                    <div class="col-lg-6 col-md-auto mx-auto">
                        <div class="card p-3">
                           <h5 class="card-title text-center fw-normal py-3">Détails</h5>
                           <div class="card-body">
                                <div class="alert alert-success">
                                    Merci cher membre . Votre abonnement a été bien enregistré !!!
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
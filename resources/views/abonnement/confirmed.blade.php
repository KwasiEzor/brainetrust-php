@extends('layouts.app')
@section('content')

<div class="container-xl py-5">
    <div class="container">
        <div class="row mb-4">
            <h2 class="text-center ">
                <a href="{{ route('abonnement.confirmed-payment') }}" class="page-title ">
                    Plan confirmé
                </a>
            </h2>
        </div>
        @if (session('message'))
            <div class="alert alert-danger alert-dismissible">
                {{ session('message') }}
            </div>
        @endif
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
                            <h3 class="text-warning">Finalisez votre Abonnement</h3>
                            <p class="text-light text-shadow">Encore une dernière étape</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container ">
                <div class="row abonnement-group py-4 g-4">
                    <div class="col-lg-6 col-md-auto mx-auto">
                        <div class="card p-3">
                           <h5 class="card-title text-center fw-normal py-3">Veuillez compléter le formulaire</h5>
                           <div class="card-body">
                            <form action="{{route('abonnement.confirmed-payment')}}" method="post" id="stripe-payment-form">
                                @csrf
                                <div class="error">
                                    <span id="stripe-errors"></span>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label mb-3 text-primary">Nom et prénoms</label>
                                    <input type="text" id="name"  class="form-control mb-3 card-holder-name" value="{{auth()->user()->name}}">
                                </div>
                                <input type="hidden" name="payment_method" id="payment_method" >
                                <input type="hidden" name="confirmed" id="confirmed" value="confirmed">
                                <div id="card-element"></div>
                                <div class="form-group d-grid mt-3">
                                    <button type="submit" id="payment-btn" class="btn btn-primary">Payer mon Abonnement</button>
                                </div>
                            </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @section('stripe-payment-js')
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            const stripe = Stripe("{{env('STRIPE_KEY')}}");
            const elements = stripe.elements();
            
            const cardElement = elements.create('card',{
                classes:{
                    base:'StripeElement bg-light mb-3 d-block px-2 py-4 rounded-2 border-secondary'
                }
                
            });
            cardElement.mount('#card-element');
            const cardHolderName = document.querySelector('.card-holder-name');
            const cardBtn = document.getElementById('payment-btn')

            cardBtn.addEventListener('click', async(e)=>{
                e.preventDefault();
                const { paymentMethod , error } = await stripe.createPaymentMethod('card',cardElement,{
                    billing_details : {name : cardHolderName.value}
                });
                console.log('payment method:',paymentMethod)
                if(error){
                    const errorMessageBox = document.getElementById('stripe-errors')
                    // errorMessageBox.classList.add('alert alert-danger');
                    console.log(error.exception_message);
                }else{
                    // errorMessageBox.innerHTML = " ";
                    console.log(paymentMethod.id)
                    document.getElementById('payment_method').value = paymentMethod.id;
                }
                document.getElementById('stripe-payment-form').submit();

            });
        </script>
    @endsection
@endsection
@extends('layouts.app')
@section('content')
    <div class="container-xl py-2">
       
            <div class="card mt-5 mb-3 border-0 shadow-sm py-5" style="">
              <div class="row">
                <div class="card-header border-0 bg-white ">
                  <h2 class="page__title text-center ">
                      <a href="{{ route('contact-page') }}" class="page-title ">
                          Nous contacter
                      </a>
                  </h2>
              </div>
              </div>
                <div class="row g-0 mt-4">
                 
                  <div class="col-md-6 mx-auto">
                    <div class="card-body">
                        @if(Session::has('success'))

                        <div class="alert alert-success alert-dismissible fade show " role="alert">

                            {{ Session::get('success') }}

                            @php

                                Session::forget('success');

                            @endphp

                        </div>

                        @endif

                      
                      <div class="form-box">
                          <form action="{{ route('send-email') }}" method="POST" class="contact-form" id="contactForm">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingText" name="name" placeholder="Enter your name">
                                <label for="floatingText">Nom et prénoms</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com">
                                <label for="floatingEmail">Adresse Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingText" name="subject" placeholder="Subject">
                                <label for="floatingText">Sujet</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" style="min-height: 10rem;resize:none;" cols="30" rows="10" placeholder="Leave message here" id="floatingTextarea" name="message"></textarea>
                                <label for="floatingTextarea">Message</label>
                              </div>
                            <div class="form-group mt-4 d-grid">
                                <button type="submit" class="btn btn-lg d-block btn-primary" >Envoyer message <i class="bi bi-send-fill"></i></button>
                            </div>
                          </form>
                      </div>
                     
                    </div>
                  </div>
                </div>
            </div>
       
    </div>
@endsection
<footer class="footer  text-white mt-4">
    <div class="container py-4">
        <div class="row gy-4 gx-5">
            <div class="col-lg-4 col-md-6">
                <h6 class="h1 ">
                    <img src="{{asset('images/logo-braine.svg')}}" alt="logo" style="width: 10rem;">
                </h6>
                <p class="small ">Le Braine Trust est affilié à la Fédération belge de scrabble sous le numéro 50 depuis 1980.Les amicales ainsi que les interclubs ont lieu le mercredi soir à 20h00 .</p>
              
            </div>
            <div class="col-lg-2 col-md-6">
                <h6 class=" mb-3">Conditions Générales</h6>
                <ul class="list-unstyled ">
                    <li><a href="#" class="">Utilisation des données</a></li>
                    <li><a href="#" class="">Vie privée</a></li>
                    <li><a href="#" class="">DMCA</a></li>
                    <li><a href="#" class="">DISCLAIMER</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6">
                <h6 class=" mb-3">Liens rapides</h6>
                <ul class="list-unstyled ">
                    <li><a href="{{route('home-page')}}" class="">Accueil</a></li>
                    <li><a href="{{route('about-page')}}" class="">About</a></li>
                    <li><a href="{{route('agendas.index')}}" class="">Agendas</a></li>
                    <li><a href="{{route('contact-page')}}" class="">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6">
                <h6 class=" mb-3">Newsletter</h6>
                <p class="small ">Inscrivez-vous pour être au parfum des dernières nouvelles.</p>
                <form action="#">
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" placeholder="nom@exemple.site" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-warning" id="button-addon2" type="button"><i class="bi bi-send-fill"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <p class="small  mb-0 text-center">&copy; Copyrights. Tous droits réservés. <a class="text-warning" href="/">Brainetrust</a></p>
    </div>
</footer>
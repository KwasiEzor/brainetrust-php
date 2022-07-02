<button class="btn btn-outline-warning" 
    id="widget-btn" 
    type="button" 
    data-bs-toggle="offcanvas"
    data-bs-target="#offcanvasRight"
    aria-controls="offcanvasRight">

    <i class="bi bi-dice-6-fill"></i> 
    
    <i class="bi bi-hand-index-fill"></i>
</button>

<div class="offcanvas offcanvas-end overflow-y-scroll" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title btn btn btn-primary text-uppercase" id="offcanvasRightLabel">Applications</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <h5>Sites de jeu en ligne</h5>
    <hr class="divider w-75">
    <ul class="list-group d-flex align-items-center justify-content-center">
      <li class="list-group-item border-0">
        <h6 class="text-primary">
          Internet Scrabble Club
        </h6>
        <a href="https://www.isc.ro/index_fr.php" target="_blank">
          <img src="{{asset('images/logo-isc.png')}}" style="max-width: 8rem; width:100%;" alt="image">
        </a>
      </li>
      <li class="list-group-item border-0">
        <h6 class="text-primary">
          Scrabble Pro
        </h6>
        <a href="https://www.scrabblepro.com/" target="_blank">
          <img src="{{asset('images/scrabblepro-logo.png')}}" style="max-width: 8rem; width:100%;" alt="image">
        </a>
      </li>
      <li class="list-group-item border-0">
        <h6 class="text-primary">
          Anafolie
        </h6>
        <a href="https://www.anafolie.net/anafolie.php" target="_blank">
          <img src="{{asset('images/logo_anafolie.gif')}}" style="max-width: 8rem; width:100%;" alt="image">
        </a>
      </li>
    </ul>
    <h5 class="mt-4">Appli & logiciels à télécharger</h5>
    <hr class="divider w-75">
    <ul class="list-group d-flex align-items-center justify-content-center">
      <li class="list-group-item border-0">
        <h6 class="text-primary">
          Scrabble Go
        </h6>
        <a href="https://play.google.com/store/apps/details?id=com.pieyel.scrabble&hl=fr&gl=US" target="_blank">
          <img src="{{asset('images/jeu-scrabble-go.jpg')}}" style="max-width: 8rem; width:100%;" alt="image">
        </a>
      </li>
      <li class="list-group-item border-0">
        <h6 class="text-primary">
          Classic Words
        </h6>
        <a href="https://play.google.com/store/search?q=classic%20word&c=apps&hl=en&gl=US" target="_blank">
          <img src="{{asset('images/jeu-classic-words-logo.png')}}" style="max-width: 8rem; width:100%;" alt="image">
        </a>
      </li>
      <li class="list-group-item border-0">
        <h6 class="text-primary">
          Lettres7 Duplicate
        </h6>
        <a href="https://play.google.com/store/apps/details?id=elo13579.lettres7duplicate&hl=en&gl=US" target="_blank">
          <img src="{{asset('images/lettres7-duplicate.png')}}" style="max-width: 8rem; width:100%;" alt="image">
        </a>
      </li>
    </ul>
  </div>
</div>
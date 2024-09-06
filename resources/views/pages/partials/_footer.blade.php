<!-- Rodapé -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('theme/images/hp-logo.png') }}" alt="Hotel Presidente">
            </div>
            <div class="col-md-3">
              @if($empresa->endereco != NULL)
                <span>{{ $empresa->endereco }}</span>
              @endif
              @if($empresa->cep != NULL)
                <span>CEP: {{ $empresa->cep }}</span>
              @endif
              @if($empresa->cidade != NULL)
                <span>{{ $empresa->cidade }} - {{ $empresa->estado }}</span>
              @endif
              @if($empresa->pais != NULL)
                <span>{{ $empresa->pais }}</span>
              @endif
            </div>
            <div class="col-md-3">
              @if($empresa->telefone != NULL)
                <span>Tel: {{ $empresa->telefone }}</span>
              @endif
              @if($empresa->telefone2 != NULL)
                <span>Tel: {{ $empresa->telefone2 }}</span>
              @endif
              @if($empresa->email != NULL)
                <span>E-mail: {{ $empresa->email }}</span>
              @endif
            </div>
            <div class="col-md-3">
              @if($empresa->tripadvisor != NULL)
                <a href="{{ $empresa->tripadvisor }}" target="_blank" class="redesocial">
                    <img src="{{ asset('theme/images/tripadvisor.png') }}" alt="tripadvisor">
                </a>
              @endif
              @if($empresa->facebook != NULL)
                <a href="{{ $empresa->facebook }}" target="_blank" class="redesocial">
                    <img src="{{ asset('theme/images/booking.png') }}" alt="booking">
                </a>
              @endif
              @if($empresa->instagram != NULL)
                <a href="{{ $empresa->instagram }}" target="_blank" class="redesocial">
                    <img src="{{ asset('theme/images/instagram.png') }}" alt="instagram">
                </a>
              @endif
              @if($empresa->whatsapp != NULL)
                <a href="{{ $empresa->whatsapp }}" target="_blank" class="redesocial">
                    <img src="{{ asset('theme/images/whatsapp.png') }}" alt="whatsapp">
                </a>
              @endif
            </div>
        </div>
    </div>
</footer>
<div class="copy">
    <div class="container">
        Copyright © <strong>Hotel Presidente</strong> – 2019 <br> Todos os Direitos Reservados.
        <a href="https://www.likepublicidade.com/" class="like"><img src="{{ asset('theme/images/like.png') }}" alt="like"></a>
    </div>
</div>

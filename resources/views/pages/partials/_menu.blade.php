<!-- Menu de Navegação -->
<nav>
    <div class="container">
        <div class="menu-icon">
            <div class="menu-line"></div>
            <div class="menu-line"></div>
            <div class="menu-line"></div>
        </div>
        <div class="fl-lf">
            <!-- <a href="#sobre">Nossa História</a> -->
            <a href="#sobre" onclick="ga(‘send’, ‘event’, { eventCategory: ‘Nossa História', eventAction: ‘Click’ })">Nossa História</a>

            <a href="#quartos" onclick="ga(‘send’, ‘event’, { eventCategory: ‘Apartamentos', eventAction: ‘Click’ })">Apartamentos</a>
            <!-- <a href="#quartos">Apartamentos</a> -->
        </div>
        <div class="fl-rg">
            <!-- <a href="#galeria">Galeria</a> -->
            <a href="#galeria" onclick="ga(‘send’, ‘event’, { eventCategory: ‘Galeria', eventAction: ‘Click’ })">Galeria</a>
            <a href="#localizacao" onclick="ga(‘send’, ‘event’, { eventCategory: ‘Como Chegar', eventAction: ‘Click’ })">Como Chegar</a>
            <!-- <a href="#localizacao">Como Chegar</a> -->
        </div>
        <img class="logo" src="{{ asset('theme/images/hp-logo-neutro.png') }}" alt="Hotel Presidente">
        <img class="logo-flutuar" src="{{ asset('theme/images/hp-logo.png') }}" alt="Hotel Presidente">
        <ul>
            <li>
              <!-- <a href="#sobre">Nossa História</a> -->
              <a href="#sobre" onclick="ga(‘send’, ‘event’, { eventCategory: ‘Nossa História', eventAction: ‘Click’ })">Nossa História</a>
            </li>
            <li>
              <a href="#quartos" onclick="ga(‘send’, ‘event’, { eventCategory: ‘Apartamentos', eventAction: ‘Click’ })">Apartamentos</a>
                <!-- <a href="#quartos">Apartamentos</a> -->
            </li>
            <li>
              <!-- <a href="#galeria">Galeria</a> -->
              <a href="#galeria" onclick="ga(‘send’, ‘event’, { eventCategory: ‘Galeria', eventAction: ‘Click’ })">Galeria</a>
            </li>
            <li>
              <a href="#localizacao" onclick="ga(‘send’, ‘event’, { eventCategory: ‘Como Chegar', eventAction: ‘Click’ })">Como Chegar</a>
                <!-- <a href="#localizacao">Como Chegar</a> -->
            </li>
        </ul>
    </div>
</nav>

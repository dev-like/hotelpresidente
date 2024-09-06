@extends('pages.base')

@section('metatags')
    <meta name="description" content="{{$empresa->descricao}}">
    <meta name="keywords" content="{{$empresa->palavraschave}}">
    <meta property="og:title" content="{{$empresa->nomefantasia}}">
    <meta property="og:description" content="{{$empresa->descricao}}">
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('theme/css/lib/picker.default.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/lib/picker.default.date.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/components/NaturalLanguageForm/css/component.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/components/ModalWindowEffects/css/component.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/css/lib/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/lib/slick-theme.css') }}">
    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('theme/css/home.css') }}">
@endsection

@section('jslibrary')
    <script src="{{ asset('theme/js/lib/showFadeUp.js') }}" charset="utf-8"></script>

    <script src="{{ asset('theme/js/lib/picker.js') }}" charset="utf-8"></script>
    <script src="{{ asset('theme/js/lib/picker.date.js') }}" charset="utf-8"></script>
    <script src="{{ asset('theme/js/lib/legacy.js') }}" charset="utf-8"></script>
    <script src="{{ asset('theme/js/lib/pt_BR.js') }}" charset="utf-8"></script>

    <script src="{{ asset('theme/components/ModalWindowEffects/js/modernizr.custom.js') }}" charset="utf-8"></script>
    <script src="{{ asset('theme/components/NaturalLanguageForm/js/nlform.js') }}" charset="utf-8"></script>

    <script src="{{ asset('theme/js/lib/slick.js') }}" charset="utf-8"></script>

    <script src="{{ asset('theme/js/lib/isotope.pkgd.min.js') }}" charset="utf-8"></script>
@endsection

@section('body')

    @include('pages.partials._menu')

    <!-- Seção de Reserva -->
    <section class="reserva">
        <!-- Formulário de Inscrição -->
        <div class="container">
            <h1> RESERVE O SEU CONFORTO</h1>
            <div class="reservar">
                <div class="check-in">
                    <label for="">
                        Check-In
                    </label>
                    <input type="text" id="checkin" name="checkin" readonly value="Selec. Data">
                </div>
                <div class="check-out">
                    <label for="">
                        Check-Out
                    </label>
                    <input type="text" id="checkout" name="checkout" readonly value="Selec. Data">
                </div>
                <div class="hospedes nl-form" id="hospedes">
                    <label for="">
                        Hóspedes
                        <br>
                        <select id="adultos">
                            <option value="1" selected>1 Adulto</option>
                            <option value="2">2 Adultos</option>
                            <option value="3">3 Adultos</option>
                            <option value="4">4 Adultos</option>
                            <option value="5">5 Adultos</option>
                            <option value="6">6 Adultos</option>
                            <option value="7">7 Adultos</option>
                            <option value="8">8 Adultos</option>
                            <option value="9">9 Adultos</option>
                            <option value="10">10 Adultos</option>
                        </select><span class="virgula">,</span>
                        <select id="criancas">
                            <option value="0" selected>0 Criança</option>
                            <option value="1">1 Criança</option>
                            <option value="2">2 Crianças</option>
                            <option value="3">3 Crianças</option>
                            <option value="4">4 Crianças</option>
                            <option value="5">5 Crianças</option>
                            <option value="6">6 Crianças</option>
                            <option value="7">7 Crianças</option>
                            <option value="8">8 Crianças</option>
                            <option value="9">9 Crianças</option>
                            <option value="10">10 Crianças</option>
                        </select>
                        <div class="nl-overlay"></div>
                    </label>
                </div>
                <button class="btn-prosseguir md-trigger" data-modal="modal-reservar-principal">Reservar</button>
            </div>
            <div class="md-modal md-effect-9" id="modal-reservar-principal">
                <div class="md-content">
                    <h3>Finalizando Reserva</h3>
                    <div>
                        <form action="/postMail" method="post">
                          {{ csrf_field() }}
                            <div class="row">
                                <div class="group-check">
                                    Check-in:
                                    <strong>Selec. Data</strong>
                                    <input type="hidden" name="checkin">
                                </div>
                                <div class="group-check">
                                    Check-out:
                                    <strong>Selec. Data</strong>
                                    <input type="hidden" name="checkout">
                                </div>
                                <div class="group">
                                    Hospedes:
                                    <strong>1 Adulto, 0 Criança</strong>
                                    <input type="hidden" name="hospedes" value="1 Adulto, 0 Criança">
                                </div>
                                <div class="group">
                                    <label for="quantquartos">Quant. Quartos:</label>
                                    <input type="number" id="quantquartos" name="quantquartos" value="1" min="1" max="10" required>
                                </div>
                                <div class="group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" id="nome" name="nome" placeholder="Informe seu nome" required>
                                </div>
                                <div class="group">
                                    <label for="email">E-mail:</label>
                                    <input type="email" id="email" name="email" placeholder="Informe seu e-mail" required>
                                </div>
                                <div class="group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="tel" id="telefone" name="telefone" placeholder="ex. (99) 98877-6655" required>
                                </div>
                            </div>
                            <div class="group-button">
                                <button type="submit" class="btn-reservar">Reservar</button>
                                <button type="button" class="btn-reservar md-close">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="md-overlay"></div>
        </div>
        <!-- <center>
            <a href="https://www.likepublicidade.com/" class="like"><img src="{{ asset('theme/images/like.png') }}" alt="like"></a>
        </center> -->
        <div class="features">
            <div class="container">
                <div class="row">
                    <div class="col-4 col-lg-2">
                        <img src="{{ asset('theme/images/wifi.png') }}" alt="wi-Fi">
                        <span>Wi-fi Grátis</span>
                    </div>
                    <div class="col-4 col-lg-2">
                        <img src="{{ asset('theme/images/estacionamento.png') }}" alt="estacionamento privativo">
                        <span>Estacionamento Privativo</span>
                    </div>
                    <div class="col-4 col-lg-2">
                        <img src="{{ asset('theme/images/otimoatendimento.png') }}" alt="otimo atendimento">
                        <span>Ótimo Atendimento</span>
                    </div>
                    <div class="col-4 col-lg-2">
                        <img src="{{ asset('theme/images/cafe.png') }}" alt="café da manhã">
                        <span>Café Incluso</span>
                    </div>
                    <div class="col-4 col-lg-2">
                        <img src="{{ asset('theme/images/monitoramento.png') }}" alt="monitoramento">
                        <span>Segurança 24h</span>
                    </div>
                    <div class="col-4 col-lg-2">
                        <img src="{{ asset('theme/images/localizacao.png') }}" alt="localizacao">
                        <span>Melhor Localização</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Promoções -->
    @foreach($quartospromo as $quartopromo)
    <div class="md-modal md-effect-9" id="modal-reservar-promocao-{{$quartopromo->id}}">
        <div class="md-content">
            <h3>{{$quartopromo->nome}}</h3>
            <div>
                <form action="/postMail2" method="post">
                  {{ csrf_field() }}
                    <input type="hidden" name="quarto" value="{{$quartopromo->id}}">
                    <input type="hidden" name="quartonome" value="{{$quartopromo->nome}}">
                    <div class="row">
                        <div class="group">
                            Valor:
                            <strong>R$ {{$quartopromo->valor}}</strong>
                            <input type="hidden" name="valor" value="{{$quartopromo->valor}}">
                        </div>
                        <div class="group">
                            <label>Nome:</label>
                            <input type="text"  name="nome" placeholder="Informe seu nome" required>
                        </div>
                        <div class="group">
                            <label>Data de Check-In:</label>
                            <input type="date" name="checkin" required>
                        </div>
                        <div class="group">
                            <label>Data de Check-Out:</label>
                            <input type="date" name="checkout" required>
                        </div>
                        <div class="group">
                            <label>E-mail:</label>
                            <input type="email"  name="email" placeholder="Informe seu e-mail" required>
                        </div>
                        <div class="group">
                            <label>Telefone:</label>
                            <input type="tel"  name="telefone" placeholder="ex. (99) 98877-6655" required>
                        </div>
                    </div>
                    <div class="group-button">
                        <button type="submit" class="btn-reservar">Reservar</button>
                        <button type="button" class="btn-reservar md-close">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <div class="md-overlay"></div>

    @if(count($quartospromo) >= 1)
    <section class="promocoes">
        <div class="container">
            <div class="promocoes-carousel">

              @foreach($quartospromo as $quartopromo)
                <div class="item">
                    <div class="image-quarto-promo" style="background-image:url({{ asset('uploads/quartos/'.$quartopromo->imagem) }})"></div>
                    <h3>{{$quartopromo->nome}}</h3>
                    <ul>
                      @foreach($infoquarto->where('quarto_id',$quartopromo->id)->take(3) as $info)
                        <li>{{$info->descricao}}</li>
                      @endforeach
                    </ul>
                    <div class="preco">
                        <strong>R$ {{$quartopromo->valor}}</strong>
                    </div>
                    <div style="clear:both"></div>
                    <a href="#" class="btn-reservar md-trigger" data-modal="modal-reservar-promocao-{{$quartopromo->id}}">Reservar</a>
                </div>
              @endforeach

            </div>
            <div style="clear:both"></div>
        </div>
    </section>
    @endif

    <!-- Seção de Quartos -->
    @foreach($quartos as $quarto)
    <div class="md-modal md-effect-9" id="modal-reservar-quarto-{{$quarto->id}}">
        <div class="md-content">
            <h3>{{$quarto->nome}}</h3>
            <div>
                <form action="/postMail3" method="post">
                  {{ csrf_field() }}
                    <input type="hidden" name="quarto" value="{{$quarto->id}}">
                    <input type="hidden" name="quartonome" value="{{$quarto->nome}}">
                    <div class="row">
                        <div class="group">
                            Valor:
                            <strong>R$ {{$quarto->valor}}</strong>
                            <input type="hidden" name="valor" value="{{$quarto->valor}}">
                        </div>
                        <div class="group">
                            <label>Nome:</label>
                            <input type="text"  name="nome" placeholder="Informe seu nome" required>
                        </div>
                        <div class="group">
                            <label>Data de Check-In:</label>
                            <input type="date" name="checkin" required>
                        </div>
                        <div class="group">
                            <label>Data de Check-Out:</label>
                            <input type="date" name="checkout" required>
                        </div>
                        <div class="group">
                            <label>E-mail:</label>
                            <input type="email"  name="email" placeholder="Informe seu e-mail" required>
                        </div>
                        <div class="group">
                            <label>Telefone:</label>
                            <input type="tel"  name="telefone" placeholder="ex. (99) 98877-6655" required>
                        </div>
                    </div>
                    <div class="group-button">
                        <button type="submit" class="btn-reservar">Reservar</button>
                        <button type="button" class="btn-reservar md-close">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <div class="md-overlay"></div>
    @if(count($quartos) >= 1)
    <section class="quartos" id="quartos">
        <div class="quartos-carousel">
            @foreach($quartos as $quarto)
            <div class="container-fluid item">
                <div class="row">
                    <div class="col-md-6 image-quarto" style="background-image:url({{ asset('uploads/quartos/'.$quarto->imagem) }})"></div>
                    <div class="col-md-6 info"
                        style="background-image:
                        url({{ asset('theme/images/bg-quartos.png') }}),
                        url({{ asset('uploads/quartos/'.$quarto->imagem) }})">
                        <h2>{{$quarto->nome}}</h2>
                        <p>
                            {{$quarto->descricao}}
                        </p>
                        <ul>
                            @foreach($infoquarto->where('quarto_id',$quarto->id) as $info)
                            <li>{{$info->descricao}}</li>
                            @endforeach
                        </ul>
                        <div class="preco">
                            Preços a partir de:
                            <strong>R$ {{$quarto->valor}}</strong>
                        </div>
                        <a href="#" class="btn-reservar md-trigger" data-modal="modal-reservar-quarto-{{$quarto->id}}">Reservar</a>
                        <div style="clear:both"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Seção da Nossa História -->
    @if($empresa->nossahistoria != NULL)
    <section class="sobre" id="sobre">
        <div class="container">
            <div class="row">
                <div class="col-md-6 textos">
                    <img src="{{ asset('theme/images/tradicao.png') }}" alt="Tradição desde 1960" class="tradicao">
                    <p>
                      {!! nl2br(e($empresa->nossahistoria)) !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Seção de Galeria -->
    <section class="galeria" id="galeria">
        <div class="container">
            <h2>&nbsp;G A L E R I A</h2>
            <div class="grid">
                <div class="grid-sizer"></div>
                <div style="background-image:url('uploads/galeria/{{$galeria->quadrado}}')"
                    class="grid-item grid-item--width2 grid-item--height2">
                </div>
                <div style="background-image:url('uploads/galeria/{{$galeria->vertical}}')"
                    class="grid-item grid-item--height2">
                </div>
                <div style="background-image:url('uploads/galeria/{{$galeria->horizontal}}')"
                    class="grid-item grid-item--width3">
                </div>
                <div style="background-image:url('uploads/galeria/{{$galeria->vertical1}}')"
                    class="grid-item grid-item--height2">
                </div>
                <div style="background-image:url('uploads/galeria/{{$galeria->horizontal1}}')"
                    class="grid-item grid-item--width3">
                </div>
                <div style="background-image:url('uploads/galeria/{{$galeria->quadrado1}}')"
                    class="grid-item grid-item--width2 grid-item--height2 especial">
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Auditório -->
    @if($auditorio != NULL)
    <div class="md-modal md-effect-9" id="modal-reservar-auditorio">
        <div class="md-content">
            <h3>Reservar Auditório</h3>
            <div>
                <form action="/postMail4" method="post">
                  {{ csrf_field() }}
                    <div class="row">
                        <div class="group">
                            <label>Nome:</label>
                            <input type="text"  name="nome" placeholder="Informe seu nome" required>
                        </div>
                        <div class="group">
                            <label>Data de Reserva:</label>
                            <input type="date" name="data" required>
                        </div>
                        <div class="group">
                            <label>E-mail:</label>
                            <input type="email"  name="email" placeholder="Informe seu e-mail" required>
                        </div>
                        <div class="group">
                            <label>Telefone:</label>
                            <input type="tel"  name="telefone" placeholder="ex. (99) 98877-6655" required>
                        </div>
                    </div>
                    <div class="group-button">
                        <button type="submit" class="btn-reservar">Reservar</button>
                        <button type="button" class="btn-reservar md-close">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="md-overlay"></div>

    <section class="auditorio">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xl-9 col-lg-11">
                    <div class="box-image-auditorio">
                        <h2>AUDITÓRIO</h2>
                        <div class="image-audiorio" style="background-image:url('{{ asset('uploads/auditorio/'.$auditorio->imagem) }}')"></div>
                    </div>
                    <div class="box-info-auditorio">
                        <h3>{{$auditorio->titulo}}</h3>
                        <p>
                          {{$auditorio->texto}}
                        </p>
                        <a href="#" class="btn-reservar md-trigger" data-modal="modal-reservar-auditorio">Reservar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Seção de Contato -->
    <div class="md-modal md-effect-9" id="modal-escrever-mensagem">
        <div class="md-content">
            <h3>Enviar Mensagem</h3>
            <div>
                <form action="/postMail5" method="post">
                  {{ csrf_field() }}
                    <div class="row">
                        <div class="group">
                            <label>Nome:</label>
                            <input type="text"  name="nome" placeholder="Informe seu nome" required>
                        </div>
                        <div class="group">
                            <label>E-mail:</label>
                            <input type="email"  name="email" placeholder="Informe seu e-mail" required>
                        </div>
                        <div class="group-full">
                            <label>Mensagem:</label>
                            <textarea name="mensagem" rows="3" placeholder="Informe a sua mensagem"></textarea>
                        </div>
                    </div>
                    <div class="group-button">
                        <button type="submit" class="btn-reservar">Enviar</button>
                        <button type="button" class="btn-reservar md-close">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="md-overlay"></div>

    <section class="contato">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xl-9 col-lg-11">
                    <form>
                        <h2>Deixe-nos uma <span>Mensagem</span></h2>
                        <p>
                            Passou pelo nosso hotel? Diga-nos o que achou. Ou se
                            tem algum dúvida fique a vontade para nos perguntar.
                        </p>
                        <a href="#" class="btn-reservar md-trigger" data-modal="modal-escrever-mensagem">Escrever Mensagem</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Localização -->
    <section class="localizacao" id="localizacao">
        <img src="{{ asset('theme/images/titulo-localizacao.png') }}" alt="A Melhor Localização da Cidade" class="localizacao">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1985.6204631372887!2d-47.488554678215976!3d-5.5312351807262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x92c55effef9a9b4b%3A0x86c38041e656441f!2sHotel+Presidente!5e0!3m2!1spt-BR!2sbr!4v1552083715680" width="100%" height="480" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>

    @include('pages.partials._footer')

@endsection

@section('script')
    <script src="{{ asset('theme/js/main.js') }}" charset="utf-8"></script>
    <script src="{{ asset('theme/components/ModalWindowEffects/js/classie.js') }}" charset="utf-8"></script>
    <script src="{{ asset('theme/components/ModalWindowEffects/js/modalEffects.js') }}" charset="utf-8"></script>
    <script src="{{ asset('template/plugins/sweet-alert/sweetalert2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/global.js') }}"></script>
    <script src="{{ asset('theme/js/config-map.js') }}"></script>
    <script type="text/javascript">
      jQuery(document).ready(function () {
        jQuery('nav a').click(function(){
          var match = jQuery(this).attr('href').match(/#\S+/);
          ga('send', 'pageview', location.pathname + match[0]);
        });
      });
    </script>
    <script>
      var msg = '{{Session::get('alert')}}';
      var exist = '{{Session::has('alert')}}';
      if (exist){
        swal(
            {
                title: 'Reserva efetuada, em breve entraremos em contato!',
                type: 'success',
                confirmButtonColor: '#4fa7f3'
            }
        )
      }
    </script>
    <script>
      var msg = '{{Session::get('alert2')}}';
      var exist = '{{Session::has('alert2')}}';
      if (exist){
        swal(
            {
                title: 'Mensagem enviada com sucesso !',
                type: 'success',
                confirmButtonColor: '#4fa7f3'
            }
        )
      }
    </script>
@endsection

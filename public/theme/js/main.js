var dataconfig = {
    min: true,
    clear:'',
    format: 'dd mmm, yyyy'
}

$(document).ready(function(){
    setTimeout(function(){
        $('.loader').fadeOut('fast');
    },2000);

    // Selecionador de Datas de Check
    $checkin  = $('#checkin').pickadate(dataconfig);
    $checkout = $('#checkout').pickadate(dataconfig);

    checkin  = $checkin.pickadate('picker');
    checkout = $checkout.pickadate('picker');

    checkin.on('close', function(){

        if(checkout.get('select') != null && checkin.get('select').obj > checkout.get('select').obj){
            checkout.clear();
            $('#checkout').val('Selec. Data');
        }

        if(checkin.get('select') != null)
        {
            checkout.set('min', [
                checkin.get('select').year,
                checkin.get('select').month,
                checkin.get('select').date
            ]);
        }
    });

    $('#checkin').change(function(){
        $('#modal-reservar-principal form strong').eq(0).text($(this).val());
        $('#modal-reservar-principal form input[name=checkin]').val($(this).val());
    });

    $('#checkout').change(function(){
        $('#modal-reservar-principal form strong').eq(1).text($(this).val());
        $('#modal-reservar-principal form input[name=checkout]').val($(this).val());
    });

    // Selecionador de Hóspedes
    var nlform = new NLForm( document.getElementById( 'hospedes' ) );

    // Funcionalidades do Menu
    $(window).scroll(function()
    {
        if($(this).scrollTop() > 42)
            $('nav').addClass('flutuar');
        else
            $('nav').removeClass('flutuar');
    });

    $('.menu-icon').click(function(){
        $(this).toggleClass('active');
        $('nav ul').slideToggle(200);
        $('nav .redessociais').slideToggle(200);
    });

    $("nav a").click(function (event)
	{
		event.preventDefault();
        $('.menu-icon').removeClass('active');
        $('nav ul').slideUp('fast');
		var deslocamento = $($(this).attr("href")).offset().top-112;
		$('html, body').animate({ scrollTop: deslocamento }, 700);
	});

    $("nav img").click(function (event)
	{
		event.preventDefault();
        $('.menu-icon').removeClass('active');
        $('nav ul').slideUp('fast');
		$('html, body').animate({ scrollTop: 0 }, 700);
	});

    // Rolagem de Promoções
    $('.promocoes-carousel').slick({
        arrows: false,
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        responsive: [
            {
                breakpoint: 992,
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: 768,
                settings: { slidesToShow: 1, infinite: true }
            }
        ],
    });

    // Rolagem de Quartos
    if($('.quartos-carousel .item').length > 1)
        $('.quartos-carousel').slick({
            arrows: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            speed: 500,
            fade: true,
            cssEase: 'linear'
        });

    // Remover click dos botões de reserva
    $("a.btn-reservar").click(function(event){
        event.preventDefault();
    });

    // Grid de Galeria
    $('.grid').isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
            columnWidth: '.grid-sizer'
        }
    });
});

@extends('admin.main')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-caminho')
Empresa
@endsection

@section('page-title')
Cadastro
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
      @if(!isset($empresa->id))
        <p id="req-cad">
          As informações da empresa ainda não foram cadastradas,
          <a id="cad" class="text-success" href="#"> Cadastre agora.</a>
        </p>
        <div id="form-cad" class="col-sm-12 col-xs-12" style="display:none">
          {{ Form::open(['route' => 'empresa.store']) }}
      @else
          <div id="form-cad" class="col-sm-12 col-xs-12">
          {{ Form::model($empresa, ['route' => ['empresa.update', $empresa->id], 'method' => 'PUT']) }}
      @endif

      <div class="row">
        <div class="form-group col-md-5">
            {{ Form::label('nomefantasia', 'Nome Fantasia') }}
            {{ Form::text('nomefantasia', null, array('class' => 'form-control', 'autofocus','maxlength' => '150', 'required')) }}
        </div>
        <div class="form-group col-md-2">
            {{ Form::label('telefone', 'Telefone') }}
            {{ Form::text('telefone', null, array('class' => 'form-control','maxlength' => '30','placeholder' => '(99) 9999-9999')) }}
        </div>
        <div class="form-group col-md-2">
            {{ Form::label('telefone2', 'Telefone 2') }}
            {{ Form::text('telefone2', null, array('class' => 'form-control','maxlength' => '30','placeholder' => '(99) 9999-9999')) }}
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, array('class' => 'form-control','maxlength' => '35')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-9">
            {{ Form::label('endereco', 'Endereço') }}
            {{ Form::text('endereco', null, array('class' => 'form-control','maxlength' => '500')) }}
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('cep', 'CEP') }}
            {{ Form::text('cep', null, array('class' => 'form-control','maxlength' => '15')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
            {{ Form::label('cidade', 'Cidade') }}
            {{ Form::text('cidade', null, array('class' => 'form-control','maxlength' => '250')) }}
        </div>
        <div class="col-md-3">
            {{ Form::label('estado', 'Estado') }}
            <br>
            <select class="js-example-basic-single" name="estado">
                <option value="Acre">Acre</option>
                <option value="Alagoas">Alagoas</option>
                <option value="Amapá">Amapá</option>
                <option value="Amazonas">Amazonas</option>
                <option value="Bahia">Bahia</option>
                <option value="Ceará">Ceará</option>
                <option value="Distrito Federal">Distrito Federal</option>
                <option value="Espírito Santo">Espírito Santo</option>
                <option value="Goiás">Goiás</option>
                <option selected value="MA">Maranhão</option>
                <option value="Mato Grosso">Mato Grosso</option>
                <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                <option value="Minas Gerais">Minas Gerais</option>
                <option value="Pará">Pará</option>
                <option value="Paraíba">Paraíba</option>
                <option value="Paraná">Paraná</option>
                <option value="Pernambuco">Pernambuco</option>
                <option value="Piauí">Piauí</option>
                <option value="Rio de Janeiro">Rio de Janeiro</option>
                <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                <option value="Rondônia">Rondônia</option>
                <option value="Roraima">Roraima</option>
                <option value="Santa Catarina">Santa Catarina</option>
                <option value="São Paulo">São Paulo</option>
                <option value="Sergipe">Sergipe</option>
                <option value="Tocantins">Tocantins</option>
          </select>
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('pais', 'Pais') }}
            {{ Form::text('pais', null, array('class' => 'form-control','maxlength' => '250')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-3">
            {{ Form::label('instagram', 'Instagram') }}
            {{ Form::url('instagram', null, array('class' => 'form-control','maxlength' => '250')) }}
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('whatsapp', 'WhatsApp') }}
            {{ Form::url('whatsapp', null, array('class' => 'form-control','maxlength' => '250')) }}
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('tripadvisor', 'TripAdvisor') }}
            {{ Form::url('tripadvisor', null, array('class' => 'form-control','maxlength' => '250')) }}
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('facebook', 'Booking') }}
            {{ Form::url('facebook', null, array('class' => 'form-control','maxlength' => '250')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          {{ Form::label('nossahistoria', 'Nossa História') }}
          {{ Form::textarea('nossahistoria', null, array('class' => 'form-control','maxlength' => '1250')) }}
        </div>
      </div>
      <div class="row web">
        <div class="form-group col-md-6">
          {{ Form::label('descricao', 'Descrição') }}
          {{ Form::text('descricao', null, array('class' => 'form-control','maxlength' => '500')) }}
        </div>
        <div class="form-group col-md-6">
          {{ Form::label('palavraschave', 'Palavras Chave') }}
          {{ Form::text('palavraschave', null, array('class' => 'form-control','maxlength' => '500','data-role' => 'tagsinput')) }}
        </div>
      </div>
    </div>

      <div class="row" style="margin-top: 20px">
        <div class="col-12">
          <div class="text-center">
            <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Atualizar</button>
            <a href="{{ route('empresa.index') }}" class="btn btn-danger"><i class="dripicons-cross"></i> Cancelar</a>
          </div>
        </div>
      </div>
  </div>
</div>

{{ Form::close() }}
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('template/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/js/autosize.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('template/plugins/tinymce/tinymce.min.js') }}"></script>
<script>
jQuery(function($){
  $("#telefone").mask("(99) 9999-9999");
  $('.js-example-basic-single').select2();
  $("#cep").mask("99999-999");

  autosize(document.querySelectorAll('textarea'));
});
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $("#cad").click(function(event){
      event.preventDefault();
      $("#req-cad").slideUp();
      $("#form-cad").slideDown();
    });
});
</script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea#conteudos",
    height:350,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

    tinymce.init(editor_config);
  </script>

@endsection

@extends('admin.main')

@section('page-caminho')
Galeria
@endsection

@section('page-title')
Cadastar Mídia
@endsection

@section('styles')
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/css/dropzone.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    @if(!isset($galeria->id))
      <p id="req-cad">
        As fotos da galeria ainda não foram cadastradas,
        <a id="cad" class="text-success" href="#"> Cadastre agora.</a>
      </p>
      <div id="form-cad" class="col-sm-12 col-xs-12" style="display:none">
        {{ Form::open(['route' => 'galeria.store','files' => true]) }}
    @else
        <div id="form-cad" class="col-sm-12 col-xs-12">
        {{ Form::model($galeria, ['route' => ['galeria.update', $galeria->id], 'method' => 'PUT','files' => true]) }}
    @endif

    <div class="row">
      <div class="form-group col-md-6">
        {{ Form::label('horizontal','Imagem Horizontal') }}
        <input type="file" name="horizontal" id="file-horizontal" class="filestyle" data-placeholder="{{$galeria->horizontal}}" data-btnClass="btn-light">
      </div>
      <div class="form-group col-md-6">
        {{ Form::label('horizontal1','Imagem Horizontal') }}
        <input type="file" name="horizontal1" id="file-horizontal1" class="filestyle" data-placeholder="{{$galeria->horizontal1}}" data-btnClass="btn-light">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        @if(!isset($galeria->horizontal))
          <img src="{{URL::asset('/template/images/img-1.jpg')}}" id="horizontal" width="320px" class="horizontal"/>
        @else
          <img src="{{ asset('uploads/galeria/'. $galeria->horizontal) }}" id="horizontal" width="320px" class="horizontal"/>
        @endif
      </div>
      <div class="form-group col-md-6">
        @if(!isset($galeria->horizontal1))
          <img src="{{URL::asset('/template/images/img-1.jpg')}}" id="horizontal1" width="320px" class="horizontal"/>
        @else
          <img src="{{ asset('uploads/galeria/'. $galeria->horizontal1) }}" id="horizontal" width="320px" class="horizontal"/>
        @endif
      </div>
    </div>
<hr>
    <div class="row">
      <div class="form-group col-md-6">
        {{ Form::label('vertical','Imagem Vertical') }}
        <input type="file" name="vertical" id="file-vertical" class="filestyle" data-placeholder="{{$galeria->vertical}}" data-btnClass="btn-light">
      </div>
      <div class="form-group col-md-6">
        {{ Form::label('vertical1','Imagem Vertical') }}
        <input type="file" name="vertical1" id="file-vertical1" class="filestyle" data-placeholder="{{$galeria->vertical1}}" data-btnClass="btn-light">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        @if(!isset($galeria->vertical))
          <img src="{{URL::asset('/template/images/img-1.jpg')}}" id="vertical" width="320px" class="vertical"/>
        @else
          <img src="{{ asset('uploads/galeria/'. $galeria->vertical) }}" id="vertical" width="320px" class="vertical"/>
        @endif
      </div>
      <div class="form-group col-md-6">
        @if(!isset($galeria->vertical1))
          <img src="{{URL::asset('/template/images/img-1.jpg')}}" id="vertical1" width="320px" class="vertical"/>
        @else
          <img src="{{ asset('uploads/galeria/'. $galeria->vertical1) }}" id="vertical" width="320px" class="vertical"/>
        @endif
      </div>
    </div>
<hr>
    <div class="row">
      <div class="form-group col-md-6">
        {{ Form::label('quadrado','Imagem Quadrada') }}
        <input type="file" name="quadrado" id="file-quadrado" class="filestyle" data-placeholder="{{$galeria->quadrado}}" data-btnClass="btn-light">
      </div>
      <div class="form-group col-md-6">
        {{ Form::label('quadrado1','Imagem Quadrada') }}
        <input type="file" name="quadrado1" id="file-quadrado1" class="filestyle" data-placeholder="{{$galeria->quadrado1}}" data-btnClass="btn-light">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        @if(!isset($galeria->quadrado))
          <img src="{{URL::asset('/template/images/img-1.jpg')}}" id="quadrado" width="320px" class="quadrado"/>
        @else
          <img src="{{ asset('uploads/galeria/'. $galeria->quadrado) }}" id="quadrado" width="320px" class="quadrado"/>
        @endif
      </div>
      <div class="form-group col-md-6">
        @if(!isset($galeria->quadrado1))
          <img src="{{URL::asset('/template/images/img-1.jpg')}}" id="quadrado1" width="320px" class="quadrado"/>
        @else
          <img src="{{ asset('uploads/galeria/'. $galeria->quadrado1) }}" id="quadrado" width="320px" class="quadrado"/>
        @endif
      </div>
    </div>
<hr>
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
@endsection

@section('scripts')
<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.min.js') }}"></script>
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>

<script>
$(function(){
  $('#file-horizontal').change(function(){
    const file = $(this)[0].files[0]
    const fileReader = new FileReader()
    fileReader.onloadend = function(){
      $('#horizontal').attr('src',fileReader.result)
    }
    fileReader.readAsDataURL(file)
  })
})
$(function(){
  $('#file-horizontal1').change(function(){
    const file = $(this)[0].files[0]
    const fileReader = new FileReader()
    fileReader.onloadend = function(){
      $('#horizontal1').attr('src',fileReader.result)
    }
    fileReader.readAsDataURL(file)
  })
})
$(function(){
  $('#file-vertical').change(function(){
    const file = $(this)[0].files[0]
    const fileReader = new FileReader()
    fileReader.onloadend = function(){
      $('#vertical').attr('src',fileReader.result)
    }
    fileReader.readAsDataURL(file)
  })
})
$(function(){
  $('#file-vertical1').change(function(){
    const file = $(this)[0].files[0]
    const fileReader = new FileReader()
    fileReader.onloadend = function(){
      $('#vertical1').attr('src',fileReader.result)
    }
    fileReader.readAsDataURL(file)
  })
})
$(function(){
  $('#file-quadrado').change(function(){
    const file = $(this)[0].files[0]
    const fileReader = new FileReader()
    fileReader.onloadend = function(){
      $('#quadrado').attr('src',fileReader.result)
    }
    fileReader.readAsDataURL(file)
  })
})
$(function(){
  $('#file-quadrado1').change(function(){
    const file = $(this)[0].files[0]
    const fileReader = new FileReader()
    fileReader.onloadend = function(){
      $('#quadrado1').attr('src',fileReader.result)
    }
    fileReader.readAsDataURL(file)
  })
})
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
@endsection

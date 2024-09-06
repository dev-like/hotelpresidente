  @extends('admin.main')

@section('page-title')
Editar Produto
@endsection

@section('page-caminho')
Produtos
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    {{ Form::model($quartos, ['route' => ['quartos.update', $quartos->id], 'method' => 'PUT', 'files' => true]) }}

    {{--MODAL INSERE --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <img src="{{ asset('uploads/quartos/'. $quartos->imagem) }}" style="width: 100%">
                  </div>
                </div>
            </div>
        </div>
    </div>
          <div class="row">
            <div class="form-group col-md-6">
              {{ Form::label('nome', 'Nome') }}
              {{ Form::text('nome', null, array('class' => 'form-control', 'autofocus','maxlength' => '50')) }}
            </div>
            <div class="form-group col-md-4">
              {{ Form::label('imagem', 'Imagem Quarto') }}
              <input type="file" name="imagem" class="filestyle" data-placeholder="{{ $quartos->imagem }}" data-btnClass="btn-light">
            </div>
            <div class="form-group col-md-2">
              {{ Form::label('capa', 'Imagem Cadastrada') }}
              <button type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#modal-default">Abrir imagem</button>
            </div>
          </div><div class="row">
            <div class="form-group col-md-4">
              {{ Form::label('valor', 'Valor') }}
              {{ Form::text('valor', null, array('class' => 'form-control', 'autofocus','maxlength' => '20')) }}
            </div>
            <div class="form-group col-md-4">
              {{ Form::label('lotacao', 'Lotação') }}
              {{ Form::number('lotacao', null, array('class' => 'form-control', 'autofocus','maxlength' => '20')) }}
            </div>
            <div class="form-group col-md-4">
              {{ Form::label('promocao', 'Promoção') }}
            </br>
              {{Form::hidden('promocao',0)}}
              <input type="checkbox" name="promocao" class="js-switch form-control" value="1" {{($quartos->promocao)?'checked':''}}>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              {{ Form::label('descricao', 'Descrição') }}
              {{ Form::textarea('descricao', null, array('class' => 'form-control', 'autofocus','maxlength' => '1500')) }}
            </div>
          </div>


          <div class="row" style="margin-top: 20px">
            <div class="form-group col-12">
              <div class="text-center">
                <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Atualizar</button>
                <a href="{{ route('quartos.index') }}" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
              </div>
            </div>
          </div>
    {{ Form::close() }}
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/switchery/switchery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('template/js/autosize.js') }}" type="text/javascript"></script>

<script>

var elem = document.querySelector('.js-switch');
var switchery = new Switchery(elem,{ color: '#ff5d48'});

jQuery(function($){
  $('.js-example-basic-single').select2();
  $('#valor').mask('000.000.000.000.000,00', {reverse: true});
});
autosize(document.querySelectorAll('textarea'));
</script>
@endsection

@extends('admin.main')

@section('page-title')
Quartos Cadastradas
@endsection

@section('page-caminho')
Quartos
@endsection

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('template/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('template/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('template/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script-bottom')
  <link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="col-12">
  <div class="card-box table-responsive">

    {{--MODAL INSERE --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cadastrar Quarto</h4>
                </div>
              {{ Form::open(['route' => 'quartos.store', 'files' => true]) }}
                {{ csrf_field() }}
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-md-7">
                          {{ Form::label('nome', 'Nome') }}
                          {{ Form::text('nome', null, array('class' => 'form-control', 'autofocus','maxlength' => '50','required')) }}
                        </div>
                        <div class="form-group col-md-5">
                          {{ Form::label('imagem', 'Imagem Quarto') }}
                          <input type="file" name="imagem" class="filestyle" data-placeholder="Enviar imagem" data-btnClass="btn-light" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-4">
                          {{ Form::label('valor', 'Valor') }}
                          {{ Form::text('valor', null, array('class' => 'form-control', 'autofocus','maxlength' => '20','required')) }}
                        </div>
                        <div class="form-group col-md-4">
                          {{ Form::label('lotacao', 'Lotação') }}
                          {{ Form::number('lotacao', null, array('class' => 'form-control', 'autofocus','maxlength' => '20','required','min=1')) }}
                        </div>
                        <div class="form-group col-md-4" style="margin-top: 22px">
                          {{ Form::label('promocao', 'Promoção') }}
                          {{Form::hidden('promocao',0)}}
                          <input type="checkbox" class="js-switch form-control" data-color="#ff5d48" name="promocao" value="1">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          {{ Form::label('descricao', 'Descrição') }}
                          {{ Form::textarea('descricao', null, array('class' => 'form-control', 'autofocus','maxlength' => '1500','required')) }}
                        </div>
                      </div>
                  </div>
                <div class="modal-footer">
                  <div class="row" style="margin-top: 20px">
                    <div class="col-12">
                      <div class="text-center">
                        <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Salvar</button>
                        <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close m-r-5"></i> Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
              {{ Form::close() }}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Ações</th>
        </tr>
        </thead>
        <tbody>
          @foreach($quartos as $quarto)
            <tr>
                <td>{{ $quarto->nome }}</td>
                <td>{{ substr(strip_tags($quarto->descricao), 0, 50) }}{{ (strlen(strip_tags($quarto->descricao)) > 50 ? "..." : "") }} </td>
                <td width="16%">
                  <span class="hint--top" aria-label="Editar Quarto"><a href="{{ route('quartos.edit', $quarto->id) }}" style="border-radius: 50%" class="btn btn-warning waves-effect"> <i class="fa fa-pencil m-r-5"></i></a></span>
                  <span class="hint--top" aria-label="Informação Quarto"><a href="{{ route('infoquarto.index', $quarto->id) }}" style="border-radius: 50%" class="btn btn-success waves-effect"> <i class="fa fa-file-text-o"></i></a></span>
                  <span class="hint--top" aria-label="Deletar Quarto"><button type="button" onclick="goswet({{$quarto->id}}, '{{$quarto->nome}}')" style="border-radius: 50%" class="btn btn-danger waves-effect"> <i class="fa fa-trash m-r-5"></i></button></span>
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/switchery/switchery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/js/autosize.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/js/jquery.mask.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>

<script>

jQuery(function($){
  $('#valor').mask('000.000.000.000.000,00', {reverse: true});
});

var elem = document.querySelector('.js-switch');
var switchery = new Switchery(elem,{ color: '#ff5d48'});

autosize(document.querySelectorAll('textarea'));

</script>
<script>
$(document).ready( function () {
    $('datatable').DataTable();
  var table = $('#datatable').DataTable({
      "dom": "<'row'<'col-sm-12 col-md-10'f> <'col-sm-12 col-md-2'B> >" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
             lengthChange: false,
              "language": {
                "emptyTable": "Nennhum item cadastrado !",
                "info": "Listando _END_ de _MAX_ registros",
                "infoEmpty":      "",
                "lengthMenu":     "Mostrar _MENU_ Registros",
                "search":         "Pesquisa:",
                "zeroRecords":    "Nenhum registro encontrado.",
                "processing":     "Processando...",
                "loadingRecords": "Carregado...",
                "infoFiltered":   "(filtrado de _MAX_ registros)",
                "paginate": {
               "first":      "Primeiro",
               "last":       "Último",
               "next":       "Próximo",
               "previous":   "Anterior"
             }
           },
        "order": [[ 0, "asc" ]],
        buttons: {
          buttons:[
             {
            text: "Adicionar",
            action: function ( e, dt, button, config ) {
              //dt.ajax.reload();
              $('#modal-default').modal('show')
            },
            className: "btn btn-dark waves-effect waves-light pull-right"
          }]
        }
    });
} );


  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  function goswet(id, nome){
    swal.setDefaults({
      reverseButtons: true
    })
    swal({
        title: "Deseja excluir "+nome+"?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Deletar"
    }).then(
      function(){
        $.ajax({
          type: "DELETE",
          url: "{{ url('admin/quartos') }}/"+id,
          data: {'id': id},
          success: function(data){
            swal({
             title: "Quarto deletado !",
             type: "success",
             timer: 2000,
             showConfirmButton: false
           }).then(
             function () {
             },
             function(){
               window.location = "{{ route('quartos.index') }}";
             }
           );
          },
          error: function(xhr,status, data) {
            swal("Não foi possível deletar item");
          }

        });
      }
    );
  }
</script>
@endsection

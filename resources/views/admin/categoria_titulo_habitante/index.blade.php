@extends('layouts._includes.admin.body')
@section('titulo','Listar Categoria Titulo Habitantes')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">

          <div class="card shadow">
            <div class="card-body">
              <div class="toolbar">
                <form class="form">
                  <div class="form-row">
                    <div class="form-group col-auto mr-auto">
                      <label class="my-1 mr-2 sr-only" for="inlineFormCustomSelectPref1">Show</label>
                      <select class="custom-select mr-sm-2" id="inlineFormCustomSelectPref1">
                        <option value="">...</option>
                        <option value="1">12</option>
                        <option value="2" selected>32</option>
                        <option value="3">64</option>
                        <option value="3">128</option>
                      </select>
                    </div>
                    <div class="form-group col-auto">
                      <label for="search" class="sr-only">Search</label>
                      <input type="text" class="form-control" id="search1" value="" placeholder="Search">
                    </div>

                    <div class="col-auto">

                        {{-- @can('user-create') --}}
                            <a href="#" class="btn botao" data-toggle="modal" data-target="#ModalCreate" style="color:white">
                                <span style="color:white"></span> {{ __('Adicionar') }}
                            </a>
                        {{-- @endcan --}}
                    </div>
                  </div>
                </form>
              </div>
              <!-- table -->
              <table class="table table-borderless table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>Opções</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categoria_titulo_habitantes as $categoria_titulo_habitante)
                        <tr>
                            <td>{{$categoria_titulo_habitante->id}}</td>
                            <td>{{{$categoria_titulo_habitante->vc_nome}}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEdit{{$categoria_titulo_habitante->id}}">{{ __('Editar') }}</a>
                                        {{-- <a class="dropdown-item" href="{{route('admin.categoria_titulo_habitante.edit',['id'=>$categoria_titulo_habitante->id])}}">Editar</a> --}}
                                        <a class="dropdown-item" href="{{route('admin.categoria_titulo_habitante.destroy',['id'=>$categoria_titulo_habitante->id])}}">Remover</a>
                                        <a class="dropdown-item" href="{{route('admin.categoria_titulo_habitante.purge',['id'=>$categoria_titulo_habitante->id])}}">Purgar</a>
                                    </div>
                                    </div>

                            </td>
                        </tr>
                    {{-- ModalUpdate --}}
                    <div class="modal fade text-left" id="ModalEdit{{$categoria_titulo_habitante->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{ __('Editar Categoria') }}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @include('admin.categoria_titulo_habitante.edit.index')
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- ModalUpdate --}}
                    
                    @endforeach
                </tbody>
              </table>
              <nav aria-label="Table Paging" class="mb-0 text-muted">
                <ul class="pagination justify-content-center mb-0">
                  <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div> <!-- customized table -->
      </div> <!-- end section -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div> <!-- .container-fluid -->



{{-- ModalCreate --}}

        <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Adicionar Categoria') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('admin.categoria_titulo_habitante.create.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{-- ModalCreate --}}


<script>
    $(document).ready(function() {
    $('#ModalCreate').on('show.bs.modal', function (event) {
        $.get('/categoria_titulo_habitante/create', function(response) {
            $('#ModalCreate .modal-body').html(response);
        });
    });
});

</script>



@if (session('categoria_titulo_habitante.destroy.success'))
    <script>
        Swal.fire(
            'Categoria Titulo Habitante Eliminada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('categoria_titulo_habitante.destroy.error'))
    <script>
        Swal.fire(
            'Erro ao Eliminar Categoria Titulo Habitante!',
            '',
            'error'
        )
    </script>
@endif
@if (session('categoria_titulo_habitante.purge.success'))
    <script>
        Swal.fire(
            'Categoria Titulo Habitante Purgada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('categoria_titulo_habitante.purge.error'))
    <script>
        Swal.fire(
            'Erro ao Purgar Categoria Titulo Habitante!',
            '',
            'error'
        )
    </script>
@endif
@endsection

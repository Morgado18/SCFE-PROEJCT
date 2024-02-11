{{-- @extends('layouts._includes.admin.body')
@section('titulo','Actualizar Operador')

@section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Actualizar tarefa Titulo Habitante</strong>
        </div> --}}      
        <form action="{{ route('admin.tarefa.update', ['id' => $tarefa->id]) }}
" method="post"> 
            @csrf
            <div class="card-body">
                @include('_form.tarefa.index') 
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>

@if (session('categoria_titulo_habitante.update.success'))
    <script>
        Swal.fire(
            'Categoria Actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('categoria_titulo_habitante.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Categoria!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}

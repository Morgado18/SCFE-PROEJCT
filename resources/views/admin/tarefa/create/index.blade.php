{{-- @extends('layouts._includes.admin.body') --}}
{{-- @section('titulo','Cadastrar tarefa') --}}

{{-- @section('conteudo') --}}
    <div class="card shadow mb-4">
        
        <form action="{{route('admin.tarefa.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.tarefa.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
        
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if (session('tarefa'))
    <script>
        Swal.fire(
            'Tarefa',
            '{{ session("tarefa") }}',
            'success'
        ){
            button:true,
            button:'ok',
            timer:4000
        }
    </script>
@endif

@if (session('categoria_titulo_habitante.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Categoria Titulo Habitante!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}

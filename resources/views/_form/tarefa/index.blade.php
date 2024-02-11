<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" 
                value="{{ isset($tarefa) ? $tarefa->nome : old('nome') }}">
        </div>
    </div> 
</div>



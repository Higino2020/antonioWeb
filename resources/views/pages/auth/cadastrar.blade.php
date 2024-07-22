<div class="modal fade" id="Cadastrar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Utilizador</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('auth.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nome Completo</label>
                            <div class="input-form">
                                <input type="text" name="nome" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Província</label>
                            <div class="input-form">
                                <input type="text" name="provincia" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Município</label>
                            <div class="input-form">
                                <input type="text" name="municipio" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Bairro</label>
                            <div class="input-form">
                                <input type="text" name="bairro" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Telefone</label>
                            <div class="input-form">
                                <input type="text" name="telefone" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <div class="input-form">
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Senha</label>
                            <div class="input-form">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        
    });
</script>
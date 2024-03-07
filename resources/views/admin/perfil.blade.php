@extends('layouts.base')
@section('patrimonio')
<div class="main-content" style="height: 100vh">
    <div class="section">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Perfil do Usuario</h4>
                  <div class="card-header-form">
                    <a  title="Cadastrar novo usuario"><i data-feather="plus-circle"></i></a>
                  </div>
                </div>
                @if(session('Error'))
                    <div class="alert alert-danger">
                        <p>{{session('Error')}}</p>
                    </div>
                @endif
                @if(session('Sucesso'))
                    <div class="alert alert-success">
                        <p>{{session('Sucesso')}}</p>
                    </div>
                @endif
                <div class="card-body p-0">
                    <div class="dados">
                        <div class="foto">
                            <img src="{{asset('assets/img/logotipo.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="informar">
                            <div class="lista">
                                <h4>{{Auth::user()->name}}</h4>
                            </div>
                            <div class="lista">
                                <h4>{{Auth::user()->email}}</h4>
                            </div>
                            <div class="lista">
                                <h4>{{Auth::user()->tipo}}</h4>
                            </div>
                            <a href="#Cadastro" class="btn btn-primary" data-toggle="modal">Editar Perfil</a>
                            <a  href="#Senha" class="btn btn-info" data-toggle="modal">Alterar a Senha</a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
{{-- Formulairo de cadastro de usuario --}}
<!-- Modal trigger button -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="Cadastro" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="CadastroTitulo" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CadastroTitulo">Actualizar os dados</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"> <i data-feather="x-circle"></i> </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.actualizar')}}" method="post">
                  @csrf
                  <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>Nome do Usuario</label>
                        <div class="input-group">
                          <input type="text" required class="form-control phone-number" value="{{Auth::user()->name}}" name="name" id="name">
                        </div>
                      </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                          <input type="email" value="{{Auth::user()->email}}" required class="form-control phone-number" id="data_entrega" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-success"><i data-feather="save"></i>  Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Senha" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="CadastroTitulo" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CadastroTitulo">Alterar a senha</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"> <i data-feather="x-circle"></i> </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.senha')}}" method="post">
                  @csrf
                  <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>Senha actual</label>
                        <div class="input-group">
                          <input type="password" required class="form-control phone-number" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nova senha</label>
                        <div class="input-group">
                          <input type="password" required class="form-control phone-number"  name="password_nova">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Confirmar a nova senha do Usuario</label>
                        <div class="input-group">
                          <input type="password" required class="form-control phone-number"  name="password_confirm">
                        </div>
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-success"><i data-feather="save"></i>  Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
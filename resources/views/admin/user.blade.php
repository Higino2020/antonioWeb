@extends('layouts.admin')
@section('antonio')
    <div class="main-content">
        <div class="section">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Usuario</h4>
                      <div class="card-header-form">
                        <a href="#Cadastro" data-toggle="modal" title="Cadastrar novo usuario"><i data-feather="plus-circle"></i></a>
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
                      <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Tipo</th>
                                <th></th>
                              </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1
                            @endphp
                            @foreach ($user as $use)
                                <tr>
                                    <td class="p-0 text-center">
                                        {{$i++}}
                                    </td>
                                    <td>{{$use->name}}</td>
                                    <td>
                                        {{$use->email}}
                                    </td>
                                    <td>
                                        {{$use->tipo}}
                                    </td>
                                    <td>
                                        <a href="#Cadastro" data-toggle="modal" onclick="editar({{$use}})" class="text-info"><i data-feather="edit"></i></a>
                                        {{-- @if(Auth::user()->tipo =="Admin") --}}
                                        <a href="{{route('user.apagar',$use)}}" class="text-danger"><i data-feather="trash"></i></a>
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                         
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <script>
        function editar(valor) {
            document.getElementById('id').value = valor.id;
            document.getElementById('name').value = valor.name;
            document.getElementById('email').value = valor.email;
        }
        function limpar(valor) {
            document.getElementById('id').value = "";
            document.getElementById('name').value = "";
            document.getElementById('email').value = "";
        }
    </script>
    {{-- Formulairo de cadastro de usuario --}}
    <!-- Modal trigger button -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="Cadastro" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="CadastroTitulo" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CadastroTitulo">Cadastro de Usuario</h5>
                        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"> <i data-feather="x-circle"></i> </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.store')}}" method="post">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label>Nome do Usuario</label>
                            <div class="input-group">
                              <input type="text" class="form-control phone-number" name="name" id="name">
                            </div>
                          </div>
                        <div class="form-group">
                            <label>E-mail do Usuario</label>
                            <div class="input-group">
                              <input type="email" class="form-control phone-number" name="email" id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"> <i data-feather="save"></i> Cadastrar</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
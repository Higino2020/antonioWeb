@extends('layouts.admin')
@section('antonio')
    <div class="main-content">
        <div class="section">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Categoria</h4>
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
                                <th>Titulo</th>
                                <th>Descrição</th>
                                <th></th>
                              </tr>
                        </thead>
                        <tbody>
                        @php
                                $i = 1
                            @endphp
                            @foreach (App\Models\Categoria::orderBy('nome','ASC')->get() as $item)
                                <tr>
                                    <td class="p-0 text-center">
                                        {{$i++}}
                                    </td>
                                    <td>{{$item->nome}}</td>
                                    <td>
                                        {{$item->descricao}}
                                    </td>
                                    <td>
                                        <a href="#Cadastro" data-toggle="modal" onclick="editar({{$item}})" class="text-info"><i data-feather="edit"></i></a>
                                        {{-- @if(Auth::user()->tipo =="Admin") --}}
                                        <a href="{{route('categoria.show',$item)}}" class="text-danger"><i data-feather="trash"></i></a>
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
            document.getElementById('nome').value = valor.nome;
            document.getElementById('descricao').value = valor.descricao;
        }
        function limpar(valor) {
            document.getElementById('id').value = "";
            document.getElementById('nome').value = "";
            document.getElementById('descricao').value = "";
        }
    </script>
    {{-- Formulairo de cadastro de usuario --}}
    <!-- Modal trigger button -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="Cadastro" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="CadastroTitulo" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CadastroTitulo">Cadastro de Categoria</h5>
                        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"> <i data-feather="x-circle"></i> </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('categoria.store')}}" method="post">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label>Titulo da Categoria</label>
                            <div class="input-group">
                              <input type="text" class="form-control phone-number" name="nome" id="nome">
                            </div>
                          </div>
                        <div class="form-group">
                            <label>Descrição da Categoria</label>
                            <div class="input-group">
                              <textarea name="descricao" style="resize: none" class="form-control" id="descricao" cols="30" rows="10"></textarea>
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
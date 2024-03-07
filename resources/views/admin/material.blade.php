@extends('layouts.admin')
@section('patrimonio')
    <div class="main-content">
        <div class="section">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Produtos</h4>
                      
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
                                <th>Nome do Produto</th>
                                <th>Codigo de referencia</th>
                                <th>Perecivel</th>
                                <th>Quantidade</th>
                                <th>Categorias</th>
                                <th></th>
                              </tr>
                        </thead>
                        <tbody>
                        @php
                                $i = 1
                            @endphp
                            @foreach (App\Models\Produto::orderBy('nome','ASC')->get() as $item)
                                <tr>
                                    <td class="p-0 text-center">
                                        {{$i++}}
                                    </td>
                                    <td>{{$item->nome}}</td>
                                    <td class="align-middle">
                                        {{$item->codigo}}
                                    </td>
                                    <td class="align-middle">
                                        {{$item->perecivel}}
                                    </td>
                                    <td>
                                        {{$item->qtd}}
                                    </td>
                                    <td>
                                        {{$item->categoria->titulo}}
                                    </td>
                                    <td>
                                        <a href="#Cadastro" data-toggle="modal" onclick="editar({{$item}})" class="text-info"><i data-feather="edit"></i></a>
                                        <a href="{{route('produto.edit',$item)}}" title="Ver as Entradas e Requisições feitas" class="text-warning"><i data-feather="eye"></i></a>
                                        @if(Auth::user()->tipo =="Admin")
                                        <a href="{{route('produto.show',$item)}}" class="text-danger"><i data-feather="trash"></i></a>
                                        @endif
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
            document.getElementById('codigo').value = valor.codigo;
            document.getElementById('perecivel').value = valor.perecivel;
            document.getElementById('qtd').value = valor.qtd;
            document.getElementById('id_categoria').value = valor.id_categoria;
        }
    </script>
    {{-- Formulairo de cadastro de usuario --}}
    <!-- Modal trigger button -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="Cadastro" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="CadastroTitulo" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CadastroTitulo">Cadastro de Produto</h5>
                        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"> <i data-feather="x-circle"></i> </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('Produto.store')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label>Codigo do Produto</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                            <input type="text" required class="form-control phone-number" name="codigo" id="codigo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nome do Produto</label>
                            <div class="input-group">
                              <input type="text" required class="form-control phone-number" name="nome" id="nome">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Quantidade</label>
                            <div class="input-group">
                              <input type="text" required class="form-control phone-number" name="qtd" id="qtd">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Perecivel</label>
                            <div class="input-group">
                              
                              <select name="perecivel" id="perecivel" class="form-control">
                                <option value="Sim">Perecivel</option>
                                <option value="Não">Não perecevil</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Categoria</label>
                            <div class="input-group">
                             
                              <select name="id_categoria" id="id_categoria" class="form-control">
                                @foreach (App\Models\Categoria::orderBy('id','DESC')->get() as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->titulo }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-success"><i data-feather="save"></i>  Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
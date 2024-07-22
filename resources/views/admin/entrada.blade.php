@extends('layouts.admin')
@section('antonio')
    <div class="main-content">
        <div class="section">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Entradas de Produtos</h4>
                      
                      <div class="card-header-form">
                        <a href="#Cadastro" data-toggle="modal" title="Cadastrar de uma nova entrada"><i data-feather="plus-circle"></i></a>
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
                                <th>Quantidade</th>
                                <th>Categorias</th>
                                <th>Funcionario</th>
                                <th>Data da entrada</th>
                                <th></th>
                              </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1
                            @endphp
                            @foreach (App\Models\Entrada::orderBy('data_entrada','DESC')->get() as $item)
                                <tr>
                                    <td class="p-0 text-center">
                                        {{$i++}}
                                    </td>
                                    <td>{{$item->produto->nome}}</td>
                                    <td class="align-middle">
                                        {{$item->qtd}}
                                    </td>
                                    <td>
                                        {{$item->produto->categoria->nome}}
                                    </td>
                                    <td>
                                       {{Auth::user()->name}}
                                    </td>
                                    <td>
                                        {{$item->data_entrada}}
                                    </td>
                                    <td>
                                        <a href="#Cadastro" data-toggle="modal" onclick="editar({{$item}})" class="text-info"><i data-feather="edit"></i></a>
                                        @if(Auth::user()->tipo =="Admin")
                                        <a href="{{route('entrada.show',$item)}}" class="text-danger"><i data-feather="trash"></i></a>
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
            document.getElementById('qtd').value = valor.qtd;
            document.getElementById('preco').value = valor.preco;
            document.getElementById('produto_id').value = valor.produto_id;
            document.getElementById('data').value = valor.data_entrada;
        }
    </script>
    {{-- Formulairo de cadastro de usuario --}}
    <!-- Modal trigger button -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="Cadastro" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="CadastroTitulo" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CadastroTitulo">Entradas de produtos</h5>
                        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"> <i data-feather="x-circle"></i> </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('entrada.store')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label>Produto</label>
                            <div class="input-group">
                            <select name="produto_id" id="produto_id" class="form-control">
                                @foreach (App\Models\Produto::orderBy('nome','ASC')->get() as $prod)
                                    <option value="{{ $prod->id }}">{{ $prod->nome }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quantidade da Entrada</label>
                            <div class="input-group">
                              <input type="number" required value="1" class="form-control phone-number" name="qtd" id="qtd">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Preço do Produto</label>
                            <div class="input-group">
                              <input type="text" required value="0" class="form-control phone-number" name="preco" id="preco">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Data da Entrada</label>
                            <div class="input-group">
                                <input type="date" required class="form-control phone-number" name="data" id="data">
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
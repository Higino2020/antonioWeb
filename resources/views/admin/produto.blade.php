@extends('layouts.admin')
@section('antonio')
    <div class="main-content">
        <div class="section">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Produtos</h4>
                      
                      <div class="card-header-form">
                        <a href="#Cadastro" onclick="limpar()" data-toggle="modal" title="Cadastrar novo usuario"><i data-feather="plus-circle"></i></a>
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
                                <th>Codigo de referencia</th>
                                <th>Nome do Produto</th>
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
                                       <img src="{{url('getfile/'.$item->foto.'?w=100')}}" alt="" class="img-fluid">
                                    </td>
                                    <td class="align-middle">
                                        {{$item->codigo}}
                                    </td>
                                    <td>{{$item->nome}}</td>
                                   
                                    <td class="align-middle">
                                        {{$item->perecivel}}
                                    </td>
                                    <td>
                                        {{$item->qtd}}
                                    </td>
                                    <td>
                                        {{$item->categoria->nome}}
                                    </td>
                                    <td>
                                        <a href="#Cadastro" data-toggle="modal" onclick="editar({{$item}})" class="text-info"><i data-feather="edit"></i></a>
                                        <a href="{{route('produto.show',$item)}}" title="Ver as Entradas e Requisições feitas" class="text-warning"><i data-feather="eye"></i></a>
                                        <a href="#CadastroImg" data-toggle="modal" onclick="atribuir_produto_id({{$item->id}})" class="text-secondary"><i data-feather="file"></i></a>
                                        {{-- @if(Auth::user()->tipo =="Admin") --}}
                                        <a href="{{route('produto.apagar',$item)}}" class="text-danger"><i data-feather="trash"></i></a>
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
            document.getElementById('codigo').value = valor.codigo;
            document.getElementById('perecivel').value = valor.perecivel;
            document.getElementById('qtd').value = valor.qtd;
            document.getElementById('id_categoria').value = valor.id_categoria;
        }
        function lipmar(valor) {
            document.getElementById('id').value = "";
            document.getElementById('nome').value = "";
            document.getElementById('codigo').value = "";
            document.getElementById('perecivel').value = "";
            document.getElementById('qtd').value = "";
            document.getElementById('id_categoria').value = "";
        }
        function atribuir_produto_id(valor) {
            document.getElementById('produto_id').value = valor;
        }
    </script>
    {{-- Formulairo de cadastro de usuario --}}
    <!-- Modal trigger button -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="Cadastro" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="CadastroTitulo" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CadastroTitulo">Cadastro de Produto</h5>
                        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"> <i data-feather="x-circle"></i> </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('produto.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label>Imagem do Produto</label>
                            <div class="input-group">
                            <input type="file" required class="form-control phone-number" name="foto" id="foto">
                            </div>
                        </div>
                      <div class="row">
                        <div class="col-12 col-lg-6 col-md-6 form-group">
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
                        <div class="col-12 col-lg-6 col-md-6 form-group">
                            <label>Nome do Produto</label>
                            <div class="input-group">
                              <input type="text" required class="form-control phone-number" name="nome" id="nome">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-lg-6 col-12 col-md-6">
                            <label>Medição</label>
                            <div class="input-group">
                              <select name="medicao" id="medicao" class="form-control">
                                <option value="Kilogramas">Kilograma (Kg) </option>
                                <option value="Litro">Litro (Lt)</option>
                                <option value="Caixa">Caixa</option>
                                <option value="Unidade">Unidade</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-6 col-12 col-md-6">
                            <label>Caducidade</label>
                            <div class="input-group">
                                 <input type="date" min="{{date('Y-m-d')}}" class="form-control" name="caducidade" id="caducidade">
                            </div>
                        </div>
                    </div>
                       <div class="row">
                            <div class="col-12 col-lg-6 col-md-6 form-group">
                                <label>Quantidade</label>
                                <div class="input-group">
                                <input type="text" required value="0" class="form-control phone-number" name="qtd" id="qtd">
                                </div>
                            </div>
                            
                            <div class="col-12 col-lg-6 col-md-6 form-group">
                                <label>Preço por Unidade</label>
                                <div class="input-group">
                                <input type="number" required value="0" class="form-control phone-number" name="preco" id="preco">
                                </div>
                            </div>
                       </div>
                       <div class="row">
                           <div class="form-group col-lg-6 col-12 col-md-6">
                               <label>Perecivel</label>
                               <div class="input-group">
                                 <select name="perecivel" id="perecivel" class="form-control">
                                   <option value="Sim">Sim</option>
                                   <option value="Não">Não</option>
                                 </select>
                               </div>
                           </div>
                           <div class="form-group col-lg-6 col-12 col-md-6">
                               <label>Categoria</label>
                               <div class="input-group">
                                
                                 <select name="categoria_id" id="categoria_id" class="form-control">
                                   @foreach (App\Models\Categoria::orderBy('id','DESC')->get() as $cate)
                                       <option value="{{ $cate->id }}">{{ $cate->nome }}</option>
                                   @endforeach
                                 </select>
                               </div>
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
    <div class="modal fade" id="CadastroImg" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="CadastroTitulo" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CadastroTitulo">Cadastro Inserir Imagens do Produto</h5>
                        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"> <i data-feather="x-circle"></i> </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('produto.img')}}" method="post" enctype="multipart/form-data">
                      @csrf
                        <input type="hidden" name="produto_id" id="produto_id">
                        <div class="form-group">
                            <label>Seleciones as imgens do Produto</label>
                            <div class="input-group">
                            <input type="file" multiple required class="form-control phone-number" name="fotos[]" accept="image/*" id="foto">
                            </div>
                        </div>
                      
                        <div class="form-group">
                           <button type="submit" class="btn btn-success"><i data-feather="save"></i>Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
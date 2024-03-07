@extends('layouts.base')
@section('patrimonio')
    <div class="main-content " >
        <div class="section" >
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Requisição de Material</h4>
                      
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
                                    <th>Nome do Material</th>
                                    <th>Qtd entrege</th>
                                    <th>Qtd Devolvida</th>
                                    <th>Estado</th>
                                    <th>Area requisitante</th>
                                    <th>Data da requsição</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1
                            @endphp
                                @foreach (App\Models\Requisicao::orderBy('data','DESC')->get() as $item)
                                    <tr>
                                        <td class="p-0 text-center">
                                            {{$i++}}
                                        </td>
                                        <td>{{$item->material->nome}}</td>
                                        <td class="align-middle">
                                            {{$item->qtd}}
                                        </td>
                                        <td class="align-middle">
                                            {{$item->qtd_devolvida}}
                                        </td>
                                        <td>
                                            {{$item->estado}}
                                        </td>
                                        
                                        <td>
                                            {{$item->area->titulo}}
                                        </td>
                                        <td>
                                            {{$item->data}}
                                        </td>
                                        <td>
                                            @if($item->qtd != $item->qtd_devolvida)
                                                <a href="#Devolver" onclick="setaDadosModal({{$item}})" data-toggle="modal" class="text-warning"><i data-feather="check"></i></a>
                                            @endif
                                            <a href="#Cadastro" data-toggle="modal" onclick="editar({{$item}})" class="text-info"><i data-feather="edit"></i></a>
                                            @if(Auth::user()->tipo =="Admin")
                                            <a href="{{route('saidas.show',$item)}}" class="text-danger"><i data-feather="trash"></i></a>
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
    @include('pages.devolver')
    <script>
        function setaDadosModal(valor) {
            document.getElementById('id').value = valor.id;
        }
    </script>
    <script>
        function editar(valor) {
            document.getElementById('id').value = valor.id;
            document.getElementById('qtd').value = valor.qtd;
            document.getElementById('id_area').value = valor.id_area;
            document.getElementById('data').value = valor.data;
            document.getElementById('id_material').value = valor.id_material;
            document.getElementById('descricao').value = valor.descricao
        }
    </script>
    {{-- Formulairo de cadastro de usuario --}}
    <!-- Modal trigger button -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="Cadastro" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="CadastroTitulo" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CadastroTitulo">Requisição de Materiais</h5>
                        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"> <i data-feather="x-circle"></i> </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('saidas.store')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label>Material</label>
                            <div class="input-group">
                            <select name="id_material" id="id_material" class="form-control">
                                @foreach (App\Models\Material::orderBy('nome','ASC')->get() as $prod)
                                    <option value="{{ $prod->id }}">{{ $prod->nome }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quantidade Requisitada</label>
                            <div class="input-group">
                              <input type="number" required value="1" class="form-control phone-number" name="qtd" id="qtd">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Data da Entrega</label>
                            <div class="input-group">
                                <input type="datetime-local" required class="form-control phone-number" name="data" id="data">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>A área requsistante</label>
                            <div class="input-group">
                            <select name="id_area" id="id_area" class="form-control">
                                @foreach (App\Models\Area::orderBy('titulo','ASC')->get() as $area)
                                    <option value="{{ $area->id }}">{{ $area->titulo }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Descrição da requisição</label>
                            <div class="input-group">
                                <textarea name="descricao" id="descricao" class="form-control phone-number" cols="30" rows="10" style="resize: none"></textarea>
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
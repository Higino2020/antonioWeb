@extends('layouts.admin')
@section('antonio')
    <div class="main-content">
        <div class="section">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Encomenda de Produtos</h4>
                      
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
                                <th>Imagem</th>
                                <th>Produto</th>
                                <th>Categoria</th>
                                <th>Quantidade</th>
                                <th>Estado</th>
                                <th>Data de Entrega</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1
                            @endphp
                            @foreach (App\Models\Encomenda::orderBy('id','DESC')->get() as $encom)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{url('getfile/'.$encom->produto->foto.'?w=100')}}" alt="" class="img-fluid"></td>
                                    <td class="align-middle">{{$encom->produto->nome}}</td>
                                    <td class="align-middle">{{$encom->produto->categoria->nome}}</td>
                                    <td class="align-middle">{{$encom->qtd}}</td>
                                    <td class="align-middle">{{$encom->estado}}</td>
                                    <td class="align-middle">
                                        @if($encom->estado != "Em Analise")
                                            Entregue em 15 dias
                                        @endif
                                    </td>
                                    @if($encom->estado == "Em Analise")
                                        <th>
                                            <a href="{{route('encom.aceite',$encom->id)}}" class="btn btn-success"><i class="fa fa-check"></i> Aceitar</a>
                                            <a href="{{route('encom.rejeitar',$encom->id)}}" class="btn btn-danger"><i class="fa fa-close"></i> Recusar</a>
                                        </th>
                                    @endif
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
@endsection
@extends('layouts.admin')
@section('antonio')
<div class="main-content">
    <div class="section">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Imagens do produtos {{$produto->nome}}</h4>
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
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <img src="{{url('getfile/'.$produto->foto)}}" alt="" class="img-fluid">
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <p>{{$produto->nome}}</p>
                            <p>{{$produto->categoria->nome}}</p>
                            <p>{{$produto->preco}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach ($produto->imagem as $img)
                            <div class="col-12 col-md-3 col-lg-3 pb-4">
                                <div>
                                    <img src="{{url('getfile/'.$img->imagem)}}" alt="" style="width: 100%; height: 200px; object-fit: cover">
                                    <a href="{{route('imagens.show',$img->id)}}" style="width: 100%" class="btn btn-danger"><i data-feather="trash"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
            
@endsection
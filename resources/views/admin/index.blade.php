@extends('layouts.admin')
@section('patrimonio')
<div class="main-content">
  <section class="section">
    <div class="row ">
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Usuário</h5>
                    <h2 class="mb-3 font-18">{{App\Models\User::count()}}</h2>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/1.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Categorias</h5>
                    <h2 class="mb-3 font-18">{{App\Models\Categoria::count()}}</h2>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/2.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Entradas</h5>
                    <h2 class="mb-3 font-18">{{ App\Models\Entrada::count()}}</h2>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/3.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Produtos</h5>
                    <h2 class="mb-3 font-18">{{ App\Models\Produto::count()}}</h2>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/4.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Entrada Realizado no mês actual</h4>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>Nome do Material</th>
                  <th>Codigo de referencia</th>
                  <th>Quantidade</th>
                  <th>Categorias</th>
                  <th>Funcionario</th>
                  <th>Data da entrada</th>
                </tr>
                @foreach (App\Models\Entrada::whereMonth('data',date('m'))->get() as $item)
                  <tr>
                    <td>{{$item->material->nome}}</td>
                    <td class="align-middle">
                        {{$item->material->codigo}}
                    </td>
                    <td class="align-middle">
                        {{$item->qtd}}
                    </td>
                    <td>
                        {{$item->material->categoria->titulo}}
                    </td>
                    <td>
                        @if($item->id_funcionario != null )
                            {{$item->funcionario->nome}}
                        @else
                            Admin
                        @endif
                    </td>
                    <td>
                        {{$item->data}}
                    </td>
                    <td>
                        <a href="#" class="text-info"><i data-feather="edit"></i></a>
                        <a href="{{route('entradas.show',$item)}}" class="text-danger"><i data-feather="trash"></i></a>
                    </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-12 col-xl-6">
        <!-- Support tickets -->
        <div class="card">
          <div class="card-header">
            <h4>Categoria</h4>
            <form class="card-header-form">
              <a href="{{route('cate.index')}}" class="btn btn-primary">Ver todos</a>
            </form>
          </div>
          <div class="card-body">
            @foreach (App\Models\Categoria::orderBy('id','DESC')->limit(4)->get() as $item)
            <div class="support-ticket media pb-1 mb-3">
              <img src="{{asset('assets/img/logo/logotipo.png')}}" class="user-img mr-2" alt="">
              <div class="media-body ml-3">
                <span class="font-weight-bold">#{{$item->titulo}}</span>
                <a href="javascript:void(0)">{{$item->nome}}</a>
              </div>
            </div>
            @endforeach
         
          </div>
          <a href="{{route('cate.index')}}" class="card-footer card-link text-center small ">ver
            todos
          </a>
        </div>
        <!-- Support tickets -->
      </div>
      <div class="col-md-6 col-lg-12 col-xl-6">
        <div class="card">
          <div class="card-header">
            <h4>Saidas deste mês </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                      <th>Nome do Material</th>
                      <th>Estado</th>
                      <th>Area requisitante</th>
                      <th>Data da requsição</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach (App\Models\Saida::whereMonth('data',date('m'))->limit(4)->get() as $item)
                    <tr>
                      <td>{{$item->material->nome}}</td>
                      <td class="align-middle">
                          {{$item->qtd}}
                      </td>
                      <td>
                          {{$item->data}}
                      </td>
                      <td>
                          <a href="#" class="text-info"><i data-feather="edit"></i></a>
                          <a href="{{route('saidas.show',$item)}}" class="text-danger"><i data-feather="trash"></i></a>
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
  </section>

</div>
@endsection
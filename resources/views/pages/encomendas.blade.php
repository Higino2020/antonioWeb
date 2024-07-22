@extends('layouts.base')
@section('sacanombo')
@push('css')
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
@endpush
<div class="section">
    <!-- container -->
    <div class="container" style="margin-top: 50px">
        <div class="card">
            <div class="card-header">
                <h3>Minhas Encomendas</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Imagem</th>
                                <th>Produto</th>
                                <th>Categoria</th>
                                <th>Quantidade</th>
                                <th>Data de Entrega</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody> 
                            @php
                                $i = 1
                            @endphp
                            @foreach ($encomenda as $encom)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{url('getfile/'.$encom->produto->foto.'?w=100')}}" alt="" class="img-fluid"></td>
                                    <td style="display: flex; align-items: center;height: 100%">{{$encom->produto->nome}}</td>
                                    <td class="align-middle">{{$encom->produto->categoria->nome}}</td>
                                    <td class="align-middle">{{$encom->qtd}}</td>
                                    <td class="align-middle">{{$encom->data_entrega}}</td>
                                    <td class="align-middle">{{$encom->estado}}</td>
                                    <th>
                                        <a href="" class="btn btn-success"><i class="fa fa-check"></i> Confirmar</a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        @if ($encomenda->hasPages())
                            <ul class="pagination">
                                {{-- Anterior --}}
                                @if ($encomenda->onFirstPage())
                                    <li class="disabled"><span>&laquo;</span></li>
                                @else
                                    <li><a href="{{ $encomenda->previousPageUrl() }}"><span>&laquo;</span></a></li>
                                @endif

                                {{-- Números de página --}}
                                @for ($i = 1; $i <= $encomenda->lastPage(); $i++)
                                    @if ($i == $encomenda->currentPage())
                                        <li class="active"><span>{{ $i }}</span></li>
                                    @else
                                        <li><a href="{{ $encomenda->url($i) }}">{{ $i }}</a></li>
                                    @endif
                                @endfor

                                {{-- Próximo --}}
                                @if ($encomenda->hasMorePages())
                                    <li><a href="{{ $encomenda->nextPageUrl() }}"><span>&raquo;</span></a></li>
                                @else
                                    <li class="disabled"><span>&raquo;</span></li>
                                @endif
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
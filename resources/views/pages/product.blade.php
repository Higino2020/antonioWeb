@extends('layouts.base')
@section('sacanombo')
@push('css')
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
@endpush
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
       
            <div id="store" class="col-md-12">
              
                <div class="row">
                    <!-- product -->
                    @foreach ($produto as $prod)
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="{{url('getfile/'.$prod->foto)}}"  alt="" style="width: 100%;height: 300px; object-fit: cover">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{$prod->categoria->nome}}</p>
                                    <h3 class="product-name"><a href="#">{{$prod->name}}</a></h3>
                                    <h4 class="product-price">{{number_format($prod->preco)}} Kz <del class="product-old-price">{{number_format($prod->preco+500)}} kz</del></h4>
                                </div>
                                <div class="add-to-cart" style="height: 60px; padding-top: 20px">
                                    <a href="{{route('product.view',$prod->id)}}" style="padding-top: 10px; padding-bottom: 10px" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Encomendar</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Mostrando {{ $produto->firstItem() }}-{{ $produto->lastItem() }} de {{ $produto->total() }} produtos</span>
                    @if ($produto->hasPages())
                        <ul class="pagination">
                            {{-- Código dos links de paginação aqui --}}
                        </ul>
                    @endif
                    @if ($produto->hasPages())
                        <ul class="pagination">
                            {{-- Anterior --}}
                            @if ($produto->onFirstPage())
                                <li class="disabled"><span>&laquo;</span></li>
                            @else
                                <li><a href="{{ $produto->previousPageUrl() }}"><span>&laquo;</span></a></li>
                            @endif

                            {{-- Números de página --}}
                            @for ($i = 1; $i <= $produto->lastPage(); $i++)
                                @if ($i == $produto->currentPage())
                                    <li class="active"><span>{{ $i }}</span></li>
                                @else
                                    <li><a href="{{ $produto->url($i) }}">{{ $i }}</a></li>
                                @endif
                            @endfor

                            {{-- Próximo --}}
                            @if ($produto->hasMorePages())
                                <li><a href="{{ $produto->nextPageUrl() }}"><span>&raquo;</span></a></li>
                            @else
                                <li class="disabled"><span>&raquo;</span></li>
                            @endif
                        </ul>
                    @endif
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection
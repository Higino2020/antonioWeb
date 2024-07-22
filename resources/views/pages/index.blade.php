@extends('layouts.base')
@section('sacanombo')
    	<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="{{asset('img/legumes.avif')}}" alt="">
							</div>
							<div class="shop-body">
								<h3>Legumes<br>Produção</h3>
								<a href="#" class="cta-btn">Comprar Agora <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6" >
						<div class="shop" style="height: 240px">
							<div class="shop-img">
								<img src="{{asset('img/cereais.jpg')}}" style="height: 240px" alt="" class="img-fluid">
							</div>
							<div class="shop-body">
								<h3>Cereias<br>Produção</h3>
								<a href="#" class="cta-btn">Comprar Agora <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="{{asset('img/frutas.jpg')}}" style="height: 240px" alt="">
							</div>
							<div class="shop-body">
								<h3>Frutas<br>Produção</h3>
								<a href="#" class="cta-btn">Comprar Agora <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Novos Produtos</h3>
							{{-- <div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab1">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab1">Accessories</a></li>
								</ul>
							</div> --}}
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										@foreach (App\Models\Produto::orderBy('id','DESC')->limit(6)->get() as $prod)
											<div class="product">
												<div class="product-img">
													@include('pages.extra.imagen',['prod'=>$prod->foto])
												</div>
												<div class="product-body">
													<p class="product-category">{{$prod->categoria->nome}}</p>
													<h3 class="product-name"><a href="#">{{$prod->nome}}</a></h3>
													<h4 class="product-price">{{number_format($prod->preco)}} Kz <del class="product-old-price">{{number_format($prod->preco+500)}} kz</del></h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="product-btns">
														<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
														<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
														<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
													</div>
												</div>
												<div class="add-to-cart" style="height: 60px; padding-top: 20px">
													<a style="padding-top: 10px; padding-bottom: 10px" href="{{route('product.view',$prod->id)}}" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Encomendar</a>
												</div>
											</div>
										@endforeach
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">Produtos Baratos a Caminho</h2>
							<p>Novas Colhetas com 25% de Desconto</p>
							<a class="primary-btn cta-btn" href="#">Comprar Agora</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Mais Antigos</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										@foreach (App\Models\Produto::limit(12)->get() as $prod)
											<div class="product">
												<div class="product-img">
													@include('pages.extra.imagen',['prod'=>$prod->foto])
												</div>
												<div class="product-body">
													<p class="product-category">{{$prod->categoria->nome}}</p>
													<h3 class="product-name"><a href="#">{{$prod->nome}}</a></h3>
													<h4 class="product-price">{{number_format($prod->preco)}} Kz <del class="product-old-price">{{number_format($prod->preco+500)}} kz</del></h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="product-btns">
														<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
														<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
														<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
													</div>
												</div>
												<div class="add-to-cart">
													<a href="{{route('product.view',$prod->id)}}" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Encomendar</a>
												</div>
											</div>
										@endforeach
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Legumenosos</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">
							@php
								$legumes = App\Models\Categoria::where('nome','Legumes')->first() ;
							@endphp
							<div>
								<!-- product widget -->
								@foreach ($legumes->produtos()->limit(3)->get() as $produto)
										<div class="product-widget">
											<div class="product-img">
												<img style="width: 100%;height: 50px; object-fit: cover" src="{{url('getfile/'.$produto->foto.'?w=200&h=50')}}" class="img-fluid" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">{{$legumes->nome}}</p>
												<h3 class="product-name"><a href="{{route('product.view',$prod->id)}}"">{{$produto->nome}}</a></h3>
												<h4 class="product-price">{{number_format($produto->preco)}} Kz <del class="product-old-price">{{number_format($produto->preco+500)}} kz</del></h4>
											</div>
										</div>
								@endforeach
								
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Pequaria</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							@php
								$pequaria = App\Models\Categoria::where('nome','Pequaria')->first() ;
							@endphp
						<div>
							<!-- product widget -->
							@if(isset($pequaria->produtos))
								@foreach ($pequaria->produtos()->limit(3)->get() as $produto)
										<div class="product-widget">
											<div class="product-img">
												<img style="width: 100%;height: 50px; object-fit: cover" src="{{url('getfile/'.$produto->foto.'?w=200&h=50')}}" class="img-fluid" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">{{$pequaria->nome}}</p>
												<h3 class="product-name"><a href="{{route('product.view',$prod->id)}}">{{$produto->nome}}</a></h3>
												<h4 class="product-price">{{number_format($produto->preco)}} Kz <del class="product-old-price">{{number_format($produto->preco+500)}} kz</del></h4>
											</div>
										</div>
								@endforeach
							@endif
						</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Cereias</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							@php
								$cereias = App\Models\Categoria::where('nome','Cereias')->first() ;
							@endphp
						<div>
							<!-- product widget -->
							@foreach ($cereias->produtos()->limit(3)->get() as $produto)
									<div class="product-widget">
										<div class="product-img">
											<img style="width: 100%;height: 50px; object-fit: cover" src="{{url('getfile/'.$produto->foto.'?w=200&h=50')}}" class="img-fluid" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">{{$cereias->nome}}</p>
											<h3 class="product-name"><a href="{{route('product.view',$prod->id)}}">{{$produto->nome}}</a></h3>
											<h4 class="product-price">{{number_format($produto->preco)}} Kz <del class="product-old-price">{{number_format($produto->preco+500)}} kz</del></h4>
										</div>
									</div>
							@endforeach
							
						</div>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection
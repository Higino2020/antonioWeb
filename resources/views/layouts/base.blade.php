<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Antonio Sacanombo e Filhos</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/slick.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('css/slick-theme.css')}}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/nouislider.min.css')}}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/>
		@stack('css')
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +990-000-000</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> geral@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Benguela - Cubal</a></li>
					</ul>
						
					@if(!Auth::guest())
						<ul class="header-links pull-right">
							<li><a href="{{route('my')}}"><i class="fa fa-user-o"></i> Minha Conta</a></li>
							<li><a href="{{route('sair')}}"><i class="fa fa-power-off"></i> Sair</a></li>
						</ul>
					@else
						<ul class="header-links pull-right">
							<li><a href="#Login" data-toggle="modal"> Entrar</a></li>
							<li><a href="#Cadastrar" data-toggle="modal"> Cadastrar</a></li>
						</ul>
					@endif
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-2">
							<div class="header-logo">
								<a href="{{ route('inicio') }}" class="logo">
									AS & <span>Filhos</span>
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-8">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">Todas Categoria</option>
										@foreach (App\Models\Categoria::all() as $item)
											<option value="{{$item->id}}">{{$item->nome}}</option>
										@endforeach
									</select>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Procurar</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->
						<!-- ACCOUNT -->
						<div class="col-md-2 clearfix">
							<div class="header-ctn">
								<!-- Cart -->
								{{-- <div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Carrinho</span>
										<div class="qty">{{App\Models\Categoria::count()}}</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											@foreach (App\Models\Carrinho::limit(4)->orderBy('id','Desc')->get() as $cart)
												<div class="product-widget">
													<div class="product-img">
														@include('pages.extra.imagen',['prod'=>$cart->produto->foto])
													</div>
													<div class="product-body">
														<h3 class="product-name"><a href="#">{{$cart->produto->nome}}</a></h3>
														<h4 class="product-price"><span class="qty">{{$cart->qtd}}x</span>{{format_number($cart->produto->preco)}}</h4>
													</div>
													<a href="" class="delete"><i class="fa fa-close"></i></a href="">
												</div>
											@endforeach
										</div>
										<div class="cart-summary">
										</div>
										<div class="cart-btns">
											<a href="#">Ver o carrinho</a>
											<a href="#">Encomendar  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div> --}}
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="{{route('inicio')}}">Inicio</a></li>
						<li><a href="{{route('produto')}}">Produtos</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

        @yield('sacanombo')

			<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Sobre A Empresa</h3>
								<p>Algo Sobre a Empresa</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categorias</h3>
								<ul class="footer-links">
									@foreach (App\Models\Categoria::limit(5)->get() as $cate)
										<li><a href="#">{{$cate->nome}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Links</h3>
								<ul class="footer-links">
									<li><a href="#">Inicio</a></li>
									<li><a href="#">Produto</a></li>
									<li><a href="#">Categorias</a></li>
									<li><a href="#"></a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Serviços</h3>
								<ul class="footer-links">
									<li><a href="#">Minha Conta</a></li>
									<li><a href="#">Meus Pedidos</a></li>
									<li><a href="#">Meu Carrinho</a></li>
									<li><a href="#">Definições</a></li>
									<li><a href="#">Ajuda</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Antonio E Filhos <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">HDJ</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->
		@include('pages.auth.login')
		@include('pages.auth.cadastrar')
		<!-- jQuery Plugins -->
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/slick.min.js')}}"></script>
		<script src="{{asset('js/nouislider.min.js')}}"></script>
		<script src="{{asset('js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('js/main.js')}}"></script>

	</body>
</html>

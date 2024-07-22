@extends('layouts.base')
@section('sacanombo')
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="{{route('inicio')}}">Home</a></li>
					<li><a href="{{route('produto')}}">Produto</a></li>
					<li class="active">{{$produto->nome}}</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Product main img -->
			<div class="col-md-5 col-md-push-2">
				<div id="product-main-img">
					<div class="product-preview">
						<img src="{{url('getfile/'.$produto->foto)}}" alt="" style="width: 100%; height: 400px; object-fit: cover">
					</div>
					@foreach ($produto->imagem as $file)
						<div class="product-preview">
							<img src="{{url('getfile/'.$file->imagem)}}" alt="" style="width: 100%; height: 400px; object-fit: cover">
						</div>
					@endforeach
				</div>
			</div>
			<!-- /Product main img -->

			<!-- Product thumb imgs -->
			<div class="col-md-2  col-md-pull-5">
				<div id="product-imgs">
					<div class="product-preview">
						<img src="{{url('getfile/'.$produto->foto)}}" alt="" style="width: 100%; height: 100%; object-fit: cover">
					</div>
					@foreach ($produto->imagem as $file)
						<div class="product-preview">
							<img src="{{url('getfile/'.$file->imagem)}}" alt="" style="width: 100%; height: 100%; object-fit: cover">
						</div>
					@endforeach
				</div>
			</div>
			<!-- /Product thumb imgs -->

			<!-- Product details -->
			<div class="col-md-5">
				<div class="product-details">
					<h2 class="product-name">{{$produto->nome}}</h2>
					<div>
						<h3 class="product-price">{{number_format($produto->preco)}} Kz <del class="product-old-price">{{number_format($produto->preco+500)}} kz </del> Unit</h3> 		
						<span class="product-available">{{$produto->qtd}} Em Stock</span>
					</div>
					<div class="">
						<span class="product-available">Unidade: {{$produto->medicao}}</span>
					</div>
					<p>
						{{$produto->descricao}}
					</p>
					@auth
						<div class="add-to-cart">
							<button data-target="#Encomenda" data-toggle="modal" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Encomenda</button>
						</div>
					@endauth
				</div>
			</div>
			<!-- /Product details -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-12">
				<div class="section-title text-center">
					<h3 class="title">Produtoa Relacionados</h3>
				</div>
			</div>

			<!-- product -->
			@foreach (App\Models\Produto::where('categoria_id',$produto->categoria_id)->get() as $prod)
				<div class="col-md-3 col-xs-6">
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
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /Section -->

<!-- Modal -->
<div class="modal fade" id="Encomenda" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
				<div class="modal-header">
						<h5 class="modal-title">Encomendar o Produto {{$produto->nome}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
					</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form action="{{route('encomenda.store')}}" method="POST">
						@csrf
						<input type="hidden" name="produto_id" value="{{$produto->id}}">
						<div class="form-group">
							<label for="">Quantidade</label>
							<div class="input-form">
								<input type="number" value="1" min="1" max="{{$produto->qtd}}" class="form-control" name="qtd" >
							</div>
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
				<button type="subtmit" class="btn btn-primary">Encomenda</button>
			</div>
		</form>
		</div>
	</div>
</div>

<script>
	$('#exampleModal').on('show.bs.modal', event => {
		var button = $(event.relatedTarget);
		var modal = $(this);
		// Use above variables to manipulate the DOM
		
	});
</script>


@endsection
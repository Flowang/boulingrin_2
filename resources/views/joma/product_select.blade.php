@extends('layouts.app_boutique')

@section('content')
@include('joma.ourJs')
<!-- @include('joma.tourJs') -->
<div class="lolilol">
	<div class="row ">
		<div class="col-md-1 search_bar_1"><a class="btn btn-primary" href="{{ url()->current() }}">Reset</a></div>
		<div class="col-md-1 search_bar_1"><a class="btn btn-primary" id="findBtn">Rechercher</a></div>
			<div class="col-md-3 search_bar">
				<select class="form-control" id="cat_select"  >
					<option value="">Choisir une catégorie</option>
					@foreach($categories as $categorie)
						<option id="cat{{$categorie->id_cat}}" value="{{$categorie->id_cat}}">{{$categorie->libelle}}</option>
					@endforeach
				</select> 
			</div>
		<div class="col-md-3  search_bar">
			<select class="form-control" id="com_select">
				<option value="">Choisir un commerçant</option>
				@foreach($users as $users)
					<option id="cat{{$users->id}}" value="{{$users->id}}">{{$users->name}}</option>
				@endforeach
			</select> 
		</div>
		<div class="col-md-3 search_bar"></div>
	</div>
</div>


<div class="container">
</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 style=text-align:center;>Boutique</h1>
		</div>
		<div id="commercantData">
		<div id="productData">
			<div class="row">
						@foreach($joma_products as $joma_product)
						<div class="card col-md-2 test_large">
							<div class="card-body">
							  <img class="card-img-top" src="{{$joma_product->img}}">
								<h5 class="card-title">{{$joma_product->nom}}</h5>
								<h5 class="card-title">{{$joma_product->prix_unite}}$</h5>
								<p class="card-text">{{$joma_product->description}}</p>
								
								<a href="{{url('/cart/add')}}/{{$joma_product->id_prod}}" class="btn btn-success btn-xs">Acheter</a>
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
		</div>
	</div>
</div>
@endsection
@extends('layouts.app_boutique')

@section('content')
@include('joma.ourJs')
<div class="lolilol">
     <div class="col-md-3">
		<ul class="list">
			<li class="option selected">Some option</li>
			@foreach($categories as $categorie)
			<li class="option" id="cat{{$categorie->id}}" value="{{$categorie->id}}">{{$categorie->libelle}}</li>
			 @endforeach
		</ul>


         <!-- <select class="form-control" id="joma_select">
		     <option value="start">Choisir une catégorie</option>
		 	@foreach($categories as $categorie)
                <option id="cat{{$categorie->id}}" value="{{$categorie->id}}">{{$categorie->libelle}}</option>
             @endforeach
        </select> -->
    </div>
</div>


<div class="container">
</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 style=text-align:center;>Boutique</h1>
		</div>
		<div id="productData">

			<div class="row">
						@foreach($joma_products as $joma_product)
						<div class="card col-md-3 ">
							<div class="card-body">
							  <img class="card-img-top" src="{{$joma_product->img}}">
								<h5 class="card-title">{{$joma_product->nom}}</h5>
								<h5 class="card-title">{{$joma_product->prix_unite}}$</h5>
								<p class="card-text">{{$joma_product->description}}</p>
								<a href="#" class="btn btn-success btn-xs">Acheter</a>
							</div>
						</div>
						@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
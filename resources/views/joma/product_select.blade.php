@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			Boutique
			<a href="{{ route('product.create') }}" class="btn btn-success btn-xs">Ajouté un article</a>
		</div>

			<div class="row">
						@foreach($joma_products as $joma_product)
						<div class="card col-md-3 ">
							<div class="card-body">
							  <img class="card-img-top" src="{{$joma_product->img}}">
								<h5 class="card-title">{{$joma_product->nom}}</h5>
								<h5 class="card-title">{{$joma_product->prix_unite}}$</h5>
								<p class="card-text">{{$joma_product->description}}</p>
								<a href="{{ route('product.edit', $joma_product->id) }}" class="btn btn-success btn-xs">Edit</a>
							</div>
						</div>
						@endforeach
			</div>
	</div>
</div>
@endsection
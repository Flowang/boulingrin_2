@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			Boutique
			<a href="{{ route('product.create') }}" class="btn btn-success btn-xs">Ajouté un article</a>
		</div>
			<div class="row">
						@foreach($products as $product)
						<div class="card col-md-3 ">
							<div class="card-body">
							  <img class="card-img-top" src="{{$product->img}}">
								<h5 class="card-title">{{$product->nom}}</h5>
								<h5 class="card-title">{{$product->prix_unite}}$</h5>
								<p class="card-text">{{$product->description}}</p>
								<a href="{{ route('product.edit', $product->id_prod) }}" class="btn btn-success btn-xs">Edit</a>
							</div>
						</div>
						@endforeach
			</div>
	</div>
</div>
@endsection
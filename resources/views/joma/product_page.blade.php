<div class="row">
						@foreach($data as $joma_product)
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
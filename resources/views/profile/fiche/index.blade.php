@extends('layouts.app')

@section('content')
<div class="container">

            @foreach($fiches as $fiche)
<div class="card" style="width: 18rem;">

  <img class="card-img-top" src="{{$fiche->img}}" alt="Card image cap">



  <div class="card-body">
    <h5 class="card-title">{{$fiche->title}}</h5>
    <p class="card-text">{{$fiche->description}}</p>
    <a href="{{action('FicheController@edit',$fiche->id)}}" class="btn btn-primary">Edit</a>
  </div>
</div>
            @endforeach
<div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="row">
    
    <form method="post" enctype="multipart/form-data" files="true" action="{{action('ProductController@update', $id) }}" >

        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="nom">Nom du produit</label>
            <input type="text" class="form-control" name="nom" value={{$products->nom}} />
        </div>
        <div class="form-group">
            <label for="description">Description du produit:</label>
            <textarea cols="5" rows="5" class="form-control" name="description">{{$products->description}}</textarea>
        </div>
            <div class="form-group">
            <label for="prix_unite">Prix du produit:</label>
            <input type="number" class="form-control" name="prix_unite" value={{$products->prix_unite}} />
        </div>

     <div class="card-body">
        <h5> {{ Form::label('files_img', 'Description du commerce' )}}
              {{ Form::file('files_img') }}
    </div>

        <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
</div>
@endsection
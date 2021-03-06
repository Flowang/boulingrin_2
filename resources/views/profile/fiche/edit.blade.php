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
    
    <form method="post" enctype="multipart/form-data" files="true" action="{{action('FicheController@update', $id) }}" >

        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">Nom du commerce</label>
            <input type="text" class="form-control" name="title" value={{$fiches->title}} />
        </div>
        <div class="form-group">
            <label for="description">Description du commerce:</label>
            <textarea cols="5" rows="5" class="form-control" name="description">{{$fiches->description}}</textarea>
        </div>

     <div class="card-body">
        <h5> {{ Form::label('featured_image', 'Description du commerce' )}}
              {{ Form::file('featured_image') }}
    </div>

        <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
</div>
@endsection
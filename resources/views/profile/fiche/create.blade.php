@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <form method="post" action="{{url('fiches/create')}}">
    <input name="_method" type="hidden" value="Post">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">Fiche Title:</label>
            <input type="text" class="form-control" name="title"/>
        </div>
        <div class="form-group">
            <label for="description">Fiche Description:</label>
            <textarea cols="5" rows="5" class="form-control" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
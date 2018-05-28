@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Title</td>
              <td>Description</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($fiches as $fiche)
            <tr>
                <td>{{$fiche->id}}</td>
                <td>{{$fiche->title}}</td>
                <td>{{$fiche->description}}</td>
                <td><a href="{{action('FicheController@edit',$fiche->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{action('FicheController@destroy', $fiche->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection
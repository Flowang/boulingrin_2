@extends('layouts.app')

@section('content')
<div class="container">
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif
   
    <div class="row">
       <a href="{{url('/fiche/create')}}" class="btn btn-success">Create Ticket</a>
       <a href="{{url('/fiches')}}" class="btn btn-default">All Tickets</a>
    </div>
</div>
@endsection
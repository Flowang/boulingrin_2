@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<h1>Veuillez choisir votre jour de marché !</h1>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3"></div>
                    <div class="col-md-6">
                            <select class="form-control" id="joma_select">
                                @foreach($jomas as $joma)
                                <option value="{{$joma->id}}">{{$joma->joma}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
                <br>
            <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-6">
                        <button type="button"  onclick="selected()" class="btn btn-primary">Valider</button>
                    </div>
            </div>
	</div>
</div>

<script>

function selected() {
    var selectvalue = document.getElementById("joma_select").value;
    console.log(selectvalue)
    $selectvalue = 
}

</script>

@endsection
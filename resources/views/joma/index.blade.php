@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<h1 style="text-align:center;">Veuillez choisir votre jour de marché !</h1>
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

<a class="btn btn-primary" onclick="redirectTo();">Valider</a>


                    </div>
            </div>
	</div>
</div>

  <script type="text/javascript">
function redirectTo(){
        var e = document.getElementById("joma_select");
        var strUser = e.options[e.selectedIndex].value;
        window.location.href="{{url('/productlist')}}/"+strUser;
}
</script>

<!-- <script>
alert($('#joma_select').val());
</script> -->

@endsection
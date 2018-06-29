@extends('layouts.app')

@section('content')
<script src="https://use.fontawesome.com/c560c025cf.js"></script>

<script>
$(document).ready(function(){
    $("#CartMsg").hide();
    @foreach($data as $pro)
    $("#upCart{{$pro->id}}").bind('keyup mouseup', function(){
        var newQty = $("#upCart{{$pro->id}}").val();
        var rowID = $("#rowID{{$pro->id}}").val();

        $.ajax({
            url:'{{url('/cart/update')}}',
            data:'rowID=' + rowID + '&newQty=' + newQty,
            type:'get',
            success:function(response){
                $("#CartMsg").show();
                console.log(response);
                $("#CartMsg").html(response);
            }
        });
    });
    @endforeach
});
</script>
<div class="container">
   <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Shipping cart
                <a href="{{url('joma')}}" class="btn btn-outline-info btn-sm pull-right">Continue shopping</a>
                <div class="clearfix"></div>
            </div>


<div class="alert alert-info" id="CartMsg"></div>

        @foreach($data as $pro)
            <div class="card-body">
                    <!-- PRODUCT -->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="{{$pro->options->img}}" alt="Prend ton temps" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong>{{$pro->name}}</strong></h4>
                            <h4>
                                <small>{{$pro->options->description}}</small>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                        
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong>{{$pro->price}}€/unité</span></strong></h6>
                                <h6><strong>{{$pro->price* $pro->qty}}€</span></strong></h6>
                            </div>
                            <input type="hidden" value="{{$pro->rowId}}" id="rowID{{$pro->id}}">
                            <div class="col-4 col-sm-4 col-md-4">
                                <div class="quantity">
                                    <input type="number" value="{{$pro->qty}}" title="Qty" id="upCart{{$pro->id}}" class="qty" size="4">
                                </div>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <a href="{{url('cart/remove')}}/{{$pro->rowId}}">
                                    <button type="button" class="btn btn-outline-danger btn-xs">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
		@endforeach
            <div class="card-footer">
                <div style="margin: 10px">
                    <a href="{{ url()->current() }}" class="btn btn-success">Mettre à jour</a>
                    <a href="" class="btn btn-success">Commander</a>
                    <div style="margin: 5px">Total price: <b>{{Cart::subtotal()}}€</b></div>
                </div>
            </div>
        </div>
</div>

@endsection
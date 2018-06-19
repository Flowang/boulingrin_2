<script>
$(document).ready(function(){


    @foreach(App\categorie::all() as $catList)
    $("#cat{{$catList->id}}").click(function(){
        var cat = $("#cat{{$catList->id}}").val();
        alert(cat);

        $.ajax({
            type:'get',
            dataType: 'html',
            url:"{{url('/productList')}}",
            data:'id=' + cat,
            success:function(response){
                // console.log(response);
                $("#productData").html(response);
            }
        });
    });
    @endforeach
});
</script>
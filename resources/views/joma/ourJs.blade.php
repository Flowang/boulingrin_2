<script>
$(document).ready(function(){
	@foreach($categories as $categorie)
  $("#cat_select").change(function()
    {
        var cat = $("#cat_select").val();
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

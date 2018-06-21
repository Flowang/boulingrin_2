<script>
$(document).ready(function(){
  $("#findBtn").click(function()
    {
        var cat = $("#cat_select").val();
        var com = $("#com_select").val();
        $.ajax({
            type:'get',
            dataType: 'html',
            url:"{{url('/productList')}}",
            data:'id_cat=' + cat + '&id=' + com,
            success:function(response){
                // console.log(response);
                $("#productData").html(response);
            }
        });
    });
});
</script>

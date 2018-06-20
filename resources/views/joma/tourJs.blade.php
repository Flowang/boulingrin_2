<script>
$(document).ready(function(){
	@foreach($users as $user)
  $("#com_select").change(function()
    {
        var cat = $("#com_select").val();
        // alert(cat);
        $.ajax({
            type:'get',
            dataType: 'html',
            url:"{{url('/commercantList')}}",
            data:'id=' + cat,
            success:function(response){
                // console.log(response);
                $("#commercantData").html(response);
            }
        });
    });
    @endforeach
});
</script>
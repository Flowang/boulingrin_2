<script>
$(document).ready(function(){

    @foreach(App\categorie::all() as $catList)
    $("#cat{{$catList->id}}").click(function(){
        var cat = $("#cat{{$catList->id}}").val();
        alert(cat);

        $.ajax({
            type:'get';
            url:'{{url('produclist/{id}')}}',
            data:'categories_id' + cat,
            success:function(response){
                console.log(response);
            }
        });
    });
    @endforeach
});
</script>
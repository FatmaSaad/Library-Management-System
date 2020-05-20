$('#search').on('keyup',function(){
    console.log("hoho");
    $value=$(this).val();
    $.ajax({

        type : 'get',
        url : "/search",
        data:{'search':$value},
        success:function(data)
        {
            $('.card-body').html(data);
        }
    });
})

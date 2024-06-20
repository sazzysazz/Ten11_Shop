$(document).ready(function() {

    //Category Select 2
    $('.size-color').select2();

    //Append Value for remove post
    $('body').on('click','#remove-post-key',function(){
        var postId = $(this).attr('data-value');
        $('#remove-val').val(postId);
    })

});
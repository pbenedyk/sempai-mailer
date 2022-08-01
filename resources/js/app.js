require('./bootstrap');

$(function(){
    $('.deleteRow').on('click', function(){
        let itemID = $(this).data('id');
        $('#deleteForm input[name="item_id"]').val(itemID);
        $('#deleteModal').modal('toggle');
    });
   
})

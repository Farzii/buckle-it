$(document).ready(function() {
   $('.requirement_status_change').change(function(event){
       $.ajax({
       url: $('[name="change-requirement-status"]').val(),
       type: "get",
       data: {id:$(this).attr('id'),
       status: $(this).val()},
       success: function (response) {
           location.reload();
        }
   });
   }); 
});

function addEditRequirement(ref, title, description, id) {
    $('[name="description"]').val(description);
    $('[name="reference_number"]').val(ref);
    $('[name="requirement_id"]').val(id);
    $('[name="title"]').val(title);
    $('#add-requirement-modal').modal('show');
}
function getComments(url) {
    $.ajax({
       url: url,
       type: "get",
       data: {},
       success: function (response) {
           $('#comments_list').html(response.html);
           $('#comment_modal [name="type"]').val(response.type);
           $('#comment_modal [name="item_id"]').val(response.item_id);
           $('#comment_modal').modal('show');
        }
   });
}
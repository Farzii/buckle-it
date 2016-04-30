function addEditRequirement(ref, title, description, id) {
    $('[name="description"]').val(description);
    $('[name="reference_number"]').val(ref);
    $('[name="requirement_id"]').val(id);
    $('[name="title"]').val(title);
    $('#add-requirement-modal').modal('show');
}
function getComments(item_id,type) {
    
}
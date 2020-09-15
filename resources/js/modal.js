// Bind click to Delete button within popup
$('#deleteCommentModal').on('click', '.btn-delete', function (e) {
    let $modalDiv = $(e.delegateTarget)
    let id = $(this).data('commentId');

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: `/drop-comment/${id}`,
        type: 'DELETE',
        success: function (result) {
            $modalDiv.modal('hide');
            location.reload();
        }
    });
});

// Bind to modal opening to set commentId to be used to make request
$('#deleteCommentModal').on('show.bs.modal', function (e) {
    let data = $(e.relatedTarget).data();
    $('.btn-delete', this).data('commentId', data.commentId);
});

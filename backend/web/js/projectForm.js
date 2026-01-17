$(document).ready(function () {
  $('.btn-delete-project').on('click', function () {
    $(this).prop('disabled', true);
    let projectImageId = $(this).data('projectImageId');
    $.post('delete-project-image', { id: projectImageId })
      .done(function () {
        $('#project-form__image-container-' + projectImageId).remove();
      })
      .fail(function () {
        $('.btn-delete-project').prop('disabled', false);
        $('#project-form__image-error-message-' + projectImageId).text(
          'Error deleting image. Please try again.',
        );
      });
  });
});

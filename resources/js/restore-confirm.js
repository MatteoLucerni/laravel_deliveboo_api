// JavaScript for the Restore Modal
document.addEventListener('DOMContentLoaded', function () {
  const restoreModal = document.getElementById('restoreModal');
  const restoreForm = document.getElementById('restoreForm');

  if (restoreModal && restoreForm) {
      restoreModal.addEventListener('show.bs.modal', function (event) {
          const button = event.relatedTarget;
          const plateId = button.getAttribute('data-id');
          const route = button.getAttribute('data-route');
          restoreForm.action = `/admin/${route}/${plateId}/restore`;
      });
  }
});

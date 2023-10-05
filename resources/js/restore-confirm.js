// JavaScript for the Restore Modal
document.addEventListener('DOMContentLoaded', (event) => {
  const restoreModal = document.getElementById('restoreModal');
  const restoreForm = document.getElementById('restoreForm');

  restoreModal.addEventListener('show.bs.modal', (event) => {
      const button = event.relatedTarget;
      const plateId = button.getAttribute('data-id');
      const route = button.getAttribute('data-route');
      restoreForm.action = `/admin/${route}/${plateId}/restore`;
  });
});

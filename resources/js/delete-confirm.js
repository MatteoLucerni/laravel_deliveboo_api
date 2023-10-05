
document.addEventListener('DOMContentLoaded', (event) => {
    const deleteModal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');
  
  
    deleteModal.addEventListener('show.bs.modal', (event) => {
      const button = event.relatedTarget;
      const plateId = button.getAttribute('data-id');
      const route = button.getAttribute('data-route');
      deleteForm.action = `/admin/${route}/${plateId}`;
    });
  });
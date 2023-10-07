<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this plate?</p>
        </div>
        <div class="modal-footer d-flex justify-content-center gap-3">
          <button type="button" class="button-secondary-db" data-bs-dismiss="modal">Cancel</button>
          <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="button-danger-db">Confirm Delete</button>
          </form>      
        </div>
      </div>
    </div>
  </div>
  

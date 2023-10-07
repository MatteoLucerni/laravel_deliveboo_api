<!-- Restore Modal -->
<div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Restore Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to restore this plate?</p>
      </div>
      <div class="modal-footer d-flex justify-content-center gap-3">
        <button type="button" class="button-secondary-db" data-bs-dismiss="modal">Cancel</button>
        <form id="restoreForm" method="POST">
          @csrf
          @method('PATCH')
          <button type="submit" class="button-main-db">Confirm Restore</button>
      </form>      
      </div>
    </div>
  </div>
</div>

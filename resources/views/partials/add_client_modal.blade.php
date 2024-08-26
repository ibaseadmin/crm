<!-- resources/views/partials/add_client_modal.blade.php -->
<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addClientModalLabel">Add New Client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('clients.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Client Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone">
          </div>
          
          <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location">
          </div>
          
          <button type="submit" class="btn btn-primary">Add Client</button>
        </form>
      </div>
    </div>
  </div>
</div>

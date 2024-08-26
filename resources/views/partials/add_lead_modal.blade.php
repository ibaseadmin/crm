<!-- resources/views/partials/add_lead_modal.blade.php -->
<div class="modal fade" id="addLeadModal" tabindex="-1" aria-labelledby="addLeadModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addLeadModalLabel">Add New Lead</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('leads.store') }}" method="POST">
          @csrf

          <!-- Afișarea erorilor -->
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <div class="mb-3">
            <label for="name" class="form-label">Lead Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
          </div>
          
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
          </div>
          
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
          </div>
          
          <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
          </div>

          <div class="mb-3">
            <label for="agent_id" class="form-label">Agent</label>
            <select name="agent_id" id="agent_id" class="form-select" required>
              @foreach($agents as $agent)
                <option value="{{ $agent->id }}" {{ old('agent_id') == $agent->id ? 'selected' : '' }}>
                  {{ $agent->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="source" class="form-label">Source</label>
            <select name="source" id="source" class="form-select" required>
                <option value="Facebook" {{ old('source') == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                <option value="Google Ads" {{ old('source') == 'Google Ads' ? 'selected' : '' }}>Google Ads</option>
                <option value="Trafic" {{ old('source') == 'Trafic' ? 'selected' : '' }}>Trafic</option>
                <option value="Altele" {{ old('source') == 'Altele' ? 'selected' : '' }}>Altele</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Add Lead</button>
        </form>
      </div>
    </div>
  </div>
</div>

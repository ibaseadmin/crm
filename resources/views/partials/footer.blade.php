<!-- resources/views/partials/footer.blade.php -->
<footer class="pc-footer">
  <div class="footer-wrapper container-fluid">
    <div class="row">
      <div class="col my-1"><p class="m-0">iBase.ro &#9829; crafted by Emanuel Trocmaer <a href="mailto:emanuel@trocmaer.ro"></a></p></div>
      <div class="col-auto my-1">
        <ul class="list-inline footer-link mb-0">
          <li class="list-inline-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="list-inline-item"><a href="https://ibase.ro/documentation/" target="_blank">Documentation</a></li>
          <li class="list-inline-item"><a href="https://ibase.ro/suport/" target="_blank">Support</a></li>
          <div class="btn-group">
          <div>
          <div class="btn-group">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        {{ __('messages.language') }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">English</a></li>
        <li><a class="dropdown-item" href="{{ route('lang.switch', 'ro') }}">Română</a></li>
    </ul>
</div>

</div>


        </ul>
        
      </div>
      
    </div>
  </div>
</footer>

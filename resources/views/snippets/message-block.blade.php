@if (Session::get('message') !== null)
    <div class="alert alert-success mt-4">
        <p>{{ Session::get('message') }}</p>
    </div>
@endif

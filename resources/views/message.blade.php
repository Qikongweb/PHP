@if (session('status'))
    <div class="alert alert-dismissible alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

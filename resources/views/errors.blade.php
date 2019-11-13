@if ($errors->any())
    <div class="alert alert-dismissible alert-warning alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    </div>
@endif

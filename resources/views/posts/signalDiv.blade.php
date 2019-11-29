<div class="col-md-6">
    <div class="card mb-3">

        <img style="height: 200px; width: 100%; display: block;" alt="Card image" class="cardImage" src={{ $post->image_url }} onclick="window.location.href='/posts/{{ $post->id }}'"/>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->caption }}</p>

        </div>

        <div class="card-footer text-muted">
            Posted {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }} by  {{ App\User::find($post->created_by)->name }}
        </div>
    </div>
</div>

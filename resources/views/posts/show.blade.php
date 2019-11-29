@extends('layouts.app')

@section('users')
    @include('message')

    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-8">
                <h1 class="card-title">{{ $post->title }}</h1><br><br>

                <figure>
                    <img style=" width: 100%; display: block;" alt="Card image" src={{ $post->image_url }} />
                    <figcaption>{{ $post->caption }}</figcaption>
                </figure>

                @if($post->comments->count())
                    <div >
                    <h4>Comments:</h4>

                    @foreach ($post->comments as $comment)
                        <div >

                            <p >{{ $comment->user->name }}<span style="float:right"
                                   >{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                            </p>
                            <ul><li>{{ $comment->contents }}</li></ul>

                        </div>
                    @endforeach
                </div>
                @endif
                <div class="row">
                    <form action="/posts/{{ $post->id }}/comments" method="post" style="width:100%;" id="contact_us">

                        {{ csrf_field() }}

                        <div class="field " style="width:90%;float:left">
                            <input type="text" class="form-control" placeholder="Add a new comment"  name="contents" />
                            <input type="hidden" value={{ $post->id }} name="post_id"/>

                        </div>
                        <div class="field">
                            <button class="btn btn-primary " type="submit">Add</button>
                        </div>
                        @include('errors')

                    </form>

                </div>
            </div>
            @include('sidebar')
        </div>
    </div>


@endsection





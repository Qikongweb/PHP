@extends('layouts.app')

@section('users')
    @if (session('status'))
        <div class="alert alert-dismissible alert-warning alert-danger" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-8">
                <div class="row">

                    @foreach ($posts as $post)
                        <div class="col-md-6">
                        <div class="card mb-3">

                            <img style="height: 200px; width: 100%; display: block;" alt="Card image" src={{ $post->image_url }}  />
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->caption }}</p>
                                <form action='/posts/{{ $post->id }}' method="post" class="d-inline" >

{{--                                    {{ method_field('DELETE') }}--}}
{{--                                    {{ csrf_field() }}--}}
                                    @method('DELETE')
                                    @csrf
                                    @auth
                                        @if(app('request')->user()->hasRole('post_moderator'))
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" >Delete</button>
                                        @endif
                                    @endauth
                                </form>


                            </div>

                            <div class="card-footer text-muted">

                                Posted {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }} minutes ago by  {{ $post->name }}
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
            @include('sidebar')
        </div>
    </div>


@endsection


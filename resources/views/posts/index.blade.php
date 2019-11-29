@extends('layouts.app')

@section('users')
    @include('message')

    <div class="container" >
        <div class="row">
            <div class="col-1"></div>
            <div class="col-8 row" id="postCard" style="height:500px;overflow: auto;margin-right: 10px">

                    @foreach ($posts as $post)
                        <div class="col-md-6">
                            <div class="card mb-3">

                                <img style="height: 200px; width: 100%; display: block;" alt="Card image" class="cardImage" src={{ $post->image_url }} onclick="window.location.href='/posts/{{ $post->id }}'"/>
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->caption }}</p>
{{--                                <form action='/posts/{{ $post->id }}' method="post" class="d-inline myform" >--}}

{{--                                    {{ method_field('DELETE') }}--}}
{{--                                    {{ csrf_field() }}--}}

                                    @auth
                                        @if(app('request')->user()->hasRole('post_moderator'))
{{--                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" >Delete</button>--}}
                                            <input type="submit" value="Delete" class='btn btn-xs btn-danger deleteButton' data-toggle="modal" data-target="#confirmDelete" />
                                            @include('model')
                                        @endif
                                    @endauth
{{--                                </form>--}}

                            </div>

                            <div class="card-footer text-muted">
                                Posted {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }} by  {{ App\User::find($post->created_by)->name }}
                            </div>
                        </div>
                    </div>

                    @endforeach

            </div>
            @include('sidebar')
        </div>
    </div>


@endsection
@section('footer_scripts')

    $(document).ready(function(){

        function send(){

            var url = `http://localhost:8000/feed/ajax/`;
            $.ajax({
                url: url,
                type: "get",
{{--                dataType: 'text',--}}
                success:function(response)
                {
                    console.log(response)
                    $('#postCard').prepend(response)

                    setTimeout(function(){
                        send();
                    }, 6000);
                }
            });
        }
        //Call our function

        setTimeout(send, 1000)
    });



@endsection

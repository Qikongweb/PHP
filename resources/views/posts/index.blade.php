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

                            <img style="height: 200px; width: 100%; display: block;" alt="Card image" class="cardImage" src={{ $post->image_url }} />
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
                                Posted {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }} minutes ago by  {{ $post->name }}
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

            $.ajax({
                url: 'http://localhost:8000/feed/ajax',
                type: "get",
                dataType: 'json',
                success:function(response)
                {
                    console.log(response['data'])
                    $('#postCard').empty();
                    response.data.forEach(item=>{cardInsert(item)})

                    setTimeout(function(){
                    send();
                    }, 10000);
                }
            });
        }
        //Call our function
                    send();
        setTimeout(send, 10000)
    });

    function cardInsert(data) {
        var time1 = new Date(data.created_at);
        var time2 = new Date();
        const timediff = diff_minutes(time1, time2);

        $('#postCard').append(
        `<div class="col-md-6">
            <div class="card mb-3">

                <img style="height: 200px; width: 100%; display: block;" alt="Card image" class="cardImage" src= />
                <div class="card-body">
                    <h5 class="card-title">${data.title}</h5>
                    <p class="card-text">${data.caption}</p>

                </div>

                <div class="card-footer text-muted">
                    Posted ${timediff} ago by  ${ data.name }
                </div>
            </div>
        </div>`
        )
        $('img').eq(data.id-1).attr('src',data.image_url);
    }

    function diff_minutes(dt2, dt1) {

        var diff = (dt2.getTime() - dt1.getTime()) / 1000;
        if(Math.abs(Math.round(diff/3600/24))>1)
        {
            return Math.abs(Math.round(diff/3600/24))+" days"
        }
        else if(Math.abs(Math.round(diff/3600))>1)
        {
            return Math.abs(Math.round(diff/3600)) + " hours"
        }
        else if(Math.abs(Math.round(diff/60))>1)
        {
            return Math.abs(Math.round(diff/60)) + " minutes"
        }
        else
        {
            return Math.abs(Math.round(diff)) + " seconds"
        }
    }

@endsection

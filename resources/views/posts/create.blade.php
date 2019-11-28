@extends('layouts.app')

@section('users')


    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-8">
                <h1 class="card-title">Create a Post</h1><br><br>

                <div class="row">
                    <form  action="/posts/" method="post" style="width:100%;" id="contact_us" onsubmit="formupdate()">

                        {{ csrf_field() }}


                        <div class="form-group ">
                            <label for="name" class=" col-form-label ">Title</label><br>
                            <div >
                                <input type="text" class="form-control" value='' name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="url" class=" col-form-label">Caption</label><br>
                            <div >
                                <input type="text" class="form-control"  value='' name="caption">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="url" class="col-form-label">Image Url</label><br>
                            <div >
                                <input type="text" class="form-control"  value='' name="image_url">
                            </div>
                        </div>


                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Publish</button>

                        @include('errors')

                    </form>

                </div>
            </div>
            @include('sidebar')
        </div>
    </div>


@endsection




@extends('layouts.app')

@section('users')

    @include('message')

<h1 class="card-title">Users Administration - Edit</h1>

    <form method="POST" action="/admin/users/{{ $user->id }}" style="margin-bottom: 1em">

        {{ method_field('PATCH') }}
        {{ csrf_field() }}


        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" value="{{ old('name',$user->name) }}" name="name">
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control " id="email" aria-describedby="emailHelp" value="{{ old('email',$user->email) }}" name="email">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2 col-form-label">
                <label class="col-form-label">Roles</label>
            </div>
            <div class="col-sm-10 ">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="1" name="type[]" {{ $user->is("post_moderator") ? 'checked':'' }}>
                        PostModerator
                    </label>
                </div>
                <div class="form-check ">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="2" name="type[]" {{ $user->is("theme_manager") ? 'checked':'' }}>
                        Theme Manager
                    </label>
                </div>
                <div class="form-check ">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="3" name="type[]" {{ $user->id === 1 ? "disabled": ""}} {{ $user->is("user_administrators") ? 'checked':'' }} >
                        User Administrator
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update </button>

        @include('errors')

    </form>


@endsection



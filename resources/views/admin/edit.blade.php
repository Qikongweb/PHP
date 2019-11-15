

@extends('layouts.app')

@section('users')
    @if (session('theme_create'))
        <div class="alert alert-dismissible alert-warning alert-danger" role="alert">
            {{ session('theme_create') }}
        </div>
    @endif



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
                        <input class="form-check-input" type="checkbox" value="1" name="type[]" {{ $user->is(1) ? 'checked':'' }}>
                        User Administrator
                    </label>
                </div>
                <div class="form-check ">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="2" name="type[]" {{ $user->is(2) ? 'checked':'' }}>
                        PostModerator
                    </label>
                </div>
                <div class="form-check ">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="3" name="type[]" {{ $user->is(3) ? 'checked':'' }}>
                        Theme Manager
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update </button>

        @include('errors')

    </form>


@endsection



@extends('layouts.app')

@section('users')

@if (session('status'))
    <div class="alert alert-dismissible alert-warning alert-danger" role="alert">
        {{ session('status') }}
    </div>
@endif

<h1 class="card-title">Users Administration</h1>
<form class="form-inline my-2 my-lg-0" action="/admin/users/search" method="post">

    {{ csrf_field() }}

    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="searchStr" value={{ old('searchStr') }}>
<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
</form>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $key=>$user)
    <tr class="{{ $key%2 == 0 ? 'table-active':'' }}">
        <th scope="row">{{ $user->name }}</th>
        <td>{{ $user->email }}</td>
        <td>
            <button type="button" class="btn btn-success"><a href="/admin/users/{{ $user->id }}/edit">Edit</a></button>
            <form action='/admin/users/{{ $user->id }}' method="post" class="d-inline" >

                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" {{ $user->id === 1 ? 'disabled':'' }}>Delete</button>

            </form>

        </td>
    </tr>
    @endforeach


    </tbody>
</table>

@endsection


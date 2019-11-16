@extends('layouts.app')

@section('users')

@include('message')

<h1 class="card-title">Bootstrap Themes Administration</h1>

    {{ csrf_field() }}

<button type="button" class="btn btn-info"><a href="{{ route('create') }}" class="nav-link">Create New</a></button>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">CDN Url</th>
        <th scope="col">is Default</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($themes as $key=>$theme)
    <tr class="{{ $key%2 == 0 ? 'table-active':'' }}">
        <th scope="row">{{ $theme->name }}</th>
        <td>{{ $theme->url }}</td>
        <td>{{ $theme->isDefault ? 'Yes' : 'No' }}</td>
        <td>
            <button type="button" class="btn btn-success"><a href="/admin/themes/{{ $theme->id }}/edit">Edit</a></button>
            <form action='/admin/themes/{{ $theme->id }}' method="post" class="d-inline" >

                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" >Delete</button>
{{--                where('to_be_used_by_user_id', '!=' , 2)--}}
            </form>

        </td>
    </tr>
    @endforeach


    </tbody>
</table>

@endsection


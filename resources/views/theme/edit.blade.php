@extends('layouts.app')

@section('users')

    <h1 class="card-title">Bootstrap Themes Administration - Edit</h1>
    <form  action="/admin/themes/{{ $theme->id }}" method="post">

        {{ method_field('PATCH') }}
        {{ csrf_field() }}


        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" value="{{ $theme->name }}" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">CDN Url</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  value="{{ $theme->url }}" name="url">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Make Default Theme</label>
            <div class="col-sm-10">
                <input class="form-check-input" type="checkbox" value="Yes" name="isDefault" style="width:40em;height:2em" {{ $theme->isDefault === 'Yes' ? 'checked' : '' }} >
            </div>
        </div>

        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Update</button>
    </form>

@endsection




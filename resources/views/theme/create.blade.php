@extends('layouts.app')

@section('users')

    <h1 class="card-title">Bootstrap Themes Administration - Create</h1>
    <form  action="/admin/themes" method="post">

        {{ csrf_field() }}


        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" value="" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">CDN Url</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  value="" name="url">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Make Default Theme</label>
            <div class="col-sm-10">
                <input class="form-check-input" type="checkbox" value="Yes" name="isDefault"  style="width:40em;height:2em" >
            </div>
        </div>

        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Submit</button>
    </form>

@endsection



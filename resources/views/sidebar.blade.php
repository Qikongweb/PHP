<div class="col-3">
    @auth
    <button type="submit" class="btn btn-primary btn-lg btn-block"><a href="/posts/create" class="btn">Post New Posts</a></button>
    @endauth
    <div class="form-group">
        <label for="exampleSelect1">Your current theme</label>
        <select class="form-control" id="exampleSelect1">
            @foreach ($themes as $theme)
                <option>{{ $theme->name }}</option>
            @endforeach
        </select>
    </div>
</div>


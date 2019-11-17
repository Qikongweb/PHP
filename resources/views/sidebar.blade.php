<div class="col-3">
    @auth
    <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="window.location.href='/posts/create'">Post New Posts</button>
    @endauth
    <div class="form-group">
        <h6>About Photo Feed</h6>
        <p>A light and flaky photo feed...feel free to post!</p>
        <h6>Your current theme</h6>
        <select class="form-control" id="exampleSelect1" onchange="top.location.href = '/admin/themes/'+this.options[this.selectedIndex].value">
            @foreach ($themes as $theme)
                @if(app('request')->cookie('theme'))
                    <option value={{ $theme->id }} {{ $theme->url === app('request')->cookie('theme')? 'selected': '' }}> {{ $theme->name }} </option>
                @else
                    <option value={{ $theme->id }} {{ $theme->isDefault ? 'selected': '' }}> {{ $theme->name }} </option>
                @endif
            @endforeach
        </select>
    </div>
</div>


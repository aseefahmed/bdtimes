<label for="username" class="col-sm-3 control-label">Districts</label>
<div class="col-sm-9">
    <select class="form-control select2js" style="width: 100%" name="districts" id="districts">
        <option value="{{ $parent_div}}">Choose District</option>
        @foreach($districts as $d)
            <option value="{{ $d->id }}">{{$d->district}}</option>
        @endforeach

    </select>
</div>

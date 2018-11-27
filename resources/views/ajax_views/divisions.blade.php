<label for="username" class="col-sm-3 control-label">Divisions</label>
<div class="col-sm-9">
    <select class="form-control select2js" style="width: 100%" name="divisions" id="divisions">
        <option value="0">Choose Division</option>
        @foreach($divisions as $d)
            <option value="{{ $d->id }}">{{$d->division}}</option>
        @endforeach

    </select>
</div>

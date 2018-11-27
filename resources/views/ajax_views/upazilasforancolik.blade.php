<label for="username" class="col-sm-3 control-label">Upazila</label>
<div class="col-sm-9">
    <select class="form-control select2js" style="width: 100%" name="upazilas" id="upazilas">
        <option value="0">Choose Upazila</option>
        @foreach($upazilas as $u)
            <option value="{{ $u->id }}">{{$u->upazila}}</option>
        @endforeach

    </select>
</div>

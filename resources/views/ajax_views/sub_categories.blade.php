<label for="username" class="col-sm-3 control-label">Sub Category</label>
  <div class="col-sm-9">
		<select class="form-control select2js" style="width: 100%" name="sub_categories" id="sub_categories">
		  <option value="{{ $parent_category}}">Choose Subcategory</option>
		  @foreach($sub_categories as $category)
			<option value="{{ $category->id }}">{{ $category->category_name }}</option>
		  @endforeach
		</select>
  </div>
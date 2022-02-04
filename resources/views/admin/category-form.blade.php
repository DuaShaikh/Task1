<div class="container categoryCard" >
    <div class="row mb-3">
        <label for="inputName3" class="col-sm-2 col-form-label">Category Name *</label>
        <div class="col-sm-10">
            <input type="hidden" value="{{old('',isset($category) ? $category->categoryMedia->id : '') }}" name="media_id" />
            <input type="hidden" value="{{old('',isset($category) ? $category->id : '') }}" name="id" />
            <input type="text" class="form-control @error('categoryName') is-invalid @enderror" name="categoryName" 
            value="{{ old('categoryName', isset($category) ? $category->categoryName : '') }}" />
            @error('categoryName')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputPrice" class="col-sm-2 col-form-label">Sub Category of</label>
        <div class="col-sm-10">
            <select id="inputCategory" class="form-control @error('parent_id') is-invalid @enderror" name = "parent_id"> 
            <option selected value="">Choose...</option>
            @foreach ($cate as $cat )
            <option value="{{$cat->id}}"  >{{$cat->categoryName}}</option>
            @endforeach
            @error('parent_id')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
            </select> 
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputPrice3" class="col-sm-2 col-form-label">Upload Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">
            @error('photo')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Save</button>
</div>
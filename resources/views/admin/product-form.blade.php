<div class="container" >
        <div class="row mb-3">
            <label for="inputName" class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10">
                <input type="hidden" value="{{old('',isset($products) ? $products->productMedia->id : '') }}" name="media_id" />
                <input type="hidden" value="{{old('',isset($products) ? $products->id : '') }}" name="id" />
                <input type="text" class="form-control @error('pName') is-invalid @enderror" name="pName" 
                value="{{ old('pName', isset($products) ? $products->pName : '') }}" />
                @error('pName')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" 
                value="{{ old('description', isset($products) ? $products->description : '') }}"  />
                @error('description')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                    <input type="text" class="form-control @error('productPrice') is-invalid @enderror" name="productPrice" 
                    value="{{ old('productPrice', isset($products) ? $products->productPrice : '') }}" >
                    @error('productPrice')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPrice" class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-10">
                <select id="inputCategory" class="form-control @error('category_id') is-invalid @enderror"name = "category_id"  required> 
                <option selected value="">Choose...</option>
                @foreach ($category as $cat )
                <option value="{{$cat->id}}"  >{{$cat->categoryName}}</option>
                @endforeach
                </select> 
                @error('category_id')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
        <div class="row mb-3">
        <label for="inputPrice3" class="col-sm-2 col-form-label">Upload Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"
            value="{{ old('', isset($products) ? $products->productMedia->url : '') }}" />
            @error('photo')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
        </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
</div>
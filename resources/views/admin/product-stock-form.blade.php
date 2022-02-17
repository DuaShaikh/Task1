<div class="container">
    <div class="row">
        <label for="inputPrice" class="col-sm-2 col-form-label mt-2">
            Product Id
        </label>
        <div class="col-sm-3 mt-2">
            <input type="text"
                class="form-control @error('quantity') is-invalid @enderror" 
                name="inStock[product_id]"
                value="{{$product}}" 
                required>
            @error('product_id')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
        </div>
    </div>
    <div class="row mb-3" >
        <label for="inputPrice" class="col-sm-2 col-form-label mt-2">
            Size
        </label>
      
        <div class="col-sm-3  mt-2 mb-2">
            @foreach ($stock as $key => $inStock )
            <input type="hidden" name="inStock[{{$key}}][product_id]" value={{$inStock->product_id}}>
            <select class="form-control form-control-sm @error('size') is-invalid @enderror" name="inStock[{{$key}}][size]" 
            required>
                <option selected value="">None</option>
                <option value="{{$inStock->size}}"> 
                    {{$inStock->size}}
                </option>
            </select>
            @endforeach
            @error('size')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPrice" class="col-sm-2 col-form-label mt-2">
            Quantity
        </label>
        <div class="col-sm-3 mt-2">
            @foreach ($stock as $key => $inStock )
            <input type="text" 
                class="form-control @error('quantity') is-invalid @enderror" 
                name="inStock[{{$key}}][quantity]"
                required value="{{old('quantity',isset($inStock) ? $inStock->quantity : '') }}" >
            @error('quantity')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
            @endforeach
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6">
            <input type="submit" class="btn btn-primary" value="Add">
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
            <a href="/admin/dashboard/product"><input type="button" class="btn btn-secondary" value="Go Back to All Products">
        </div>
    </div>
</div>
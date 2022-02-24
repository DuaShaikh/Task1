<div class="container-lg" style="margin-top:100px">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="col-md-3 mt-3">
                LATEST PRODUCTS
            </div>
            <div class="col-md-5">
                <div class="form"> 
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control form-input" placeholder="Search Product ..." wire:model='search'>  
                </div>
            </div>
            <label  class="col-md-1 mt-3 d-flex flex-row-reverse" for="inputSort" class="form-label">Sort By:</label>
            <div class="col-md-2 mt-2">
                <select  class="form-select" wire:model='sortBy'>
                  <option value="default" selected>Best Match</option>
                  <option value="low">Price low to high</option>
                  <option value="high">Price high to low</option>
                </select>
            </div>
            <div class="col-md-1 mt-3 d-flex flex-row-reverse" wire:click='closeCardDiv'>
                <i class="fas fa-align-justify p-1 {{$showDiv === 'true' ? '' : 'text-muted'}}"></i>
                <i class="fa fa-th p-1 {{$showDiv === 'true' ? 'text-muted' : ''}}"  ></i>
            </div>
        </div>
        @if ($showDiv)      
            <div class="card-body">
                <div class="product_item">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-4 mix sale product" style="display: inline-block; margin-left:70px"  data-bound="">
                            <div class="single_product">
                                <div class="product_image">
                                    <img src="{{url($product->productMedia->url)}}" alt="" style="width: 200px;height:200px">
                                    <div class="box-content">
                                        <a href="view-product/{{$product->id}}}"><i class="fas fa-eye"></i></a>
                                    </div>										
                                </div>
                                <div class="product_btm_text">
                                    <h4>{{$product->pName}}</h4>
                                    <span class="price">Rs.{{$product->productPrice}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <span>{{ $products->links()}}</span>
                </div>
            </div>
            @else
            <div class="container productCard mt-1">
                <table class="table table-striped ">
                    <thead class="table-dark" >
                            <tr>
                                <th scope="col" >Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col" colspan="3">Action</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product )
                            <tr>
                                <td><img src="{{url($product->productMedia->url)}}" alt="" style="width: 200px;height:200px"></td>
                                <td>{{$product->pName}}</td>
                                <td>Rs.{{$product->productPrice}}</td>
                                <td><a href="view-product/{{$product->id}}}"><i class="fas fa-eye" style="color: black"></i></a></td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <span>{{ $products->links() }}</span>
            </div>
        @endif
    </div>
</div>
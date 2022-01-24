
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-left: 750px;margin-top:100px">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Shopping Cart</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="col-xs-6 text-right">
                                            <h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
                                        </div>
                                       
                                            <select class="form-control" name="quantity" style="width: 100px">
                                                <option value="" selected>Quantity</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        <div class="col-xs-2">
                                            <button type="button" class="btn btn-link btn-xs">
                                                
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                               
                                {{-- <div class="row">
                                    <div class="text-center">
                                        <div class="col-xs-9">
                                            <h6 class="text-right">Added items?</h6>
                                        </div>
                                        <div class="col-xs-3">
                                            <button type="button" class="btn btn-default btn-sm btn-block">
                                                Update cart
                                            </button>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="panel-footer">
                                <div class="row text-center">
                                    <div class="col-xs-9">
                                        <h4 class="text-right">Total <strong>$50.00</strong></h4>
                                    </div>
                                    <div class="col-xs-3">
                                        <button type="button" class="btn btn-success btn-block">
                                            Checkout
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>Table</title>
</head>
<body>
    <x-header>
        {{-- <section>
            <div class="container">
                  
                <div class="row">
                  <div class="col-lg-12"  style="margin-bottom:20px">
                    <input type="text" name="search" id="searchbar" placeholder="Search">
                  </div>
                </div>
                
                  <table class="table table-striped table-borderless" id="table_data" >
                    <thead>
                      <tr style="font-family: monospace; font-size: 12px">
                        <th scope="col" >Name</th>
                        <th scope="col">Discription</th>
                        <th scope="col">Associated Profile</th>
                        <th scope="col" colspan="3"> Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                      <tr>
                        <td>Duaa</td>
                        <td>xyz</td>
                        <td></td>
                        <td><a href="#" > <i class="fas fa-pencil-alt"></i></a></td>
                        <td><a href="#" ><i class="far fa-copy"></i> </a></td>
                        <td><a href="#"> <i class="fas fa-trash"> </i> </a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </section>    --}}
    
        
            
          <!-- --------------------------------Form----------------------------------- -->
        
        
{{-- <section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered  modal-lg" >
            <div class="modal-content">
                    <div >
                      <h5 class="modal-title" >Add Deferral Reason</h5>
                    </div>
                <div class="modal-body" style="padding: 30px;">
                  <form method="post" action="function.php" >
                      <div class="container">
                          <div class="row mb-3">
                            <div class="col-sm-10">
                              <input type="text" class="form-control" placeholder="Display Name" name="name" >
                              <input type="hidden" name="function" value="submitForm">
                            </div>
                          </div>
                          <div class="row mb-3">
                              <div class="col-sm-10" style="padding-bottom: 30px">
                                <input type="text" class="form-control" placeholder="Description" name="description">
                              </div>
                          </div>
                          <div class="row g-2">
                              <div class="col-md">
                                  <h5 style="font-size: 20px; margin-top: 10px;">
                                      Deferral Period
                                    </h5>
                              </div>
                              <div class="col-md ">
                                  <div class="form-floating">
                                    <select class="form-select" id="floatingSelectGrid" name="interval" aria-label="Floating label select example" >
                                      <option selected>None</option>
                                      <option value="m">One</option>
                                      <option value="d">Two</option>
                                      <option value="y">Three</option>
                                    </select>
                                    <label for="floatingSelectGrid">Interval</label>
                                  </div>
                                </div>
                              <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="name@example.com" name="count">
                                    <label for="floatingInputGrid" style="color: gray;">Count</label>
                                  </div>
                              </div>
                          </div>
                          <div class="row g-2">
                              <div class="col-md">
                                <h5 class="col-form-label col" >Calculate Deferral Period Form:</h5>
                              </div>
                              <div class="col-sm-10">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="compute" id="gridRadios1" value="1" checked>
                                  <label class="form-check-label" for="gridRadios1">
                                    Occurrence Date Capture in the Questionnaire
                                  </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="compute" id="gridRadios1" value="0" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                      From Appearance Date as Confidential
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="confidential" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Treat This Deferral as Confidential
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="override" value="1" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                      Require Supervisor Override to Post this Deferral
                                    </label>
                                </div>
                            </div>
                         </div>
                        
                          <select class="form-select" aria-label="Default select example" name="lookback" style="margin-top: 30px;">
                              <option selected>LookBack Perform</option>
                              <option value="TY">One</option>
                              <option value="ASAP">Two</option>
                              <option value="MP">Three</option>
                            </select>
                            <select class="form-select" aria-label="Default select example" name="deferralType" style="margin-top: 30px;">
                              <option selected>Deferral Type</option>
                              <option value="primary">One</option>
                              <option value="secondary">Two</option>
                            </select>
            
                        <div class="row" >
                            <div class="col-md-6">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button>
                            </div>
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
        
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
    </section> --}}
        
            {{-- <footer class="page-footer font-small blue-grey lighten-5" >
                <div class="col-md-2" >
                  <div class="footer-copyright text-center text-black-50 ">Cloud Dashboard</div>
                </div>
                <div class="col-md-2">
                  <div class="footer-copyright text-center text-black-50 ">© BBCS 2021 All Right Reserved</div>
                </div>
                <div class="col-md-2">
                  <div class="footer-copyright text-center text-black-50 ">midgard Environment . Version 0.5</div>
                </div>
            </footer> --}}
</body>
</html>
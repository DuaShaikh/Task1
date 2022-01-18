<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
</head>
<body>
    <div class="container"style="margin-top:-40px">
        <div class="heading " >
          <div class="container" >
            <div class="row">
              <div class="col-md-9">
                <h3 class="deferrals" style="margin-top:120px;"> <b style="color: black;">Deferrals</b> Define your deferrals reasons </h3>
              </div>
              <div class="col">
                <i class="far fa-globe"></i>
                <i class="far fa-history"></i>
                <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap" style="margin-top: 100px; margin-bottom:20px;">Add</button>
              </div>
            </div>
          </div>
        </div>
      </div>
              
          <!-- --------------------------------Form----------------------------------- -->
        
        
<section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered  modal-lg" >
            <div class="modal-content">
                    <div >
                      <h5 class="modal-title" >Add Deferral Reason</h5>
                    </div>
                <div class="modal-body" style="padding: 30px;">
                  <form method="post" action="table" >
                      <div class="container">
                          <div class="row mb-5">
                            <div class="col-sm-10">
                              @csrf
                              <input type="text" class="form-control" placeholder="Display Name" name="name" required>
                              <span style="color:red; margin-left:20px">@error('name'){{$message}}@enderror</span><br>
                              {{-- <input type="hidden" name="function" value="submitForm"> --}}
                            </div>
                          </div>
                          <div class="row mb-5">
                              <div class="col-sm-10" style="padding-bottom: 30px">
                                <input type="text" class="form-control" placeholder="Description" name="description" required>
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
                                    <select class="form-select" id="floatingSelectGrid" name="interval" aria-label="Floating label select example" required>
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
                                    <label for="floatingInputGrid" style="color: gray; margin-left:10px">Count</label>
                                  </div>
                              </div>
                          </div>
                          <div class="row g-2">
                              <div class="col-md-10">
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
    </section>
</body>
</html>
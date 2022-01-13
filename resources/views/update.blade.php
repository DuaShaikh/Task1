@extends('layout.master')
@section('title','Update')


@section('main')
<div class="container" class="updateForm" style="border:1px solid gray; margin-top:20px; width:650px; margin-bottom:100px; border-radius:20px">
    <form method="post" action="update" >
        <div class="container">
                  <h4 class="edit"> Update Deferral Record </h4>
          
                <div class="row mb-3">
                  <label for="inputName" class="col-sm-2 col-form-label Label">Name</label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control"  name="id" value="{{$users->id}}">
                        <input type="text" class="form-control" placeholder="Display Name" name="name" value="{{$users->name}}">
                        <input type="hidden" name="function" value="update">
                    </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDescription" class="col-sm-2 col-form-label Label">Description</label>
                    <div class="col-sm-10" style="padding-bottom: 30px">
                      <input type="text" class="form-control" placeholder="Description" name="description" value="{{$users->description}}" > 
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
                          <select class="form-select" id="floatingSelectGrid" name="interval" aria-label="Floating label select example" value="{{$users->interval}}">
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
                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="name@example.com" name="count" value="{{$users->count}}" >
                        <label for="floatingInputGrid" style="color: gray;">Count</label>
                      </div>
                    </div>
                </div>
                <div class="row mb-0">
                      <div class="col-md">
                        <h5 class="col-form-label col" >Calculate Deferral Period Form:</h5>
                      </div>

                  <div class="col-sm-10">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="compute" id="gridRadios1"  checked value="1">
                          <label class="form-check-label" for="gridRadios1">
                            Occurrence Date Capture in the Questionnaire
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="compute" id="gridRadios1"  checked value="0">
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
                          <input class="form-check-input" type="checkbox" name="override" value="1" id="flexCheckChecked" >
                          <label class="form-check-label" for="flexCheckChecked">
                            Require Supervisor Override to Post this Deferral
                          </label>
                      </div>
                  </div>
                       <select class="form-select" aria-label="Default select example" name="lookback" style="margin-top: 30px;" >
                          <option selected>LookBack Perform</option>
                          <option value="TY" >One</option>
                          <option value="ASAP">Two</option>
                          <option value="MP">Three</option>
                        </select>
                        <select class="form-select" aria-label="Default select example" name="deferralType" style="margin-top: 30px;" >
                          <option selected>Deferral Type</option>
                          <option value="primary">One</option>
                          <option value="secondary">Two</option>
                        </select>
                </div>

              <div class="row" >
                <div class="col-md-6" class="updateButton">
                  <button type="submit"  style="background-color:rgb(6, 83, 155); margin-left:210px; margin-bottom:20px;height:50px;width:150px;border-radius:30px;color:white;margin-top:20px">Save</button>
                </div>
              </div>
     </div>
   </form>
</div>   
@endsection


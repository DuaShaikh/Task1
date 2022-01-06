<?php 
session_start();

$row = $_SESSION['deferral'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Update</title>
</head>
<body>
<section>
<div class="container" class="updateForm" style="border:1px solid gray; margin-top:20px; width:650px">
 
            <form method="post" action="function.php" >
               <div class="container">
            <h4 style="margin-top:30px"> Update Deferral Record </h4>
          
                <div class="row mb-3">

                  <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                   <input type="hidden" class="form-control"  name="id" value="<?php echo $row->id ?>">
                    <input type="text" class="form-control" placeholder="Display Name" name="name" value="<?php echo $row->name ?>">
                    <input type="hidden" name="function" value="update">
                    
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10" style="padding-bottom: 30px">
                    <input type="text" class="form-control" placeholder="Description" name="description" value="<?php echo $row->description?>" > 
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
                          <select class="form-select" id="floatingSelectGrid" name="interval" aria-label="Floating label select example" value="<?php echo $row->interval?>">
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
                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="name@example.com" name="count" value="<?php echo $row->count ?>" >
                        <label for="floatingInputGrid" style="color: gray;">Count</label>
                      </div>
                    </div>
                  </div>
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
        <button type="submit"  style="background-color:rgb(6, 83, 155); margin-left:180px; margin-bottom:20px;height:50px;width:150px;border-radius:30px;color:white;margin-top:20px">Save</button>
        </div>
        </div>
        </div>
              </form>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>


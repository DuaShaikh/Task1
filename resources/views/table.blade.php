@extends('layout.master')
@section('title','Table')
@section('main')
     
  
<x-form />
  <section>
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
              @foreach($users as $deferral)
              <tr>
                <td>{{$deferral->name}}</td>
                <td>{{$deferral->description}}</td>
                <td></td>
                <td><a href="#" > <i class="fas fa-pencil-alt"></i></a></td>
                <td><a href="#" ><i class="far fa-copy"></i> </a></td>
                <td><a href="{{ URL::to('table?' . $deferral->id) }}"> <i class="fas fa-trash"> </i> </a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </section>   
    
@endsection  
   

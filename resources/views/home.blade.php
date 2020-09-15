@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <strong>
        <span class="glyphicon glyphicon-th"></span>
        <span>Panel de control</span>
    </div>
     <div class="panel-body">
      <table class="table table-bordered">
        <thead>
        
          <tr>
            <th class="text-center">AO-1
           
            <span class="label label-danger"> {{"Asignado"}}</span>
          
            <span class="label label-success"> {{"Libre"}}</span>
         
            </th>
            <th class="text-center">AO-2</th>
            <th class="text-center" >AO-3</th>
            <th class="text-center">AO-4</th>
            <th class="text-center">AO-5</th>
          </tr>
        
        </thead>
     </table>
     <h2 style="text-aling: center;">
        <i class="fas fa-share" style="font-size: 30px;"></i>
        ENTRADA
    </h2>

     <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">MO-1</th>
            <th class="text-center">MO-2</th>
            <th class="text-center" >MO-3</th>
            <th class="text-center">MO-4</th>
            <th class="text-center">MO-5</th>
            <th class="text-center">MO-6</th>
            <th class="text-center">MO-7</th>
            <th class="text-center">MO-8</th>
            <th class="text-center">MO-9</th>
            <th class="text-center">MO-10</th>
          </tr>
          <tr>
            <th class="text-center">MS-1</th>
            <th class="text-center">MS-2</th>
            <th class="text-center" >MS-3</th>
            <th class="text-center">MS-4</th>
            <th class="text-center">MS-5</th>
            <th class="text-center">MS-6</th>
            <th class="text-center">MS-7</th>
            <th class="text-center">MS-8</th>
            <th class="text-center">MS-9</th>
            <th class="text-center">MS-10</th>
          </tr>
        </thead>
     </table>
     <h2 style="text-aling: center;">
        <i class="fas fa-arrow-right" style="font-size: 30px;"></i>
        ENTRADA
    </h2>
     <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">B-1</th>
            <th class="text-center">B-2</th>
            <th class="text-center" >B-3</th>
            <th class="text-center">B-4</th>
            <th class="text-center">B-5</th>
            <th class="text-center">B-6</th>
            <th class="text-center">B-7</th>
            <th class="text-center">B-8</th>
            <th class="text-center">B-9</th>
            <th class="text-center">B-10</th>
          </tr>
        </thead>
     </table>
     <h2 style="text-aling: center;">
        <i class="fas fa-share" style="font-size: 30px;"></i>
        ENTRADA
    </h2>
     <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">AS-1</th>
            <th class="text-center">AS-2</th>
            <th class="text-center" >AS-3</th>
            <th class="text-center">AS-4</th>
            <th class="text-center">AS-5</th>
          </tr>
        </thead>
     </table>

     <div class="row">
     </div>
    </div>
  </div>
</div>
  @endsection

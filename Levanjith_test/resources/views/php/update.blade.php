@extends('layouts.app')
@section('content')
<form action="{{url('/postupdate')}}" method="Post">

<div class="container">
        
{{-- {!! Form::open(['name' => 'change-client', 'class' => 'change-client']) !!} --}}
@foreach ($editdata as $value)
<input id="ids" type="text" hidden  name="id"  value="{{$value->id}}"  class="form-control" >

  <div class="col-md-12">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="last_name">First name</label>
        <input id="fname" class="form-control input-cl" required type="text" name="fname" value="{{$value->fname}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="from">D S Divition</label>
          {{-- <select class="form-control input-cl"  name="divition"  id="divition">
                <option value="{!! $value->divition !!}">{!! $value->divition !!}</option>
          </select> --}}
          <select class="form-control input-cl" required  id="divition" name="divition">
            <option value="" selected>select..</option>
            <option value="Colombo1">Colombo 1</option>
            <option value="Colombo2">Colombo 2</option>
            <option value="Colombo3">Colombo 3</option>
            <option value="Colombo4">Colombo 4</option>
            <option value="Colombo5">Colombo 5</option>
            <option value="Colombo6">Colombo 6</option>
            <option value="Colombo7">Colombo 7</option>
            <option value="Colombo8">Colombo 8</option>
            <option value="Colombo9">Colombo 9</option>
            <option value="Colombo10">Colombo 10</option>
            </select>
      </div>
    </div>
   </div>
  </div>


  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="from">last name</label>
          <input id="lname" class="form-control input-cl" required type="text" name="lname" value="{{$value->lname}}">
        </div>
      </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="from">Date of Birth</label>
        <input id="dob" class="form-control input-cl" required type="text" name="dob" value="{{$value->dob}}">
      </div>
    </div>
  </div>
  </div>



          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="from">Summery</label><br>
                  <input id="summery"  class="form-control input-cl" type="text" name="summery" value="{{$value->summery}}">
                </div>
              </div>
            <div class="col-md-6">

            </div>
          </div>
          </div>

     @endforeach
        <br><br><br>

          <div class="modal-footer">
                <button class="btn btn-success"   type="submit"  >Update</button>

                {{-- {!! Form::close() !!} --}}
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>


      </div>
</form>
@endsection
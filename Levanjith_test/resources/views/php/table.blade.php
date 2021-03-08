@extends('layouts.app')
@section('content')
@include('module.editmodle')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">



<div class="container">

  <h2>Accura Member List</h2><br><br>
  <a href="{{url('phptable')}}"  class="addmem btn btn-primary">Php Table</a>
  <a href="{{url('home')}} "class="addmem btn btn-primary">Add New Member</a><br>
  <div class="topnav"><br>
    <p>Serch</a>
    {{-- <form action="/search" method="GET"> --}}
    <form action="/phptable" method="GET">
      <input type="text" placeholder="Search.." name="search" />
      <input type="submit" value="Go" />
  </form>

    <form action="/multiserch" method="GET">
      <div class="com-md-12">    
        <select   name="fname" >  
          <option></option>
        @foreach ($typesr as $value)
        <option>{{$value->fname}}</option>
        @endforeach
      </select>      
      {{-- <input type="submit" value="Go" /> --}}
    </div>
      <div class="com-md-12">
        <select   name="status" >  
          {{-- @foreach ($typesr as $value)
          <option>{{$value->member_status_id}}</option>
          @endforeach --}}
          <option></option>
          <?php foreach ($typesr as $srow): ?>
          <option value="<?php print $srow['id']; ?>" ><?php print $srow['member_status_id']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
  

    
    <input type="submit" value="Go" />
 </form>

  </div> 
  <table id="view_table"  class="table table-striped table-bordered view_table" style="width: 100%;">
    <thead class="thead-dark">
      <tr >
        <td>#</td>
        <td> <a href="{{url('shortby_fname')}}"  >ShortBy_Name</a></td>
        <td> <a href="{{url('shortby_lname')}}"  >ShortBy_Lname</a></td>
        <td> <a href="{{url('shortby_divition')}}"  >ShortBy_Divition</a></td>
        <td> <a href="{{url('shortby_dob')}}"  >ShortBy_dob</a></td>
        <td> <a href="{{url('phptable')}}/?name=aaa"  >aaa</a></td>
        <td></td>
      </tr>
        <tr>
          <th>#</th>
          <th>fname</th>
          <th>lname</th>
          <th>divition</th>
          <th>dob</th>
          <th>summery</th>
          <th>action</th>
        </tr>
      </thead>
  
            <tbody  class="tbody-light">
              @foreach ($types as $value)
              <tr>
              <td>{{$value->id}}</td>
              <td>{{$value->fname}}</td>
              <td>{{$value->member_status->name}}</td>
              <td>{{$value->divition}}</td>
              <td>{{$value->member_status_id}}</td>
              <td>{{$value->summery}}</td>  
                <td>{{$value->image}}</td>  
              <td><a class="btn btn-primary btn-edit" type="submit"  href="newedit/{{$value->id}}" >Edit</a>
                 <a class="btn btn-danger btn-delete"  type="submit"   href="newdel/{{$value->id}}" >Delete</a> </td>
              </tr>                                                                                                                        
              @endforeach 
                    
          </tbody>
        </table>
        
        {{-- {{$types->links()}} --}}
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>


@endsection

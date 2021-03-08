@extends('layouts.app')
@section('content')
@include('module.editmodle')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">



<div class="container">
  <h2>Accura Member List</h2><br><br>
  <a href="{{url('phptable')}}"  class="addmem btn btn-primary">Php Table</a>
  <a href="{{url('home')}} "class="addmem btn btn-primary">Add New Member</a>

  <table id="view_table"  class="table table-striped table-bordered view_table" style="width: 100%;">

    
    <thead class="thead-dark">
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
                    
          </tbody>
        </table>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<script type="text/javascript">

 var datatable = $('#view_table').DataTable({
  processing: true,
  serverSide: true,
  ajax: '{{url('get-clients')}}',
  columns: [
      {data: 'id', name: 'id'}, 
      {data: 'fname', name: 'fname'},
      {data:'lname', name:'lname'},
      {data:'divition', name:'divition'},
      {data:'dob', name:'dob'},
      {data:'summery', name:'summery'},
      {data: 'action', name: 'action', orderable: false}
  ],
});


function abcd(id){
  $('#ok').css('display', 'inline')
}

//edit
$('.view_table').on('click', '.btn-edit', function(){
  var av_id = $(this).data('id')
//   getDoctor(av_id)
// })
// function getDoctor(av_id){
  $.ajax({
    url: '{{url('get-client-id')}}/'+av_id,
    type: 'GET'
  })
  .done(function(data){
    console.log(data);
    $('#av_id').val(av_id)  
    editodal(data)
  })
})

function editodal(data){
  $('#ids').val(data.id)
  $('#fname').val(data.fname)
  $('#lname').val(data.lname)
  $('#divition').val(data.divition)
  $('#dob').val(data.dob)
  $('#summery').val(data.summery)
}

//update
$('#btnEditAvailable').on('click', function(){
  var formData = $('.change-client').serialize()
  console.log(formData);
  $.ajax({
    url: '{{url('change-client')}}',
    type: 'POST',
    data: formData
  })
  .done(function(data){
    if(data.msg){
      swal({
        text: data.msg,
        icon: 'success'
      })
      datatable.ajax.reload()
      clearModal()
      $('#addAvailableModal').modal('hide')
    }
    if(data.errors){
      swal({
       text: data.errors[0],
       icon: 'warning'
      })
    }
  })
})

function clearModal(){
  $('.input-cl').val('')

}

//delete
$('.view_table').on('click', '.btn-delete', function(){
  var av_id = $(this).data('id')
  if(confirm('Are you sure you want to Delete?')){
      $.ajax ({
      url:'{{url('client-del')}}/'+av_id,
      type:'GET'
    })

    .done(function(data){
    if(data.msg){
      swal({
        text: data.msg,
        icon: 'success'
      })
      datatable.ajax.reload()
      clearModal()
      $('#addAvailableModal').modal('hide')
    }
    if(data.errors){
      swal({
       text: data.errors[0],
       icon: 'warning'
      })
    }
  })

  }
  else{}

})


</script>
{{-- <style>
  .addmem {
  position: absolute;
  left: 380px;
}
  </style> --}}
@endsection

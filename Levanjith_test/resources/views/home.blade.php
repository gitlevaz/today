@extends('layouts.app')
@section('content')
{{-- @include('module.editmodle') --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

<div class="container">
  <br>
  <h2>Add Accura Member</h2><br><br>
  
<form action="add_available" method="POST" id="myForm" enctype="multipart/form-data">
  {{-- {!! Form::open(['name' => 'add_availables', 'class' => 'add_availables']) !!} --}}

  <div class="col-md-12">
    <div class="row">
    <div class="col-md-6">
      <div class="form-group">
      
        <label for="last_name">First name</label>
        <?php if (isset($sucess)) { ?>
            <span id='message' style="color: green;"><?php echo $sucess; ?></span><br><br>
        <?php   } ?>
        <input id="fname" class="form-control input-cl"  type="text" name="fname" value="">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="from">D S Divition</label>
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
          <input id="lname" class="form-control input-cl" required type="text" name="lname" value="">
        </div>
      </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="from">Date of Birth</label>
        <input id="dob" class="form-control input-cl"  required type="date" name="dob" value="">
      </div>
    </div>
  </div>
  </div>



  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="from">Summery</label><br>
          <textarea id="summery" name="summery" rows="4" required cols="50"></textarea>
          {{-- <input id="summery" height="248" class="form-control input-cl" type="text" name="summery" value=""> --}}
        </div>
      </div>
    <div class="col-md-6">

    </div>
  </div>
  </div>


    <button class="btn btn-primary btn-add-image" type="button" name="button">Add Image</button>
    <div class="images">
      <div class="form-group">
        <label for="image">Image (maximum 2MB)</label><br>
        <img id="thumb1" src="" alt="" width="200" height="200">
        <input onchange="previewFile('thumb1', 'img1')" required id="img1" type="file" name="images[]" class="py-2">
        {{-- <input class="form-control input-cl" type="file" name="image" value=""> --}}
        <div>{{ $errors->first('image') }}</div>
      </div>
    </div>

           <a href="{{url('table')}}" style="color: darkblue"><-Back</a>	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	

            <button class="btn btn-primary main-class"  type="submit" >
              <img width="50" height="50" id="loading" src="{{asset('images/spinner.gif')}}" alt="" style="display:none;">
              save</button>
              <img width="50" height="50" id="ok" src="{{asset('images/Capture.PNG')}}" alt="" style="display:none;">
              &nbsp;	&nbsp;	&nbsp;	
              <input type="button" class="btn btn-warning main-class" value="Reset" onclick="myFunction()"  type="">
                
        {{-- {!! Form::close() !!} --}}
   </form><br>
    </div>
@error('fname') {{ $message }} @enderror

    {{-- @foreach ($users as $datas)
    <img class="d-block w-100 imclz" src="/images/{{$datas->image}}" style="width: 30% !important" alt="First slide">
  @endforeach --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<script type="text/javascript">

function myFunction() {
  document.getElementById("myForm").reset();
}

    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }


    function previewFile(thumb_id, img_id) {
  console.log(img_id);
  var preview = $('.images #'+thumb_id);
  var file    = $('.images #'+img_id).get(0).files[0];

  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.attr('src', reader.result);
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}
// Add new image
let img_count = 1;
$('.btn-add-image').on('click', function(){
  img_count += 1
  let img_id = 'img'+img_count+''
  let thumb_id = 'thumb'+img_count+''

  $('.images').append('<div class="form-group image'+img_count+'">'
                        +'<label for="image">Image (maximum 2MB)</label><br>'
                        +'<img id="thumb'+img_count+'" src="" alt="" width="200" height="200">'
                        +'<input onchange="previewFile(\''+thumb_id+'\',\''+img_id+'\')" id="img'+img_count+'" type="file" name="images[]" class="py-2">'
                        +'<button onclick="removeImage('+img_count+')" class="btn btn-danger btn-img-remove" type="button" name="button">X</button>'
                      +'</div>')
})
function removeImage(id){
  $('.images .image'+id).remove()
}

</script>
<style>
  .container {
  background-color: #a9a7b9  !important;
}
</style>
@endsection

<div id="addAvailableModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Accura Members</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <div class="modal-body">
        
{!! Form::open(['name' => 'change-client', 'class' => 'change-client']) !!}

<div class="col-sm-12 col-md-12">
        <div class="form-group">
        <div class="row">
            <label class="control-label col-sm-4" for="" style="padding-top: 5px;">id :</label>
              <div class="col-sm-8">
                    <input id="ids" type="text" readonly  name="id" value=""  class="form-control" >
                </div>
              </div>
        </div>
    </div><br><br>


                
  <div class="col-md-12">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="last_name">First name</label>
        <input id="fname" class="form-control input-cl" type="text" name="fname" value="">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="from">D S Divition</label>
          <select class="form-control input-cl"  name="divition"  id="divition">
            @foreach($types as $type)
                <option value="{!! $type->divition !!}">{!! $type->divition !!}</option>
            @endforeach
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
          <input id="lname" class="form-control input-cl" type="text" name="lname" value="">
        </div>
      </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="from">Date of Birth</label>
        <input id="dob" class="form-control input-cl" type="date" name="dob" value="">
      </div>
    </div>
  </div>
  </div>



          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="from">Summery</label><br>
                  <input id="summery"  class="form-control input-cl" type="text" name="summery" value="">
                </div>
              </div>
            <div class="col-md-6">

            </div>
          </div>
          </div>

     
        <br><br><br>

          <div class="modal-footer">
                <button class="btn btn-success"  type="button" id="btnEditAvailable"  >Update</button>

                {!! Form::close() !!}
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>

</div>

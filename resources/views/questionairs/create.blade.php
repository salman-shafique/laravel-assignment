@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <form action="{{ url('questionairs/store') }}" method="POST" class="form-horizontal">
<fieldset>

<h2>Create </h2>
<!-- Text input-->


<div class="form-group">
  <label class="col-md-4 control-label" for="Name">Questionairs Name</label>  
  <div class="col-md-5">
  <input id="Name" name="name" type="text" placeholder="Enter Questionairs Name" class="form-control input-md" required="">
    
  </div>
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mobilenumber">Duration</label>  
  <div class="col-md-2">
  <input id="duration" name="duration" type="number" placeholder="Enter Duration" class="form-control input-md" required="">
  </div>
  <div class="col-md-3">
    <select id="time" name="time" class="form-control">
      <option value="min">Minutes</option>
      <option value="hour">Hours</option>

    </select>
  </div>  
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="resume">Can Resume?</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="gender-0">
      <input type="radio" name="resume"  value="1" checked="checked">
      Yes
    </label> 
    <label class="radio-inline" for="gender-1">
      <input type="radio" name="resume"  value="0">
      No
    </label>
  </div>
</div>





<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-success">Save</button>
  </div>
</div>


</fieldset>
</form>
    </div>
</div>   
@endsection
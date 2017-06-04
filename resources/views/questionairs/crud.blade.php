@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="form-horizontal">
            <fieldset>
               
                <h2>Add Questions 
                    <button class="btn btn-info btn-md pull-right add_question"  >
                    <span class="glyphicon glyphicon-plus"></span>
                    Add Question
                    </button>
                </h2>
               <!--  <form action="{{ url('questions/crud') }}" method="POST"> -->
                <div id="{{$id}}" class="Questions_main_container">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-success save_Q">Save</button>
                    </div>
                </div>
              <!--  </form>  -->
            </fieldset>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row main_row" id="{{ url('questionairs/destroy') }}">
        <div class="col-md-12">
            <h2>Questionairs 
                <a href="{{ url('questionairs/create') }}" class="btn btn-info btn-md pull-right"  >
                <span class="glyphicon glyphicon-plus"></span>
                Add Questionair
                </a>
            </h2>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th>id</th>
                        <th>Name</th>
                        <th>Number of Questions</th>
                        <th>Duration</th>
                        <th>Resumeable</th>
                        <th>Published</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($result as $data)
                        <tr id="{{$data->id}}">
                            <td class="record_id" data-id="{{$data->id}}">{{$data->id}}</td>
                            <td class="record_name" data-name="{{$data->name}}">{{$data->name}}</td><!-- $data->user->name -->
                            <td> 0 
                                <a href="{{ url('questionairs/crud') }}/{{$data->id}}" class="btn btn-success btn-xs pull-right"  >
                                <span class="glyphicon glyphicon-plus"></span>
                                </a>
                            </td>
                            <td class="record_duration" data-duration="{{$data->duration}}" data-time="{{$data->time}}">{{$data->duration}} {{$data->time}}</td>
                            <td class="record_resumeable" data-resumeable="{{$data->resumeable}}">@if($data->resumeable ==1 )Yes @else No @endif</td>
                            <td>
                                @if($data->publish ==1 )Yes @else No @endif
                            </td>
                            <td>
                                <span>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button class="btn btn-primary btn-xs pull-left edit_record" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                        <span class="glyphicon glyphicon-pencil"></span></button>
                                    </p>
                                </span>
                                <span>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                                        <button class="btn btn-danger btn-xs pull-right delete_btn" data-title="Delete" data-toggle="modal" data-target="#delete" >
                                        <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </p>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
     <form action="{{ url('questionairs/update') }}" method="POST" class="form-horizontal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
            </div>
            <div class="modal-body">
               
                    <fieldset>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Name">Questionairs Name</label>  
                            <div class="col-md-6">
                                <input id="name" name="name" type="text" placeholder="Enter Questionairs Name" class="form-control input-md" required="">
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input id="id" type="hidden" name="id" >
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="mobilenumber">Duration</label>  
                            <div class="col-md-3">
                                <input id="duration" name="duration" type="number" placeholder="Enter Duration" class="form-control input-md" required="">
                            </div>
                            <div class="col-md-3 time">
                                <select id="time" name="time" class="form-control">
                                    <option id="min" value="min">Minutes</option>
                                    <option id="hour" value="hour">Hours</option>
                                </select>
                            </div>
                        </div>
                        <!-- Multiple Radios (inline) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="resume">Can Resume?</label>
                            <div class="col-md-4"> 
                                <label class="radio-inline" for="time">
                                <input id="radio1" type="radio" name="resume"  value="1" >
                                Yes
                                </label> 
                                <label class="radio-inline" for="time">
                                <input id="radio2" type="radio" name="resume"  value="0">
                                No
                                </label>
                            </div>
                        </div>

                    </fieldset>
               
            </div>
            <div class="modal-footer ">
                <button id="submit" name="submit" type="submit" class="btn btn-warning btn-lg" style="width: 100%;" >
                    <span class="glyphicon glyphicon-ok-sign"></span> Update
                </button>
            </div>
        </div>
        <!-- /.modal-content --> 
 </form>
    </div>
    <!-- /.modal-dialog --> 
</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
    </div>
    <div class="modal-footer ">
        <button type="button" class="btn btn-success confirm_btn" data-dismiss="modal" >
        <span class="glyphicon glyphicon-ok-sign "></span> Yes
        </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">
        <span class="glyphicon glyphicon-remove"></span> No
        </button>
    </div>
</div>
<!-- /.modal-content -->     
@endsection
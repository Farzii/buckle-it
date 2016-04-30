@extends('admin::layouts.master')

@section('content-header')
<h1>
    {{$requirement->reference_number .' '. $requirement->title}}
</h1>
@stop
@section('script')
<script src="{{asset('/modules/Requirements/js/custom.js')}}"></script>
@stop
@section('content')
<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-8">
            <div class="row">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#image" data-toggle="tab" aria-expanded="false">Images</a></li>
                        <li class=""><a href="#files" data-toggle="tab" aria-expanded="false">Files</a></li>
                        <li class=""><a href="#log" data-toggle="tab" aria-expanded="true">Log</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="image">
                            {!!Form::open(['route'=>['upload-requirement-image',$requirement->id],'files'=>true,'id'=>'upload-requirement-image'])!!}
                            {!!Form::file('requirement_image',['accept'=>'image/*','class'=>'hidden','id'=>'requirement_image','onchange'=>"$('#upload-requirement-image').submit()"])!!}
                            <a class="btn btn-primary"  onclick="$('#requirement_image').click()"> 
                                Add Image 
                            </a>
                            <div class="clearfix"></div>
                            <p></p>
                            {!!Form::close()!!}
                            @foreach($images as $image)
                            <div class="col-sm-12 margin-bottom">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <img src="{{asset('files/images/'.$image->path)}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-2 text-right">
                                        <div class="row">

                                            <a class="btn btn-primary" style=" vertical-align: top; margin-bottom: 5px;">
                                                <i class="fa fa-comments"></i> <span class="badge">0</span>
                                            </a>
                                            {!! Form::open( array('route' => array('file-delete', $image->id ),'role' => 'form','method' => 'Delete','onClick'=>"return confirm('Are you sure you want to delete?')")) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <p></p>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="files">
                            {!!Form::open(['route'=>['upload-requirement-file',$requirement->id],'files'=>true,'id'=>'upload-requirement-file'])!!}
                            {!!Form::file('requirement_file',['class'=>'hidden','id'=>'requirement_file','onchange'=>"$('#upload-requirement-file').submit()"])!!}
                            <a class="btn btn-primary"  onclick="$('#requirement_file').click()"> 
                                Add File 
                            </a>
                            <div class="clearfix"></div>
                            <p></p>
                            {!!Form::close()!!}
                            @if(count($files))
                            <h3>
                                Files
                            </h3>
                            <hr>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                @foreach($files as $file)
                                <tr>
                                    <td>
                                        <a target="blank" href="{{public_path('files/files').$file->path}}">{{$file->path}}</a>
                                    </td>
                                    <td>
                                        {!! Form::open( array('route' => array('file-delete', $file->id ),'role' => 'form','method' => 'Delete','onClick'=>"return confirm('Are you sure you want to delete?')")) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            @endif
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="log">
                            Log TODO
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <a onclick="addEditRequirement('', '', '', 0)" class="btn btn-primary btn-block">
                <span class="fa fa-plus"></span> Add Requirement
            </a>
            <p></p>
            @foreach($childrens as $child)
            <div class="box">
                <div class="box-body">
                    <h4>
                        {{'['.$child->reference_number .'] '. $child->title}}
                        <a class="btn btn-link" onclick="addEditRequirement('{{$child->reference_number}}','{{$child->title}}','{{$child->description}}',{{$child->id}})" class="pull-right">
                            <i class="fa fa-edit"></i>
                        </a>
                    </h4>
                    <p>
                        {{$child->description}}
                    </p>
                </div>
                <div class="box-footer">
                    <!-- Split button -->
                    <div class="form-group">
                        {!!Form::select('status',$status,$child->status,['class'=>'form-control'])!!}
                    </div>
                    <div class="clearfix">
                        <a class="btn btn-danger pull-left">
                            Add Ticket
                        </a>
                        <a class="btn btn-link pull-right" requirement_id="{{$child->id}}" title="Comments">
                            <i class="fa fa-comments"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div id="add-requirement-modal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            {!!Form::open(['route'=>'admin.requirement.store'])!!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add/Edit Requirement</h4>
            </div>
            <div class="modal-body">
                {!!Form::hidden('requirement_id',0)!!}
                {!!Form::hidden('parent_id',$requirement->id)!!}
                <div class="form-group">
                    <div class="col-sm-12">
                        {!!Form::label('reference_number','Reference Number')!!}
                    </div>
                    <div class="col-sm-12">
                        {!!Form::text('reference_number','',['class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        {!!Form::label('title','Title')!!}
                    </div>
                    <div class="col-sm-12">
                        {!!Form::text('title','',['class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        {!!Form::label('description','Description')!!}
                    </div>
                    <div class="col-sm-12">
                        {!!Form::textarea('description','',['class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            {!!Form::close()!!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="comment_modal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            {!!Form::open(['route'=>'admin.requirement.addcomment'])!!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body">
                {!!Form::hidden('type',0)!!}
                {!!Form::hidden('item_id',0)!!}
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            {!!Form::label('description','Description')!!}
                        </div>
                        <div class="col-sm-12">
                            {!!Form::textarea('description','',['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>
                <div id="comments_list">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            {!!Form::close()!!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@stop

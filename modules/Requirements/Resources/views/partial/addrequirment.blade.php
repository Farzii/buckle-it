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
                {!!Form::hidden('parent_id',$parent_id)!!}
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
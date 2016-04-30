@extends('admin::layouts.master')
@section('script')
<script src="{{asset('/modules/Requirements/js/custom.js')}}"></script>
@stop
@section('content-header')
<h1>
    Requirements Administration ({!! $requirements->count() !!})
    &middot;
    <small>
        <a onclick="addEditRequirement('', '', '', 0)" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add new
        </a>
    </small>
</h1>
@stop

@section('content')
@foreach ($requirements as $article)
<div class="col-sm-10">
    <h3 style="margin-top:0">
        <?php $total = $article->unstarted + $article->inprocess + $article->ready + $article->completed; ?>

        <a class="btn-link" href="{{route('admin.requirement.show',$article->id)}}">
            {{'['.$article->reference_number .'] '. $article->title}} 
        </a>
        @if($total)
        <span style="font-size: 15px" class="text-green">{{$article->completed.'/'.$total .' ('.round((($article->completed/$total)*100),0).'%)'}}</span>
        @endif
        @if($total)
        <div class="progress">
            @if(!empty($article->unstarted))
            <div class="progress-bar progress-bar-danger progress-bar-striped" title="{{$article->unstarted.' Unstarted'}}" style="width: {{($article->unstarted/$total)*100}}%">
                <span class="sr-only">{{$article->unstarted.' Unstarted'}}</span>
            </div>
            @endif
            @if(!empty($article->inprocess))
            <div class="progress-bar progress-bar-warning progress-bar-striped" title="{{$article->inprocess.' Inprocess'}}" style="width: {{($article->inprocess/$total)*100}}%">
                <span class="sr-only">{{$article->inprocess.' Inprocess'}}</span>
            </div>
            @endif
            @if(!empty($article->ready))
            <div class="progress-bar progress-bar-info progress-bar-striped" title="{{$article->ready.' Ready to test'}}" style="width: {{($article->ready/$total)*100}}%">
                <span class="sr-only">{{$article->ready.' Ready to test'}}</span>
            </div>
            @endif
            @if(!empty($article->completed))
            <div class="progress-bar progress-bar-success progress-bar-striped" title="{{$article->completed.' Completed'}}" style="width: {{($article->completed/$total)*100}}%">
                <span class="sr-only">{{$article->completed.' Completed'}}</span>
            </div>
            @endif
        </div>
        @endif
    </h3>
</div>
<div class="col-sm-2">
    {!! Form::open( array('route' => array('admin.requirement.destroy', $article->id),'role' => 'form','method' => 'Delete','onClick'=>"return confirm('Are you sure you want to delete?')")) !!}
    {!! Form::button('<i class="fa fa-trash"></i>', ['type'=>'submit','class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
</div>
@endforeach
<div class="clearfix"></div>
<div class="text-center">
    {!! pagination_links($requirements) !!}
</div>
@include('requirements::partial.addrequirment',['parent_id'=>0])
@stop

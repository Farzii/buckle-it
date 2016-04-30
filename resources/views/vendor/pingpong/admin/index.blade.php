@extends($layout)

@section('content-header')
<h1>
    Dashboard
    <small>Control panel</small>
</h1>
@stop

@section('content')

<!-- Small boxes (Stat box) -->
<div class="col-sm-12">
    <h3> TODO </h3>
</div>
<!-- /.row (main row) -->

@stop

@section('script')
<script src="{!! admin_asset('components/raphael/raphael-min.js') !!}"></script>
<script src="{!! admin_asset('adminlte/js/plugins/morris/morris.min.js') !!}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{!! admin_asset('adminlte/js/AdminLTE/dashboard.js') !!}" type="text/javascript"></script>
@stop

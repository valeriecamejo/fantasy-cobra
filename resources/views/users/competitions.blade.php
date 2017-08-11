@extends ('layouts.template')

@section ('content')
<div id="page-content-wrapper">
    <!--  /Content-wrapper -->
    <h3 class="Titulo1">MIS COMPETICIONES</h3>
</div>
<!-- -------------------------------- MODALES -------------------------------- -->
@include('modal/competition')
@include('includes.my-competitions')
@include('includes.my-competitions-mobile')
@include('includes/footer-mobile')
</div>
<!--  /Content-wrapper -->
@stop

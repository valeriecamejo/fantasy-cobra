@extends ('layouts.template')

@section ('content')
<!-- Abre Wrapper -->
<div id="wrapper">
  <div id="page-content-wrapper">
      <!--  /Content-wrapper -->
      <h3 class="Titulo1">MIS COMPETICIONES</h3>

  <!---------------------------------- MODALES ---------------------------------->
  @include('modal/competition')
  @include('includes.my-competitions')
  @include('includes.my-competitions-mobile')


  </div>
      <!--  /Content-wrapper -->
</div>
{{--@include('includes.footer-mobile')--}}
@stop


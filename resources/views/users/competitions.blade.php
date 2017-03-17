@extends ('layouts.template')

@section ('content')
<!-- Abre Wrapper -->
<div id="wrapper">
    <div id="page-content-wrapper">
        <!--  /Content-wrapper -->
        <h3 class="Titulo1">MIS COMPETICIONES</h3>
        <div class="container-fluid BlokBoton">
            <div class="Boton1 oculto-movil">
                <a onclick="action(2,0)">
                    <div class="BotonRe">
                        CREAR COMPETICIÓN
                    </div>
                </a>
            </div>

            <div class="linemovbut visible-xs">
                <a onclick="action(2,0)">
                    <button type="button" class="btn btn-default btn-primary4">
                        CREAR COMPETICIÓN
                    </button>
                </a>
            </div>
        </div>
        <!-- -------------------------------- MODALES -------------------------------- -->
        @include('modal/competition')
        @include('includes.competitions-no-mobile')
        @include('includes/footer-mobile')
    </div>
    <!--  /Content-wrapper -->
</div>
@stop

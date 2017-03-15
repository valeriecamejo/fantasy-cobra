@extends ('layouts.template')

@section ('content')

<!-- Abre Wrapper -->
<div id="wrapper">

  <div id="page-content-wrapper">
    <!--  /Content-wrapper -->
    <div class="container-fluid">
      @if (Session::has('enviarmail'))
            <div id="enviarmail" class="alert alert-success">
                {{ Session::get('enviarmail') }}
            </div>
      @endif

      @if(Session::get('danger'))
          <div id="danger" class="alert alert-danger">
            <strong>¡Error! </strong>{{ Session::get('danger') }}
          </div>
      @endif

      @if(Session::get('message_success'))
          <div id="success" class="alert alert-success">
            {!! Session::get('message_success') !!}<strong> Éxito</strong>
          </div>
      @endif

      @if(isset($promotion_list) && count($promotion_list)!= "null")
        <div class="container contaslide nopadrightres" style="margin-bottom:50px">
          <div id="myCarousel" class="carousel slide hidden-xs" data-ride="carousel">
          <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                @foreach ($promotion_list as $promotion)
                   {!! Html::image('http://admin.fantasycobra.com/venezuela/promotionimg/'.$promotion->photo,'promocion',array('width'=>'100%','class'=>'imgslider')) !!}
                @endforeach
              </div>
            </div>
          </div>
          <div class="visible-xs sliderres">
            <ul class="rslides" id="slider1">
              @foreach ($promotion_list as $promotion)
                <li>{!! Html::image('http://admin.fantasycobra.com/venezuela/promotionimg/'.$promotion->photo,'promocion',array('width'=>'100%','class'=>'imgslider')) !!} </li>
                @endforeach
            </ul>
          </div>
        </div>
        <!-- Promos -->
      @else
        <div class="container contaslide nopadrightres" style="margin-bottom:50px">
          <div id="myCarousel" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <a href=""><img src="images/Promo/promo-1.jpg" alt="Chania" class="imgslider"></a>
                <a href=""><img src="images/Promo/promo-2.jpg" alt="Chania" class="imgslider"></a>
                <a href=""><img src="images/Promo/promo-3.jpg" alt="Flower" class="imgslider"></a>
                <a href=""><img src="images/Promo/promo-4.jpg" alt="Flower" class="imgslider"></a>
              </div>
            </div>
          </div>
          <div class="visible-xs sliderres">
            <ul class="rslides" id="slider1">
              <li><a href=""><img src="images/Promo/promo-1.jpg" alt=""></a></li>
              <li><a href=""><img src="images/Promo/promo-2.jpg" alt=""></a></li>
              <li><a href=""><img src="images/Promo/promo-3.jpg" alt=""></a></li>
              <li><a href=""><img src="images/Promo/promo-4.jpg" alt=""></a></li>
            </ul>
          </div>
        </div>
                <!-- Promos -->
    @endif
  </div>

  <div class="containerfluid">
  <!-- Mensaje -->
    <h4 class="textohome">¡No te pierdas las promociones del día!</h4>
  </div>
    <!-- Mensaje -->
  <div class="container-fluid BlokBoton">
  <!-- Botones -->
    <div class="Boton1">
      @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()->status == Auth::user()::STATUS_ACTIVE)
        <a onclick="action(1,0)">
        @else
          <a onclick="action(1,1)">
      @endif
          <div class="BotonRe">
            CREAR EQUIPO
          </div>
        </a>
    </div>

    <div class="Boton1">
      @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()->status == Auth::user()::STATUS_ACTIVE)
            <a onclick="action(2,0)">
        @else
            <a onclick="action(2,1)">
        @endif
            <div class="BotonRe">
              CREAR COMPETICIÓN
            </div>
          </a>
      </div>
    </div>
    <!-- -------------------------------- MODALES -------------------------------- -->
    @include('modal/competition')
    <!-- -------------------------------- BOTONES -------------------------------- -->
    @include('includes.competitions-no-mobile')
    @include('includes/footer-mobile')
  </div>
  <!--  /Content-wrapper -->
</div>
@stop
@extends ('layouts.template')

@section ('content')
  <div id="page-content-wrapper">
    <!--  /Content-wrapper -->
    <div class="container-fluid">
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

          <div id="myCarousel" class="visible-xs sliderres rslides" data-interval="3000" data-ride="carousel">
            <!-- Carousel items -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="images/Promo/promo-1.jpg" alt="First Slide">
              </div>
              <div class="item">
                <img src="images/Promo/promo-2.jpg" alt="Second Slide">
              </div>
              <div class="item">
                <img src="images/Promo/promo-3.jpg" alt="Second Slide">
              </div>
              <div class="item">
                <img src="images/Promo/promo-4.jpg" alt="Third Slide">
              </div>
            {{--</div>--}}
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
      @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3)
        <div class="Boton1">
          <a onclick="modal_sport()">
            <div class="BotonRe">
              CREAR COMPETICIÓN
            </div>
          </a>
        </div>
      @else
        <div class="Boton1">
          <a href=".login" data-toggle="modal">
            <div class="BotonRe">
              CREAR COMPETICIÓN
            </div>
          </a>
        </div>
      @endif
    </div>
    <!-- -------------------------------- MODALES -------------------------------- -->
  @include('modal/competition')
  <!-- -------------------------------- BOTONES -------------------------------- -->
    @include('includes.competitions')
    @include('includes.competitions-mobile')
    <!-- @include('includes/footer-mobile') -->
  </div>
@stop

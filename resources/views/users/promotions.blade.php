@extends ('layouts.template')
@section ('content')
  <div class="container-fluid Ingresoprom" id="page-content-wrapper">
       <!--CONTENIDO-->
    @if(isset($list_promotions) && count($list_promotions)>0)
           <div class="container-fluid Ingresoprom">
             <div class="container">
               <h3 class="Titulo1">PROMOCIONES</h3>
               @php
                 $count_pub="";
                 $count_pub=0;
               @endphp
  
               @foreach ($list_promotions as $promotion)
                 @if(isset(Auth::user()->username))

                   @if($count_pub == 1)
                     <div class="row col-sm-3 blockpromo">
                      <!--Foto-->
                       <div class="imgpromo2">
                         <a href = "" onClick="newPage('{{$promotion->url}}')">
                           <img src="{{asset('images/Promo/'.$promotion->photo)}}" alt="Promotion Image" class = "promotional-img"  width="100%">
                         </a>
                       </div>
                      <!--Foto-->
                       <!--Info-->
                       <div class="descriptpromo">
                         <div class="descripttit">
                          <h4>{{ $promotion->name }}</h4>
                         </div>
                         <div class="descriptext">
                          <p>{{ $promotion->description }}</p>
                         </div>
                        
                       </div>
                       <!--Info-->
                     </div>
                  @else

                     <div class="row col-sm-3 blockpromo">
                       <!--Foto-->
                       <div class="imgpromo2">
                         <a href = "" onClick="newPage('{{$promotion->url}}')">
                           <img src="{{asset('images/Promo/'.$promotion->photo)}}" alt="Promotion Image" class = "promotional-img"  width="100%">
                         </a>
                       </div>
                       <!--Foto-->
                       <!--Info-->
                       <div class="descriptpromo">
                         <div class="descripttit">
                           <h4>{{ $promotion->name }}</h4>
                         </div>
                         <div class="descriptext">
                           <p>{{ $promotion->description }}</p>
                         </div>
                       </div>
                       <!--Info-->
                     </div>
                   @endif
                 @else
                   <div class="row col-sm-3 blockpromo">
                     <!--Foto-->
                     <div class="imgpromo2">
                     @php
                       $_SESSION['tabshome'] = 9;
                     @endphp
                       <a href = "" onClick="newPage('{{$promotion->url}}')">
                           <img src="{{asset('images/Promo/'.$promotion->photo)}}" alt="Promotion Image" class = "promotional-img"  width="100%">
                         </a>
                     </div>
                     <!--Foto-->
                     <!--Info-->
                     <div class="descriptpromo">
                       <div class="descripttit">
                         <h4>{{ $promotion->name }}</h4>
                       </div>
                       <div class="descriptext">
                         <p>{{ $promotion->description }}</p>
                       </div>
                       <div class="descripta">
                         @php
                            $_SESSION['tabshome'] = 9;
                         @endphp
                        
                       </div>
                     </div>
                     <!--Info-->
                   </div>
                 @endif
               @endforeach
             </div>
           </div>
       @else
         <span style="color:#84761A;font-size:30px">No hay promociones activas</span>
       @endif
       <!--CONTENIDO-->
       <!-- @include('includes/footer-mobile') -->
     </div>
   </div>

<script language="JavaScript">

  function newPage(url){


  window.open(url);
}
</script>


@stop

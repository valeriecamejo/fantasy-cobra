@extends ('success/template-pay-successful')

@section ('content')

<!-- Abre Wrapper -->
<div id="wrapper">
  @include('includes/menu-mobile')

  <div class="container-fluid Ingresoprin" id="page-content-wrapper">
    <div class="container">
        <h3 class="Titulothank">¡Gracias por su pago!</h3>
        @if(isset($_SESSION['voucher']))
          
          <div id="tablevoucher" style="border: 1px dashed;border-color: #FFD32E;width: 25%;padding: 10px">
            {{ HTML::decode($_SESSION['voucher']) }}
          </div>  
        @endif 
        <div class="row blockthank MargBot ">
            <h3 class="thankyoup">Ya puede empezar a ganar dinero con sus juegos diarios, esperamos que disfrute de esta página.</h3>
            <div id="ththank">
              {{ HTML::link('usuario','CONTINUAR',array('class' => 'btn btn-primary3 btn-lg')); }}
            </div>
        </div>
    </div>
  </div>
</div>
<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1527940264153802');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1527940264153802&ev=PageView&noscript=1"/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

@stop

@extends ('layouts.template')

@section ('content')
  <div class="container-fluid Ingresoprin" id="page-content-wrapper">
    <div class="container">
      <h3 class="Titulo1">¿CÓMO JUGAR EN FANTASY COBRA?</h3>
      <div class="row blockpolitics">
        <div class="Ingresodatosiframe">
          <div class="Ingresodatosiframe">
            <iframe class="embed-responsive-item" id="vidmayor" width="560" height="315" src="https://www.youtube.com/embed/tm2KfUJ_htY" frameborder="0" allowfullscreen></iframe>
            <iframe class="embed-responsive-item" id="vidmenor" width="420" height="315" src="https://www.youtube.com/embed/tm2KfUJ_htY" frameborder="0" allowfullscreen></iframe>
            <iframe class="embed-responsive-item" id="vidxs" width="250" height="145" src="https://www.youtube.com/embed/tm2KfUJ_htY" frameborder="0" allowfullscreen></iframe>
          </div>
          <!--<iframe class="embed-responsive-item" id="vidmayor" width="560" height="315" src="https://www.youtube.com/embed/h0IrT0xxCmg" frameborder="0" allowfullscreen></iframe>
          <iframe class="embed-responsive-item" id="vidmenor" width="420" height="315" src="https://www.youtube.com/embed/h0IrT0xxCmg" frameborder="0" allowfullscreen></iframe>
          <iframe class="embed-responsive-item" id="vidxs" width="250" height="145" src="https://www.youtube.com/embed/h0IrT0xxCmg" frameborder="0" allowfullscreen></iframe>-->
        </div>
        <div class="Ingresodatos comjug">
          <ul>
            <li><b>Regístrate:</b> Llena todos tus datos verdaderos en la sección de registro. Luego inicia sesión con tu correo electrónico y clave personal.</li>
            <li><b>Crea tu lineup:</b> Arma tu equipo. Debes escoger: un cuerpo de pitcheo, un jugador para cada posición del infield (C, 1B, 2B, 3B, SS); y tres outfielders (OF´s).</li>
            <li><b>Deposita:</B> Ve al cajero y utiliza el punto de pago. Puedes pagar con cualquier tarjeta de crédito y con tarjetas de débito Banesco. Aprovecha la promoción de 20% de bono en tu primer depósito.</li>
            <li><b>Compite:</b> Inscribe el lineup que creaste en cualquiera de nuestras competencias o crea una competencia personalizada a tu gusto. Según la actuación de los jugadores que están en tu lineup se te asignarán puntos. Los usuarios que más puntos tengan en cada competencia recibirán premios y se le abonará dinero a su cuenta de usuario de Fantasy Cobra.</li>
            <li><b>Cobra:</b> Ve a la sección de retiro (la puedes encontrar en el cajero), llena el formulario de retiro y en un máximo de 3 días hábiles tendrás tu dinero en tu cuenta bancaria.</li>
            <li><b>Refiere a tus panas:</B> usa tu URL personal (la puedes encontrar en tu perfil) e invita a tus panas. Por cada amigo que se registre con tu URL y compita, tú recibirás un bono del 20% del primer depósito de tu amigo.</li>
          </ul>
        </div>
      </div>
    </div>
  @include('includes/footer-mobile')
  </div>
@stop

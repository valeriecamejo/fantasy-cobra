<footer id="footer" class="mobile-visible" style="position: absolute !important; border-top: 5px solid #cd9f3d;">
  <div class="container">
    <div class="col-sm-2">
      <ul class="social-icons">
        @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
          <li>
            {{ HTML::link('usuario/terminos-y-servicios','Términos y servicios'); }}
          </li>
          <li>
            {{ HTML::link('usuario/politicas-de-privacidad','Políticas de privacidad'); }}
          </li>
        @else
          <li>
            {{ HTML::link('terminos-y-servicios','Términos y servicios'); }}
          </li>
          <li>
            {{ HTML::link('politicas-de-privacidad','Políticas de privacidad'); }}
          </li>
        @endif
      </ul>
    </div>
    <div class="Siguenos2">Síguenos en nuestras redes:</div>
    <div class="col-sm-5 redesfoot linkredes2" style="">
      <ul class="social-icons" style="display: -webkit-inline-box;">
        <li class="Siguenos">Síguenos en nuestras redes:</li>
        <li>
          <a href="https://www.facebook.com/fantasycobra/?fref=ts">
            {{ HTML::image('images/fb2.png') }}
          </a>
        </li>
        <li>
          <a href="https://twitter.com/Fantasy_Cobra">
            {{ HTML::image('images/tw2.png') }}
          </a>
        </li>
        <li>
          <a href="https://www.instagram.com/fantasycobra">
            {{ HTML::image('images/insta2.png') }}
          </a>
        </li>
        <li>
          <a href="skype:contacto_11689?call">
              {{ HTML::image('images/skype-3.png') }}
          </a>
        </li>
      </ul>
    </div>
  </div>
</footer>
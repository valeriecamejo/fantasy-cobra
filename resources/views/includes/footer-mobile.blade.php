<footer id="footer" class="mobile-visible" style="position: absolute !important; border-top: 5px solid #cd9f3d;">
  <div class="container">
    <div class="col-sm-2">
      <ul class="social-icons">
        @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)
          <li>
            {!! Html::link('usuario/terminos-y-servicios','Términos y servicios') !!}
          </li>
          <li>
            {!! Html::link('usuario/politicas-de-privacidad','Políticas de privacidad') !!}
          </li>
        @else
          <li>
            {!! Html::link('terminos-y-servicios','Términos y servicios') !!}
          </li>
          <li>
            {!! Html::link('politicas-de-privacidad','Políticas de privacidad') !!}
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
            {!! Html::image('images/fb2.png') !!}
          </a>
        </li>
        <li>
          <a href="https://twitter.com/Fantasy_Cobra">
            {!! Html::image('images/tw2.png') !!}
          </a>
        </li>
        <li>
          <a href="https://www.instagram.com/fantasycobra">
            {!! Html::image('images/insta2.png') !!}
          </a>
        </li>
        <li>
          <a href="skype:contacto_11689?call">
              {!! Html::image('images/skype-3.png') !!}
          </a>
        </li>
      </ul>
    </div>
  </div>
</footer>

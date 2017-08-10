<div class="modal fade bs-example-modal-sm login" id="login" tabindex="-1" role="dialog" aria-labelledby="inicioLabel">
	<div class="modal-dialog" role="document">
      {!! Form::open(array('url' => 'login', 'method' => 'post')) !!}
      	<div class="modal-content">
         	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            	<h3 class="modal-title" id="inicioLabel">Iniciar Sesión</h3>
         	</div>
         	<div class="modal-body Top2">
               <div>
                  <p>Correo</p>
               </div>
               <div class="input-group InicioSes widthcompleto">
                  @if(isset($_COOKIE['correo_usuario']))
                  <!--   {!! $email = $_COOKIE['correo_usuario']; !!} -->
                     {!! Form::email('email',$email, array ('class'=>'form-control', 'placeholder'=>'Escriba su correo electrónico','aria-describedby'=>'sizing-addon2')) !!}
                  @else
                     {!! Form::email('email','',array('class'=>'form-control', 'placeholder'=>'Escriba su correo electrónico','aria-describedby'=>'sizing-addon2')) !!}
                  @endif
               </div>
         	</div>
         	<div class="modal-body">
               <div>
                  <p>Contraseña</p>
               </div>
               <div class="input-group InicioSes widthcompleto">
                  {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Escriba su contraseña','aria-describedby'=>'sizing-addon2')) !!}
               </div>
         	</div>
         	<!-- <div class="modal-body Right2 centerres">
            	<a onclick="forgot_password()">¿Olvidaste tu contraseña?</a>
         	</div> -->
         	<div class="modal-body Right3 centerres">
            	<!-- <a href="#">Crear cuenta nueva</a> -->
               {!! Form::checkbox('remember', 1, 'remember') !!}<a>Recordar Correo</a>
         	</div>
         	<div class="modal-footer">
            	<button type="submit" class="btn btn-default btn-primary4">INICIAR</button>
         	</div>
      	</div>
      {!! Form::close() !!}
	</div>
</div>

<div class="modal fade bs-example-modal-sm" id="forgot-password" tabindex="-1" role="dialog" aria-labelledby="inicioLabel">
	<div class="modal-dialog" role="document">
      {!! Form::open(array('url' => 'olvide-contrasena', 'method' => 'post')) !!}
      	<div class="modal-content">
         	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            	<h3 class="modal-title" id="inicioLabel">Olvidó su Contraseña</h3>
         	</div>
         	<div class="modal-body Top2">
               <div>
                  <p>Correo</p>
               </div>
               <div class="input-group InicioSes widthcompleto">
                  {!! Form::email('email','',array('class'=>'form-control', 'placeholder'=>'Escriba su correo electrónico','aria-describedby'=>'sizing-addon2','required'=>'required')) !!}
               </div>
         	</div>
         	<div class="modal-footer">
            	<button type="submit" class="btn btn-default btn-primary4">CONTINUAR</button>
         	</div>
      	</div>
      {!! Form::close() !!}
	</div>
</div>

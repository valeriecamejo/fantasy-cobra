<div class="modal fade contacto" tabindex="-1" role="dialog" aria-labelledby="inicioLabel">
 	<div class="modal-dialog" role="document">
		{!! Form::open(array('url' => 'contact', 'method' => 'post')) !!}
		<div class="modal-content">
	       	<div class="modal-header">
          		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          	<h3 class="modal-title" id="inicioLabel">Contáctanos</h3>
	          	<p class="contactfootp">
	          		<spam style="font-size: 11px;color:#fff;">Puedes consultar tus dudas envíandonos un correo a <a href="#">contacto@fantasycobra.com</a>, llamándonos a través de nuestro <img src="https://fantasycobra.com.ve/images/skype.png"> <a href="skype:contacto_11689?call">skype</a>, escribirnos en nuestro chat interno o simplemente llenando el formulario que encuentras a continuación.</spam>
                </p>
	       	</div>
			<div class="modal-body Top2">
	          	<div>
             		<p>Nombre</p>
	          	</div>
	          	<div class="input-group InicioSes">
					{!! Form::text('name','',array('class'=>'form-control', 'placeholder'=>'Escriba su Nombre','aria-describedby'=>'sizing-addon2','required'=>'required')) !!}
				</div>
	       	</div>
	       	<div class="modal-body">
	          	<div>
	             	<p>Apellido</p>
	          	</div>
	          	<div class="input-group InicioSes">
					{!! Form::text('surname','',array('class'=>'form-control', 'placeholder'=>'Escriba su Apellido','aria-describedby'=>'sizing-addon2','required'=>'required')) !!}
	          	</div>
	       	</div>
	       	<div class="modal-body">
	          	<div>
	             	<p>Correo electrónico</p>
	          	</div>
	          	<div class="input-group InicioSes">
					{!! Form::text('email','',array('class'=>'form-control', 'placeholder'=>'Escriba su correo electrónico','aria-describedby'=>'sizing-addon2','required'=>'required')) !!}
	          	</div>
	       </div>
	       <div class="modal-body" style="padding-bottom: 20px;">
	          	<div>
	             	<p>Comentario</p>
	          	</div>
	          	<div class="input-group InicioSes">
	             	<textarea name="comment" class="form-controlcomentary" placeholder="Deje su comentario..." cols="30" rows="10" required="required"></textarea>
	          	</div>
	       	</div>
	       	<div class="modal-footer">
				<button type="submit" class="btn btn-default btn-primary4">ENVIAR</button>
	       	</div>
		</div>
		{!! Form::close() !!}
 	</div>
</div>

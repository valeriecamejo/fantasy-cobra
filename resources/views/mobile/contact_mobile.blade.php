@extends ('template')

@section ('content')

<div id="wrapper"> <!-- Abre Wrapper -->
    @include('includes/menu-mobile')  <!-- Menú movil -->
    <div class="container-fluid Ingresoprin" id="page-content-wrapper">
        @if (Session::has('enviarmail'))
            <div id="success" class="alert alert-success">
                {{ Session::get('enviarmail') }}
            </div>
        @endif
            @if (Session::get('msj') )
             <div id="success" class="alert alert-success">
                 {{Session::get('msj')}}
             </div>
        @endif
        {{ Form::open(array('url' => 'usuario/finish_contact', 'method' => 'post')) }}
        <div class="container">
            <h3 class="Titulo1">CONTÁCTANOS</h3>
            <div class="row blockingreso" style="height: auto;">

                <div class="Ingresodatos">
                    <h3 id="Subtitulo1">Nombre</h3>
                    <div class="input-group InicioSes">
                        {{ Form::text('name','',array('class'=>'form-control', 'placeholder'=>'Escriba su Nombre','aria-describedby'=>'sizing-addon2')) }}
                        @if($errors->has('name'))
                            <span class="incompleto4">×</span>
                            @foreach($errors->get('name') as $error)
                                <span class="messageerror2">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <h3 id="Subtitulo1">Apellido</h3>
                    <div class="input-group InicioSes">
                        {{ Form::text('surname','',array('class'=>'form-control', 'placeholder'=>'Escriba su Apellido','aria-describedby'=>'sizing-addon2')) }}
                        @if($errors->has('surname'))
                            <span class="incompleto4">×</span>
                            @foreach($errors->get('surname') as $error)
                                <span class="messageerror2">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <h3 id="Subtitulo1">Correo electrónico</h3>
                    <div class="input-group InicioSes">
                        {{ Form::text('email','',array('class'=>'form-control', 'placeholder'=>'Escriba su correo electrónico','aria-describedby'=>'sizing-addon2')) }}
                        @if($errors->has('email'))
                            <span class="incompleto4">×</span>
                            @foreach($errors->get('email') as $error)
                                <span class="messageerror2">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <h3 id="Subtitulo1">Comentario</h3>
                    <div class="input-group InicioSes">
                        <textarea name="comment" class="form-controlcomentary" placeholder="Deje su comentario..." cols="30" rows="10"></textarea>
                        @if($errors->has('comment'))
                            <span class="incompleto4">×</span>
                            @foreach($errors->get('comment') as $error)
                                <span class="messageerror2">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-default btn-primary4">ENVIAR</button>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop
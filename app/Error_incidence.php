<?php
//Para que se ejecute el script la hora de Venezuela
setlocale(LC_TIME, 'es_PYT'); # Localiza en español es_Venezuela
//date_default_timezone_set('America/Asuncion');
date_default_timezone_set('Etc/GMT+4');

if(!isset($_SESSION)){
  session_start();
}

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error_incidence extends Model
{
	protected $table = 'error_incidences';
	protected $fillable = [
                         'script',
                         'function',
                         'code',
                         'line',
                         'description'
                        ];

    /**********************************************************************
    *   Función:     error_incidences                                            *
    *   Descripción: Envia correo a los administradores en caso de error. *
    *                                                                     *
    *   Parametros de entrada:                                            *
    *                           + $script: Archivo que tiene el error.    *
    *                           + $funcion: Metodo que contiene el error. *
    *                           + $line : Linea donde este el error.      *
    *                           + $description: descripcion del error.    *
    **********************************************************************/
    public static function error_incidences($script, $function, $line, $description) {
      $answer = 1;
      $array  = array();

      array_push($array, 'valerie260492@gmail.com');

      Log::error("script: $script, function: $function ($line) , $description");

      return $answer;
    }
  }


<?php
/*
 * Clase que se encarga de la conexión a la base de datos Inspirafit.
 * Se modifico el metodo getConexion para que sea un metodo estático,
 * con la finalidad de tener un metodo que se pueda llamar sin necesidad
 * de instanciar un objeto de la clase BaseDatos.
 */

class BaseDatos
{
   private static $conexion = null;

   public static function getConexion()
   {
      if (self::$conexion == null) {
         $host = "localhost";
         $user = "root";
         $pass = "";
         $db = "inspirafit";

         self::$conexion = new mysqli($host, $user, $pass, $db);
         if (self::$conexion->connect_error) {
            die("Conexion fallida: " . self::$conexion->connect_error);
         }
      }
      return self::$conexion;
   }
}
?>

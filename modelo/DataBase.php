<?php
require_once('configurarBD.php');
class DataBase
{

	protected static $instance;
	    // A static property to hold the single instance of the class


    // The constructor is private so that outside code cannot instantiate
    private function __construct() { }

    // All code that needs to get and instance of the class should call
    // this function like so: $db = Database::getInstance();
    public static function getInstance()
    {
      if(!isset(self::$instance)) //self:es para atributos o metodos estaticos//
		{
			try
			{
				//parent::__construct($this->tipo_de_base . ':host=' . $this->host . ';dbname=' . $this->nombre_de_base, $this->usuario, $this->contrasena);
				$datos_servidor=MANEJADOR.':host='.SERVIDOR.';dbname='.BD;
				self::$instance = new PDO($datos_servidor, USUARIO, CLAVE);
				self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->exec("SET CHARACTER SET utf8");
				//manejo de errores//
			}
			catch(PDOException $e)
			{
				self::$instance=null;
				throw new Exception('Error al conectarse al servidor de BD',0);
				 //instruccion de manejo de errores//
			}
		}
		return self::$instance;//retorna el objeto PDO//
    }

    // Block the clone method
    private function __clone() {}
}

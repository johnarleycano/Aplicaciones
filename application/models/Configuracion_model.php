<?php 
Class Configuracion_model extends CI_Model{
	function __construct() {
        parent::__construct();

    }

    /**
     * Obtiene registros de base de datos
     * y los retorna a las vistas
     * 
     * @param  [string] $tipo Tipo de consulta que va a hacer
     * @param  [int]    $id   Id foráneo para filtrar los datos
     * 
     * @return [array]       Arreglo de datos
     */
    function obtener($tipo, $id = null)
    {
        switch ($tipo) {
            case "aplicacion":
                return $this->db
                    ->where("Pk_Id", $id)
                    ->get("aplicaciones")->row();
            break;

            case "proyectos":
                return $this->db
                    ->get("proyectos")->result();
            break;
        }
    }

}
/* Fin del archivo Configuracion_model.php */
/* Ubicación: ./application/models/Configuracion_model.php */
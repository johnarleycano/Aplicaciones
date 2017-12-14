<?php 
Class Inicio_model extends CI_Model{
	/**
	 * Obtiene registros de base de datos
	 * y los retorna a las vistas
	 * 
	 * @param  [string] $tipo Tipo de consulta que va a hacer
	 * @param  [int] 	$id   Id foráneo para filtrar los datos
	 * 
	 * @return [array]       Arreglo de datos
	 */
	function obtener($tipo, $id = null)
	{
		switch ($tipo) {
			case "aplicaciones":
				return $this->db
				->where(array("Estado" => 1, "Fk_Id_Proyecto" => $id))
				->order_by("Nombre")
				->get("aplicaciones")->result();
			break;

			case "proyecto":
				return $this->db
				->where("Pk_Id", $id)
				->get("proyectos")->row();
			break;

			case "proyectos":
				return $this->db
				->get("proyectos")->result();
			break;
		}
	}
}
/* Fin del archivo Inicio_model.php */
/* Ubicación: ./application/models/Inicio_model.php */
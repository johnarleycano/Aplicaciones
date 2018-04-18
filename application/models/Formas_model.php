<?php 
Class Formas_model extends CI_Model{
	/**
	 * Permite la inserción de datos en la base de datos 
	 * 
	 * @param  [string] $tipo  Tipo de inserción
	 * @param  [array] 	$datos Datos que se van a insertar
	 * 
	 * @return [boolean]        true, false
	 */
	function insertar($tipo, $datos)
	{
		switch ($tipo) {
			case "usuario_registrado":
				return $this->db->insert('usuarios_registrados', $datos);
			break;
		}
	}
}
/* Fin del archivo Formas_model.php */
/* Ubicación: ./application/models/Formas_model.php */
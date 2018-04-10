<?php 
Class Sesion_model extends CI_Model{
    function __construct() {
        parent::__construct();
	}

	/**
     * Consulta los permisos de un usuario,
     * retornándolos para cargar en sesión
     * 
     * @param  [string] $tipo_usuario   Tipo de permiso
     * @param  [int] $id_usuario 		Id del usuario
     * 
     * @return [array]             		Arreglo con los id de las acciones
     */
    function cargar_permisos($tipo_usuario, $id_usuario){
        $permisos = array();

        // Si es superadministrador
        if ($tipo_usuario == 1) {
        	// Se consultan todas las acciones
        	$acciones = $this->db->get("acciones")->result();
        } else {
        	// Se consultan los permisos al usuario específico
        	$acciones = $this->db->where("Fk_Id_Usuario", $id_usuario)->get("permisos")->result();
        }

        // Se recorren las acciones y se agregan al arreglo
        // para finalmenete retornarlo
        foreach ($acciones as $accion){
        	array_push($permisos, $accion->Pk_Id);
        } 

        return $permisos;
    }

    /**
     * Consulta los datos de conexión del usuario
     * en la base de datos
     * 
     * @param  [string] $usuario [Login]
     * @param  [string] $clave   [Contraseña cifrada]
     * 
     * @return [array]          [datos del usuario]
     */
	function validar($usuario, $clave)
	{
        $this->db
        	->select(array(
	            'u.Pk_Id',
	            'u.Nombres',
	            'u.Apellidos',
	            'u.Documento',
	            'u.Estado',
	            'u.Email',
	            'u.Login',
	            'p.Fk_Id_Tipo_Usuario'
	            ))
            ->from('usuarios u')
            ->join('permisos_aplicaciones p', 'p.Fk_Id_Usuario = u.Pk_Id', 'left')
            ->where(array('Login' => $usuario, 'Clave' => $clave));
        
        // return $this->db_configuracion->get_compiled_select(); // string de la consulta
        return $this->db->get()->row();
	}

	function validar_permiso($id_aplicacion, $id_usuario) {
		return $this->db
			->where("Fk_Id_Aplicacion", $id_aplicacion)
			->where("Fk_Id_Usuario", $id_usuario)
			->get("permisos_aplicaciones")->row();
	}
}
/* Fin del archivo Sesion_model.php */
/* Ubicación: ./application/models/Sesion_model.php */
<?php
date_default_timezone_set('America/Bogota');

defined('BASEPATH') OR exit('El acceso directo a este archivo no está permitido');

/**
 * @author:     John Arley Cano Salinas
 * Fecha:       9 de abril de 2018
 * Programa:    Configuración | Módulo de formas
 *              Gestiona formularios adicionales de otras aplicaciones
 *              y/o de la página web
 * Email:       johnarleycano@hotmail.com
 */
class Formas extends CI_Controller {
	/**
	 * Función constructora de la clase. Se hereda el mismo constructor 
	 * de la clase para evitar sobreescribirlo y de esa manera 
     * conservar el funcionamiento de controlador.
	 */
	function __construct() {
        parent::__construct();

        // Carga de modelos
        $this->load->model(array('formas_model'));
    }

	/**
     * Interfaz inicial
     */
	function certificado()
	{
		$this->data['titulo'] = 'Certificado';
        $this->load->view('formas/certificados/index', $this->data);
	}

	/**
     * Permite la inserción de datos en la base de datos 
     * 
     * @return [void]
     */
    function insertar()
    {
        //Se valida que la peticion venga mediante ajax y no mediante el navegador
        if($this->input->is_ajax_request()){
            // Datos vía POST
            $datos = $this->input->post('datos');
            $tipo = $this->input->post('tipo');

            switch ($tipo) {
                case "usuario_registrado":
                    echo $this->formas_model->insertar($tipo, $datos);
                break;
            }
        }else{
            //Si la peticion fue hecha mediante navegador, se redirecciona a la pagina de inicio
            redirect('');
        } // if
    }
}
/* Fin del archivo Formas.php */
/* Ubicación: ./application/controllers/Formas.php */
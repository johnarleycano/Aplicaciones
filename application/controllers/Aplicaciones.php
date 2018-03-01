<?php
defined('BASEPATH') OR exit('El acceso directo a este archivo no está permitido');

/**
 * @author: 	John Arley Cano Salinas
 * Fecha: 		1 de marzo de 2018
 * Programa:  	Configuración | Módulo de aplicaciones
 *            	Muestra las aplicaciones disponibles
 * Email: 		johnarleycano@hotmail.com
 */
class Aplicaciones extends CI_Controller {
	/**
	 * Función constructora de la clase. Se hereda el mismo constructor 
	 * de la clase para evitar sobreescribirlo y de esa manera 
     * conservar el funcionamiento de controlador.
	 */
	function __construct() {
        parent::__construct();

        // Carga de modelos
        $this->load->model(array('aplicaciones_model'));
    }

    /**
     * Interfaz inicial
     * 
     * @return [void]
     */
	function index()
	{
		$this->data['titulo'] = 'Aplicaciones';
        $this->data['contenido_principal'] = 'aplicaciones/index';
        $this->load->view('core/template', $this->data);
	}

    /**
     * Carga la interfaz según el tipo
     * @return void 
     */
    function cargar_interfaz()
    {
        //Se valida que la peticion venga mediante ajax y no mediante el navegador
        if($this->input->is_ajax_request()){
            // Dependiendo del tipo
            switch ($this->input->post('tipo')) {
                case "aplicaciones":
                    // Se recibe los datos por POST
                    $this->data["id_proyecto"] = $this->input->post("id_proyecto");

                    // Se carga la vista
                    $this->load->view('aplicaciones/listar', $this->data);
                break;
            } // switch tipo
        }else{
            //Si la peticion fue hecha mediante navegador, se redirecciona a la pagina de inicio
            redirect('');
        } // if
    } // cargar_interfaz
}
/* Fin del archivo Aplicaciones.php */
/* Ubicación: ./application/controllers/Aplicaciones.php */
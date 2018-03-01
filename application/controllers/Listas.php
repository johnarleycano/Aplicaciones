<?php
date_default_timezone_set('America/Bogota');

defined('BASEPATH') OR exit('El acceso directo a este archivo no está permitido');

/**
 * @author:     John Arley Cano Salinas
 * Fecha:       1 de marzo de 2018
 * Programa:    Configuración | Módulo de listas
 *              Gestiona todo lo relacionado con las listas
 *              desplegables del sistema y que alimenta
 *              a otros sistemas
 * Email:       johnarleycano@hotmail.com
 */
class Listas extends CI_Controller {
	/**
     * Interfaz inicial
     * 
     * @return [void]
     */
	function index()
	{
		$this->data['titulo'] = 'Listas';
        $this->data['contenido_principal'] = 'listas/index';
        $this->load->view('core/template', $this->data);
	}
}
/* Fin del archivo Listas.php */
/* Ubicación: ./application/controllers/Listas.php */
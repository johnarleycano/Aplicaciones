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
     * Interfaz inicial
     */
	function certificado()
	{
		$this->data['titulo'] = 'Certificado';
        $this->load->view('formas/certificados/index', $this->data);
	}
}
/* Fin del archivo Formas.php */
/* Ubicación: ./application/controllers/Formas.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inscripciones extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library( 'session' );
		$this->load->library('user_agent');
		//$this->load->model('modelo', 'modelo'); 
		//$this->load->model('aspirantes_model','aspirantes');
	}

//////////////////comienzo de tratamiento de dependencia///////////////////////////

 	//Filtro La lista que es dependiente a un elemento padre
	function cargar_dependencia(){
		
		$data['campo'] 				= $this->input->post('campo');
		$data['valor'] 				= $this->input->post('valor');
		$data['dependencia'] 				= $this->input->post('dependencia');

		switch ($data['dependencia']) {
		    case "id_campus":
		    		$elementos	= $this->aspirantes->listado_campus();
		        break;
		    case "id_nivel":
		    		$elementos	= $this->aspirantes->listado_niveles($data['valor']);
		        break;

		    case "id_programa":
		    		$elementos	= $this->aspirantes->listado_programas($data['valor']);
		        break;
    
		    default:
		}



	    $variables = array();
		if ($elementos != false)	{     
		     foreach( (json_decode(json_encode($elementos))) as $clave =>$valor ) {
	  	        array_push($variables,array('nombre' => $valor->nombre, 'identificador' => $valor->id)); 
			 }
		}	 

		 echo json_encode($variables);
	}


//////////////////fin de tratamiento de dependencia///////////////////////////


	public function index(){

		

			$data['title'] 			= "uniladev";

			//$data['campuss'] = $this->aspirantes->listado_campus();
			//$data['niveles'] = $this->aspirantes->listado_niveles(1);
			//$data['programas'] = $this->aspirantes->listado_programas(1);
			//$this->load->view('aspirantes/index', $data);
			$this->load->view('inscripciones/formulario', $data);
			
	}	



	public function nuevo() {
		
		//DATOS PERSONALES DEL REGISTRADO.
		$this->form_validation->set_rules('nombre','nombre','trim|strip_tags|required|min_length[5]|max_lenght[25]|callback_nombre_valido|xss_clean');
		$this->form_validation->set_rules('apellidop','Apell. Paterno','trim|strip_tags|required|min_length[5]|max_lenght[25]|callback_nombre_valido|xss_clean');
		$this->form_validation->set_rules('apellidom','Apell. Materno','trim|strip_tags|min_length[5]|max_lenght[25]|callback_nombre_valido_opcional|xss_clean');
		$this->form_validation->set_rules('dia','Fecha Nacimiento','callback_fecha_valida['.$this->input->post('mes').'-'.$this->input->post('ano').']');
		$this->form_validation->set_rules('email', 'Correo', 'trim|strip_tags|required|valid_email|xss_clean');
		$this->form_validation->set_rules('licencia','licencia','trim|strip_tags|required|min_length[5]|max_lenght[15]|xss_clean');		
		$this->form_validation->set_rules('dia_lic','Vig. Licencia','callback_fecha_valida['.$this->input->post('mes_lic').'-'.$this->input->post('ano_lic').']');


		//DIRECCIÓN

		$this->form_validation->set_rules('calle','Calle','trim|strip_tags|required|min_length[5]|max_lenght[30]|xss_clean');		
		$this->form_validation->set_rules('colonia','Colonia','trim|strip_tags|required|min_length[5]|max_lenght[30]|xss_clean');		
		$this->form_validation->set_rules('delegacion','Delegación','trim|strip_tags|required|min_length[5]|max_lenght[30]|xss_clean');		
		$this->form_validation->set_rules('ciudad','Ciudad','trim|strip_tags|required|min_length[5]|max_lenght[30]|xss_clean');		
		$this->form_validation->set_rules('cpostal','C.P.','trim|strip_tags|required|min_length[5]|max_lenght[30]|xss_clean');		
		$this->form_validation->set_rules('referencia','Referencia.','trim|strip_tags|min_length[5]|max_lenght[30]|xss_clean');		

		//TELÉFONOS DE CONTACTO
		$this->form_validation->set_rules('oficina', 'Oficina', 'trim|strip_tags|required|callback_valid_phone|min_length[8]|max_lenght[25]|xss_clean');
		$this->form_validation->set_rules('telefono', 'Teléfono', 'trim|strip_tags|callback_valid_phone|min_length[8]|max_lenght[25]|xss_clean');
		$this->form_validation->set_rules('celular', 'Celular', 'trim|strip_tags|required|callback_valid_phone|min_length[8]|max_lenght[25]|xss_clean');
		$this->form_validation->set_rules('telefono2', 'otro', 'trim|strip_tags|callback_valid_phone|min_length[8]|max_lenght[25]|xss_clean');

		//DATOS DEL VEHÍCULO

		$this->form_validation->set_rules('modelo','Modelo','trim|strip_tags|min_length[5]|max_lenght[30]|xss_clean');		
		//ano_modelo
		$this->form_validation->set_rules('placa','Placa','trim|strip_tags|min_length[5]|max_lenght[30]|xss_clean');		
		$this->form_validation->set_rules('serie','Serie','trim|strip_tags|required|min_length[5]|max_lenght[30]|xss_clean');		


		//INFORMACIÓN ACOMPAÑANTES
		$this->form_validation->set_rules('nombA1','Nomb. acompañante 1','trim|strip_tags|required|min_length[10]|max_lenght[25]|callback_nombre_completo|xss_clean');
		$this->form_validation->set_rules('edadA1', 'Edad 1', 'trim|strip_tags|numeric|required|callback_edad_valida|xss_clean');

		$this->form_validation->set_rules('nombA2','Nomb. acompañante 2','trim|strip_tags|min_length[10]|max_lenght[25]|callback_nombre_completo_opcional|xss_clean');		
		$this->form_validation->set_rules('edadA2', 'Edad 2', 'trim|strip_tags|numeric|callback_edad_valida_opcional|xss_clean');

		$this->form_validation->set_rules('comentario','Observaciones','trim|strip_tags|min_length[5]|max_lenght[200]|xss_clean');		

		//Aviso y privacidad
		$this->form_validation->set_rules('coleccion_id_aviso', 'aviso', 'callback_accept_terms');		


/*
		// $this->form_validation->set_rules('telefono', 'Teléfono', 'trim|strip_tags|required|callback_valid_phone|min_length[6]|max_lenght[25]|xss_clean');
		$this->form_validation->set_rules('telefono2', 'Celular', 'trim|strip_tags|required|callback_valid_phone|min_length[6]|max_lenght[25]|xss_clean');
		

		$this->form_validation->set_rules('id_campus','campus','trim|strip_tags|required|callback_opcion_valida|xss_clean');
		$this->form_validation->set_rules('id_nivel','nivel','trim|strip_tags|required|callback_opcion_valida|xss_clean');
		$this->form_validation->set_rules('id_programa','programa','trim|strip_tags|required|callback_opcion_valida|xss_clean');

*/

		if ($this->form_validation->run() === TRUE){

					$data['identificador']	= 'uniladev-'.date('Y').date('m').date('d').'-'.random_string('alpha',4).random_string('numeric',3);

					$data['nombre_completo']	=	$this->input->post('nombre_completo');
					$data['telefono']			=	$this->input->post('telefono');
					$data['telefono2']			=	$this->input->post('telefono2');
					$data['email']				=	$this->input->post('email');

					$data['id_campus']			=	$this->input->post('id_campus');
					$data['id_nivel']			=	$this->input->post('id_nivel');
					$data['id_programa']		=	$this->input->post('id_programa');

					//otros datos
					$data['ip'] 				= $this->input->ip_address();
					$data['navegador'] 			= $this->input->user_agent();
					$data['periodo'] 			= "2015-2";
					$data['microsite'] 			= "MicroSitio";
					
					switch ( $this->input->post( 'origin' ) ) {
						case 'f5458401unila':
							$data['origin'] 	= "Facebook";
							break;
						case 'a5458402unila':
							$data['origin'] 	= "Adwords";
							break;				
						default:
							$data['origin'] 	= "Directo";
							break;
					}



					$data 				= 	$this->security->xss_clean($data);  
					$guardar 			= 	$this->aspirantes->anadir_aspirantes( $data );												
					if ( $guardar !== FALSE ){
									
								$dato['aspirante'] = $this->aspirantes->get_aspirante($data);
								
								$desde = 'marketing@unila.edu.mx';
								//correo para el usuario
								
								$usuario_aux=$data['email'];
								$this->email->clear(TRUE);
							    $this->email->from($desde, 'Universidad Latina');
								$this->email->to($usuario_aux);
								$this->email->subject('Gracias por registrarte en Universidad Latina');

								//adjunto
								if (!empty($dato['aspirante']->pdf)){					
									$ruta= FCPATH.'files/'.$dato['aspirante']->pdf;
									$this->email->attach($ruta); 	
								}	

								if ( ($data['id_nivel']==3) || ($data['id_nivel']==6) || ($data['id_nivel']==9) || ($data['id_nivel']==12)) {
									$this->email->message( $this->load->view('mail/aspirante_posgrado', $dato, TRUE ) );
								} else
								{
									$this->email->message( $this->load->view('mail/aspirante', $dato, TRUE ) );									
								}

									
								
								$this->email->send();
								

								$dato['aspirante'] = $this->aspirantes->get_aspirante($data);


								$dato['users']=$this->modelo->listado_usuarios_correo($data['id_campus']);


								
									
								if ($dato) {	
									foreach ($dato['users'] as $row) {
										if (!empty($row)) {

											//correo para los responsables			
											$this->email->clear(TRUE);
											$dato['nombre_responsable'] = $row->nombre.' '.$row->apellidos;
										    $this->email->from($desde, 'Universidad Latina');
											$this->email->to($row->email);
											$this->email->subject('Nuevo aspirante para Universidad Latina');
											
											  $this->email->message($this->load->view('mail/responsables', $dato, TRUE ) );									
											
											$this->email->send();
											
										}
									}		
								}


								echo true;
					} else {
								echo '<span class="error"><b>E01</b> - No se pudo enviar el correo</span>';
					}
	


					
		} else {			
				//tratamiento de errores
				$error = validation_errors();

				print_r($error);
				die;
				$errores = explode("<b class='requerido'>*</b>", $error);
				$campos = array(
				    "nombre" => 'Nombre',
				    "telefono2" => 'Celular',
				    "email" => 'Correo',
				    "id_campus" => 'campus',
				    "id_nivel" => 'nivel',
				    "id_programa" => 'programa',
				    'coleccion_id_aviso'=>'Requerido'

				);
					$mis_errores=array(
					"nombre" => '',
				    "telefono2" => '',
				    "email" => '',
				    "id_campus" => '',
				    "id_nivel" => '',
				    "id_programa" => '',
				    'coleccion_id_aviso'=>''
						);
				    foreach ($errores as $elemento) {

						foreach ($campos as $clave => $valor) {
							
						        if (stripos($elemento, $valor) !== false) {
						        	if  ($valor=="Requerido") {
						         		$mis_errores[$clave] = $elemento; //condiciones
						        	} else {
						        		$mis_errores[$clave] = '*';
						        	}						

						        	$mis_errores[$clave] = substr($elemento, 0, -5);   //condiciones 	
						        }
						}    	
				    }
				    echo json_encode($mis_errores);
				    //echo json_encode(true);

		}

}

//////////////////fin de guardado de informacion///////////////////////////

	public function avisos(){
			$data['title'] 			= "uniladev";
			$this->load->view('aspirantes/avisos', $data);
	}


	/*
	public function gracias(){
			$this->load->view( 'aspirantes/gracias');
	}
	*/


	public function gracias($id,$id_programa){
		$id = base64_decode($id);
		$id_programa = base64_decode($id_programa);
		/*
						alert(jQuery('#id_nivel').val());					
						1,4,7,10- medio superior
							 //1,2,39,56  //prepa
							 //40,41,57,58,59 //bachillerato
						2,5,8,11- Licenciatura
						3,6,9,12- posgrados
						*/

			switch ($id) {
				case '1':
				case '4':
				case '7':
				case '10':
				case '2':
				case '5':
				case '8':
				case '11':						
				case '3':
				case '6':
				case '9':
				case '12':
						$this->load->view( 'aspirantes/gracias');
					break;
				
				default:
					  $this->load->view( 'aspirantes/gracias');
					break;
			}


			
	}




//////////////////////////////////////validaciones///////////////////////////////

	function valid_date( $str ) {

		$arr = explode('-', $str);
		if ( count($arr) == 3 ){
			$d = $arr[0];
			$m = $arr[1];
			$y = $arr[2];
			if ( is_numeric( $m ) && is_numeric( $d ) && is_numeric( $y ) ){
				return checkdate($m, $d, $y);
			} else {
				$this->form_validation->set_message('valid_date', '<b class="requerido">*</b> El campo <b>%s</b> debe tener una fecha válida con el formato DD-MM-YYYY.');
				return FALSE;
			}
		} else {
			$this->form_validation->set_message('valid_date', '<b class="requerido">*</b> El campo <b>%s</b> debe tener una fecha válida con el formato DD-MM-YYYY.');
			return FALSE;
		}
	}


	public function fecha_valida($d,$my){
	
			$arr = explode("-", $my);
			$m = $arr[0];
			$y = $arr[1];
		

			if ( is_numeric( $m ) && is_numeric( $d ) && is_numeric( $y ) ){
					
					if (checkdate($m, $d, $y) != "Unable to access an error message corresponding to your field name.") {
						$this->form_validation->set_message('fecha_valida', '<b class="requerido">*</b> El campo <b>%s</b> debe tener una fecha válida.');
						return FALSE;
					} else {
						return checkdate($m, $d, $y);		
					}

				//
			} else {
				$this->form_validation->set_message('fecha_valida', '<b class="requerido">*</b> El campo <b>%s</b> debe tener una fecha válida con el formato DD-MM-YYYY.');
				return FALSE;
			}
	}	




	public function accept_terms($str){
		if ($str == false)	{
			$error = "<b class='requerido'>*</b> Requerido";
			$this->form_validation->set_message('accept_terms',  $error);
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}



	function nombre_valido_opcional( $str ){
		 $regex = "/^([A-Za-z ñáéíóúÑÁÉÍÓÚ]{2,60})$/i";
		
		if ( ( ! preg_match( $regex, $str )  ) && ($str!='') ){
			$this->form_validation->set_message( 'nombre_valido_opcional','<b class="requerido">*</b> La información introducida en <b>%s</b> no es válida.' );
			return FALSE;
		} else {
			return TRUE;
		}
	}



	function nombre_valido( $str ){
		 $regex = "/^([A-Za-z ñáéíóúÑÁÉÍÓÚ]{2,60})$/i";
		//if ( ! preg_match( '/^[A-Za-zÁÉÍÓÚáéíóúÑñ \s]/', $str ) ){
		if ( ! preg_match( $regex, $str ) ){			
			$this->form_validation->set_message( 'nombre_valido','<b class="requerido">*</b> La información introducida en <b>%s</b> no es válida.' );
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function nombre_completo_opcional( $str ){
		if ((! preg_match( '/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]/', $str ) ) && ($str!='') ){
			$this->form_validation->set_message('nombre_completo_opcional',"<b class='requerido'>*</b> <b>%s</b> no válida osmel.");
			return FALSE;
		} else {

			if ((str_word_count($str) < 2 ) &&  (str_word_count($str) > 0 ) ){ 
				 $this->form_validation->set_message('nombre_completo_opcional',"<b class='requerido'>*</b> A su <b>%s</b>  le falta su apellido.");
				return FALSE;
			} else {
				return TRUE;
			}	
		}
	}


	function nombre_completo( $str ){
		if (! preg_match( '/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]/', $str ) ){
			$this->form_validation->set_message('nombre_completo',"<b class='requerido'>*</b> <b>%s</b> no válida.");
			return FALSE;
		} else {
			if (str_word_count($str) < 2 ){ 
				 $this->form_validation->set_message('nombre_completo',"<b class='requerido'>*</b> A su <b>%s</b>  le falta su apellido.");
				return FALSE;
			} else {
				return TRUE;
			}	
		}
	}

	function opcion_valida( $str ){
	 	if ( $str == '0' ){
	 		$this->form_validation->set_message('opcion_valida',"<b class='requerido'>*</b>  Selección <b>%s</b>.");
	 		return FALSE;
	 	} else {
	 		return TRUE;
	 	}
	}



	function valid_phone( $str ){
        if ( $str ){
            if ( ! preg_match( '/\([0-9]\)| |[0-9]/', $str ) ) {
                $this->form_validation->set_message('valid_phone', "<b class='requerido'>*</b> <b>%s</b> no válido.");
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }


	function edad_valida_opcional( $str ){
		if ( ( $str >= 12 && $str <= 55 )  ){
			return TRUE;
		} else {
		if 	
			$this->form_validation->set_message('edad_valida',"<b class='requerido'>*</b> <b>%s</b> no válida.");
	 		return FALSE;
		}
	}    

	function edad_valida( $str ){
		if ( $str >= 12 && $str <= 55 ){
			return TRUE;
		} else {
			$this->form_validation->set_message('edad_valida',"<b class='requerido'>*</b> <b>%s</b> no válida.");
	 		return FALSE;
		}
	}    


}

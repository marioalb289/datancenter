<?php 	
	/**
	* 
	*/
	class Layout 
	{
		
		function renderVista($modulo,$vista,$data = array(),$result = ''){
			// echo $vista;exit;
			// print_r($data);
			if (!file_exists("sigi/view/$modulo/$vista.php" )){
                //echo "no existe";
                throw new Exception("Controlador no encontrado");
            }else{
                //echo "existe";
                if($modulo == 'reportes'){
                	// print_r($vista);exit;
                	require_once "sigi/view/$modulo/$vista.php";

                }else{
	                require_once ("sigi/view/header.php");
	                require_once "sigi/view/$modulo/$vista.php";
	                require_once ("sigi/view/footer.php");
                	
                }
            }
		}
	}

 ?>

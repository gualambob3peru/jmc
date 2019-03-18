<?php 

	if ( ! function_exists('helper_get_semilla')){
	    function helper_get_semilla(){
	        return '983h4g983g98';
	    }

	    function helper_btn_enviar_salir($url){
	        echo "<button type='submit' class='btn btn-success'>Enviar</button> <a class='btn btn-danger' href='".$url."'>Cancelar</a>";
	    }
	}

	if ( ! function_exists('helper_form_text')){
	    function helper_form_text($id,$texto,$valor="",$tipo="text",$size1="4",$size2="8"){
			echo "
			<div class='form-group row'>
				<label for='".$id."' class='col-sm-".$size1." col-form-label'>".$texto."</label>
				<div class='col-sm-".$size2."'>
					<input type='".$tipo."' name='".$id."' class='form-control' id='".$id."' value='".$valor."'>
				</div>
			</div>
			";
	    }
	}

	if ( ! function_exists('helper_form_select')){
	    function helper_form_select($id,$texto,$data){
			echo "
			<div class='form-group row'>
				<label for='".$id."' class='col-sm-2 col-form-label'>".$texto."</label>
				<div class='col-sm-10'>
					<select name='".$id."' id='".$id."'>

					</select>
				</div>
			</div>
			";
	    }
	}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view( 'inscripciones/header' ); ?>

<?php
  if (!isset($retorno)) {
        $retorno ="";
    }

?> 


<?php
    $oculto = array('oculto' => ""); //$valor_preguntas);
    $attr = array('class' => 'form-horizontal', 'id'=>'form_formulario','name'=>$retorno,'method'=>'POST','autocomplete'=>'off','role'=>'form');
    echo form_open('nuevo', $attr,$oculto);
?>  

	<div style="text-align:center; color: #00254e;">
		<p style="margin-bottom:20px"><b>FORMULARIO DE INSCRIPCIÓN</b><br><br>
    DATOS PERSONALES DEL REGISTRADO.
		</p>
	</div>
 
  <div class="row">
          <div class="col-sm-4 col-md-4 col-md-offset-4" style="background-color: #e4e4e4; padding: 30px 15px;">
                    
                    <div class="col-md-12 sin-bordes">                    
                      <input name="nombre" class="form-control" id="nombre" type="text" value="<?php echo set_value('nombre'); ?>" placeholder="Nombre (s)">
                      <label id="nombreAlert" class="error"></label>
                    </div>


                    <div class="col-md-12 sin-bordes">                    
                      <input name="apellidop" class="form-control" id="apellidop" type="text" value="<?php echo set_value('apellidop'); ?>" placeholder="Apellido Paterno">
                      <label id="apellidopAlert" class="error"></label>
                    </div>
                    


                    <div class="col-md-12 sin-bordes">                    
                      <input name="apellidom" class="form-control" id="apellidom" type="text" value="<?php echo set_value('apellidom'); ?>" placeholder="Apelido Materno">
                      <label id="apellidomAlert" class="error"></label>
                    </div>



Fecha de Nacimiento

<!-- dia -->
<select name="dia">
        <?php
        for ($i=1; $i<=31; $i++) {
            if ($i == date('j'))
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
</select>

<!-- mes -->
<select name="mes">
        <?php
        for ($i=1; $i<=12; $i++) {
            if ($i == date('m'))
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
</select>

<select name="ano">
        <?php
        for($i=date('o'); $i>=1910; $i--){
            if ($i == date('o'))
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
</select>
<br/>
<!--
http://www.jose-aguilar.com/blog/selector-de-fechas-con-select/
 -->





                    <div class="col-md-12 sin-bordes">                    
                      <input name="email" class="form-control" type="email" value="<?php echo set_value('email'); ?>"  placeholder="E-mail">
                      <label id="mailAlert" class="error"></label>
                    </div>


No. De Licencia
<br/>
Vigencia de la Licencia
<br/>



  <div style="text-align:center; color: #00254e;">
    <p style="margin-bottom:20px">
      DIRECCIÓN
    </p>
  </div>


    Calle y Número
    <br/>
    Colonia
    <br/>
    Delegación o Municipio
    <br/>
    Ciudad / Estado
    <br/>
    C.P. 
    <br/>
    Referencias
    <br/>



  <div style="text-align:center; color: #00254e;">
    <p style="margin-bottom:20px">
      TELÉFONOS DE CONTACTO
    </p>
  </div>

      <br/>
      Oficina

      <div class="col-md-12 sin-bordes">                     
          <input name="telefono" class="form-control" type="phone" id="telefono" value="<?php echo set_value('telefono'); ?>"  placeholder="Casa">
          <label id="telefonoAlert" class="error"></label>
      </div>

      <div class="col-md-12 sin-bordes">                     
          <input name="celular" class="form-control" type="phone" id="celular" value="<?php echo set_value('celular'); ?>"  placeholder="Celular">
          <label id="celularAlert" class="error"></label>
      </div>

      <br/>
      Otro


        <div style="text-align:center; color: #00254e;">
          <p style="margin-bottom:20px">
            DATOS DEL VEHÍCULO
          </p>
        </div>


      Modelo
      <br/>
      Año
      <br/>
      Placas
      <br/>
      No. De Serie (VIN)
      <br/>




    
        </div> 
       
    </div> <!--fin del row -->



    <div class="col-md-12 sin-bordes"> 
        <input style="float:left;width:20px;" type="checkbox" checked id="aviso" value="1" class="css-checkbox med" name="coleccion_id_aviso" />
        <label for="aviso" name="checkbox65_lbl" class="aviso"><a id="aviso" href="http://unila.edu.mx/component/content/article/2-general/index.php?option=com_content&view=article&id=41&Itemid=262" target="_blank" style="color: grey; font-weight: 200;">Leí las condiciones del aviso de privacidad</a></label>
        <?php echo form_error('aviso') ?>
        <div id="alerta" class="error"></div>
    </div>   


    <div class="col-sm-12 col-md-12 sin-bordes" style="text-align:center">              
       <button type="submit" class="btn btn-success btn-block" style="background:#41e0f2; font: 14px/155% 'Helvetica Neue', Arial, 'Liberation Sans', FreeSans, sans-serif;; font-size:12px; color:white; padding:5px 20px; border:none; text-decoration:none;   letter-spacing: 1px;">
          ENVIAR RESULTADOS
      </button>
    </div>      



<?php echo form_close(); ?>
<?php $this->load->view( 'inscripciones/footer' ); ?>

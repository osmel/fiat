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


 
  <div class="container">
                      <div style="text-align:center; color: #00254e;">
                      <p style="margin-bottom:20px"><b>FORMULARIO DE INSCRIPCIÓN</b><br><br>
                      </p>
                    </div>

      <div class="col-sm-6 col-md-6">


                    <div style="text-align:center; color: #00254e;">
                      <p style="margin-bottom:20px">
                        DATOS PERSONALES DEL REGISTRADO.
                      </p>
                    </div>

                    
                    <div class="col-md-12 sin-bordes">                    
                      <input name="nombre" class="form-control" id="nombre" type="text" value="<?php echo set_value('nombre'); ?>" placeholder="Nombre (s)*">
                      <label id="nombreAlert" class="error"></label>
                    </div>


                    <div class="col-md-12 sin-bordes">                    
                      <input name="apellidop" class="form-control" id="apellidop" type="text" value="<?php echo set_value('apellidop'); ?>" placeholder="Apellido Paterno*">
                      <label id="apellidopAlert" class="error"></label>
                    </div>
                    


                    <div class="col-md-12 sin-bordes">                    
                      <input name="apellidom" class="form-control" id="apellidom" type="text" value="<?php echo set_value('apellidom'); ?>" placeholder="Apelido Materno">
                      <label id="apellidomAlert" class="error"></label>
                    </div>


                    <div class="col-md-12 sin-bordes">   
                        Fecha de Nacimiento *

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
                                for($i=date('o')-18; $i>=date('o')-100; $i--){
                                    if ($i == date('o'))
                                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                    else
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                ?>
                        </select>
                        <label id="nacimientoAlert" class="error"></label>
                    </div>
                    
                    <!--
                    http://www.jose-aguilar.com/blog/selector-de-fechas-con-select/
                     -->

                    <br/><br/> 



                    <div class="col-md-12 sin-bordes">                    
                      <input name="email" class="form-control" type="email" value="<?php echo set_value('email'); ?>"  placeholder="E-mail*">
                      <label id="mailAlert" class="error"></label>
                    </div>



                    <div class="col-md-12 sin-bordes">                    
                      <input name="licencia" class="form-control" id="licencia" type="text" value="<?php echo set_value('licencia'); ?>" placeholder="Número de Licencia*">
                      <label id="licenciaAlert" class="error"></label>
                    </div>

                    <div class="col-md-12 sin-bordes"> 
                        Vigencia de la Licencia*

                        <!-- dia -->
                        <select name="dia_lic">
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
                        <select name="mes_lic">
                                <?php
                                for ($i=1; $i<=12; $i++) {
                                    if ($i == date('m'))
                                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                    else
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                ?>
                        </select>

                        <select name="ano_lic">
                                <?php
                                for($i=date('o')+10; $i>=2000; $i--){
                                    if ($i == date('o'))
                                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                    else
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                ?>
                        </select>
                        <label id="vigenciaAlert" class="error"></label>
                    </div>    
                    <br/>


                    <div style="text-align:center; color: #00254e;">

                      <p style="margin-bottom:20px">
                        DIRECCIÓN
                      </p>
                    </div>



                    <div class="col-md-12 sin-bordes">                    
                      <input name="calle" class="form-control" id="calle" type="text" value="<?php echo set_value('calle'); ?>" placeholder="Calle y Número*">
                      <label id="calleAlert" class="error"></label>
                    </div>


                    <div class="col-md-12 sin-bordes">                    
                      <input name="colonia" class="form-control" id="colonia" type="text" value="<?php echo set_value('colonia'); ?>" placeholder="Colonia*">
                      <label id="coloniaAlert" class="error"></label>
                    </div>

                    <div class="col-md-12 sin-bordes">                    
                      <input name="delegacion" class="form-control" id="delegacion" type="text" value="<?php echo set_value('delegacion'); ?>" placeholder="Delegación o Municipio*">
                      <label id="delegacionAlert" class="error"></label>
                    </div>


                    <div class="col-md-12 sin-bordes">                    
                      <input name="ciudad" class="form-control" id="ciudad" type="text" value="<?php echo set_value('ciudad'); ?>" placeholder="Ciudad / Estado*">
                      <label id="ciudadAlert" class="error"></label>
                    </div>

                    <div class="col-md-12 sin-bordes">                    
                      <input name="cpostal" class="form-control" id="cpostal" type="text" value="<?php echo set_value('cpostal'); ?>" placeholder="C.P.*">
                      <label id="cpostalAlert" class="error"></label>
                    </div>


                    <div class="col-md-12 sin-bordes">                    
                      <input name="referencia" class="form-control" id="referencia" type="text" value="<?php echo set_value('referencia'); ?>" placeholder="Referencias">
                      <label id="referenciaAlert" class="error"></label>
                    </div>
    </div>




<!-- Lado izquierdo-->



    <div class="col-sm-6 col-md-6">

                    <div style="text-align:center; color: #00254e;">
                      <p style="margin-bottom:20px">
                        TELÉFONOS DE CONTACTO
                      </p>
                    </div>

                    <br/>
                    
                    <div class="col-md-12 sin-bordes">                     
                        <input name="oficina" class="form-control" type="phone" id="oficina" value="<?php echo set_value('oficina'); ?>"  placeholder="Oficina*">
                        <label id="oficinaAlert" class="error"></label>
                    </div>


                    <div class="col-md-12 sin-bordes">                     
                        <input name="telefono" class="form-control" type="phone" id="telefono" value="<?php echo set_value('telefono'); ?>"  placeholder="Casa">
                        <label id="telefonoAlert" class="error"></label>
                    </div>

                    <div class="col-md-12 sin-bordes">                     
                        <input name="celular" class="form-control" type="phone" id="celular" value="<?php echo set_value('celular'); ?>"  placeholder="Celular*">
                        <label id="celularAlert" class="error"></label>
                    </div>

                    <div class="col-md-12 sin-bordes">                     
                        <input name="telefono2" class="form-control" type="phone" id="telefono2" value="<?php echo set_value('telefono2'); ?>"  placeholder="Otro">
                        <label id="telefono2Alert" class="error"></label>
                    </div>

                    <br/>


        <div style="text-align:center; color: #00254e;">
          <p style="margin-bottom:20px">
            DATOS DEL VEHÍCULO
          </p>
        </div>



                    <div class="col-md-12 sin-bordes">                    
                      <input name="modelo" class="form-control" id="modelo" type="text" value="<?php echo set_value('modelo'); ?>" placeholder="Modelo">
                      <label id="modeloAlert" class="error"></label>
                    </div>
                  
                    <div class="col-md-12 sin-bordes">                    
                        <select name="ano_modelo">
                                <?php
                                for($i=date('o')+1; $i>=1940; $i--){
                                    if ($i == date('o'))
                                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                    else
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                ?>
                        </select>
                        <label id="anomodeloAlert" class="error"></label>
                    </div>


                    <div class="col-md-12 sin-bordes">                    
                      <input name="placa" class="form-control" id="placa" type="text" value="<?php echo set_value('placa'); ?>" placeholder="Placas">
                      <label id="placaAlert" class="error"></label>
                    </div>
    
   

                    <div class="col-md-12 sin-bordes">                    
                      <input name="serie" class="form-control" id="serie" type="text" value="<?php echo set_value('serie'); ?>" placeholder="No. De Serie (VIN)*">
                      <label id="serieAlert" class="error"></label>
                    </div>

      
      <br/>


              <div style="text-align:center; color: #00254e;">
                <p style="margin-bottom:20px">
                  INFORMACIÓN ACOMPAÑANTES
                </p>
              </div>

      

                    <div class="col-md-12 sin-bordes">                    
                      <input name="nombA1" class="form-control" id="nombA1" type="text" value="<?php echo set_value('nombA1'); ?>" placeholder="Nombre completo*">
                      <label id="nombA1Alert" class="error"></label>
                    </div>

                    <div class="col-md-12 sin-bordes">                    
                      <input name="edadA1" class="form-control" id="edadA1" type="text" value="<?php echo set_value('edadA1'); ?>" placeholder="Edad*">
                      <label id="edadA1Alert" class="error"></label>
                    </div>

                    <div id="otro_acompanante" class="col-xs-12 col-md-12 col-lg-12" style="padding: 20px 10px 15px 15px;">  
                         <input id="otroacomp" style="padding:1px;" type="button" class="btn btn-success btn-block" value="Otro Acompañante"/>
                    </div>
                    
                    <div class="col-xs-12 col-md-12" id="cont_tab">      

                          <div class="col-md-12 sin-bordes">                    
                            <input name="nombA2" class="form-control" id="nombA2" type="text" value="<?php echo set_value('nombA2'); ?>" placeholder="Nombre completo">
                            <label id="nombA2Alert" class="error"></label>
                          </div>

                          <div class="col-md-12 sin-bordes">                    
                            <input name="edadA2" class="form-control" id="edadA2" type="text" value="<?php echo set_value('edadA2'); ?>" placeholder="Edad">
                            <label id="edadA2Alert" class="error"></label>
                          </div>

                    </div>


                  <div class="col-sm-12 col-md-12">
                    <textarea class="form-control" name="comentario" id="comentario" rows="5" placeholder="OBSERVACIONES"></textarea>
                    <label id="comentarioAlert" class="error"></label>
                  </div>


    
        </div> 
       
    </div> <!--fin del row -->



    <div class="col-md-12 sin-bordes"> 
        <input style="float:left;width:20px;" type="checkbox" checked id="aviso" value="1" class="css-checkbox med" name="coleccion_id_aviso" />
        <label for="aviso" name="checkbox65_lbl" class="aviso"><a id="aviso" href="#" target="_blank" style="color: grey; font-weight: 200;">Leí las condiciones del aviso de privacidad</a></label>
        <?php echo form_error('aviso') ?>
        <div id="alerta" class="error"></div>
    </div>   


    <div class="col-sm-12 col-md-12 sin-bordes" style="text-align:center">              
       <button type="submit" class="btn btn-success btn-block" style="background:#41e0f2; font: 14px/155% 'Helvetica Neue', Arial, 'Liberation Sans', FreeSans, sans-serif;; font-size:12px; color:white; padding:5px 20px; border:none; text-decoration:none;   letter-spacing: 1px;">
          ENVIAR
      </button>
    </div>      



<?php echo form_close(); ?>
<?php $this->load->view( 'inscripciones/footer' ); ?>

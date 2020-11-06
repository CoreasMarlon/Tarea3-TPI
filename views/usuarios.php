<main>
    <div class="personalizado">
        <div id="menuOpcion" class="moreOpcion">
            <form action="<?= BASE_DIR ?>Usuario/list" method="POST">
                <div class="more">
                    <div style="border-bottom: 1px solid black; padding-bottom: 10px;">
                        <label for="">Letra del alfabeto</label>
                    </div>
                    <div style="border-bottom: 1px solid black; padding-bottom: 10px;">
                        <label for="">Departamento</label>
                    </div>
                    <div style="border-bottom: 1px solid black; padding-bottom: 10px;">
                        <label for="">Municipio</label>
                    </div>

                    <div style="border-bottom: 1px solid black; padding-bottom: 10px;">
                        <label for="">Rol</label>
                    </div>
                    <div >
                        <select name="letra" class="select" id="letra">
                            <option value ="letra" disabled selected>Letra Inicial</option>
                            <!-- Se hace un arreglo de letras y se recorre con un foreach para hacer las opciones, con isset y post se mantiene la seleccion después de aplicar el filtro -->
                            <?php   $abecedario = range('A', 'Z');     
                            foreach($abecedario as $letra):?>
                                  <option value ="<?= $letra?>" <?php if(isset($_POST['letra']) && $_POST['letra'] == $letra) echo "selected ='$letra'";?>><?= $letra?> </option>
                            <?php endforeach  ?>
                        </select>
                    </div>
                    <div>
                        <select name="departamento" class="select" id="departamento">
                            <option disabled selected>Departamento</option>
                            <?php foreach ($departamentosList as $departamento) : ?>
                            <option value="<?= $departamento->idDepartamento ?>"
                                <?= ((isset($filter['departamento'])) && $filter['departamento'] == $departamento->idDepartamento) ? "selected" :  "" ?>>
                                <?= $departamento->departamento ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <select name="municipio" class="select" id="municipio" style="width:150px">
                            <option disabled selected>Municipio</option>
                            <?php foreach ($municipiosList as $municipio) : ?>
                            <option value="<?= $municipio->idMunicipio ?>"
                                <?= ((isset($filter['municipio'])) && $filter['municipio'] == $municipio->idMunicipio) ? "selected" :  "" ?>>
                                <?= $municipio->municipio ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="rol">
                        <!-- con isset y post se mantiene el check después de aplicar el filtro -->
                        <div>
                            <label for="">Administrador</label>
                            <input name="rol" id="cargo1" value="1" type="radio"
                                <?php if(isset($_POST['rol']) && $_POST['rol'] == '1')  echo ' checked="checked"'; $rol ="Administrador"?>>
                        </div>
                        <div>
                            <label for="">Moderador</label>
                            <input name="rol" id="cargo2" value="2" type="radio"
                                <?php if(isset($_POST['rol']) && $_POST['rol'] == '2')  echo ' checked="checked"'; $rol ="Moderador"?>>
                        </div>
                        <div>
                            <label for="">Invitado</label>
                            <input name="rol" id="cargo3" value="3" type="radio"
                                <?php if(isset($_POST['rol']) && $_POST['rol'] == '3')  echo ' checked="checked"'; $rol ="Invitado"?>>
                        </div>
                    </div>
                </div>

                <select name="ordenamiento">
                    <!-- con isset y post se mantiene la selección después de aplicar el filtro -->
                    <option disabled selected>Ordenar Por:</option>
                    <option value="value1" <?php if(isset($_POST['ordenamiento']) && $_POST['ordenamiento'] == 'value1') echo "selected ='Nombre (ASC)'";?>>Nombre (ASC)</option>
                    <option value="value2" <?php if(isset($_POST['ordenamiento']) && $_POST['ordenamiento'] == 'value2') echo "selected ='Nombre (DESC)'";?>>Nombre (DESC)</option>
                    <option value="value3" <?php if(isset($_POST['ordenamiento']) && $_POST['ordenamiento'] == 'value3') echo "selected ='Departamento (ASC)'";?>>Departamento (ASC)</option>
                    <option value="value4" <?php if(isset($_POST['ordenamiento']) && $_POST['ordenamiento'] == 'value4') echo "selected ='Departamento (DESC)'";?>>Departamento (DESC)</option>
                </select>

                <input type="submit" value="Filtrar" name="btnTipo" class="btnFiltrar">
                <a role="button"  class="btnLimpiar" href="<?= BASE_DIR ?>" >Restaurar</a>
            </form>
        </div>
    </div>

    <div class="resultados">
    <!-- Se comprueba si el arreglo que viene de la base de datos está vacío, si tiene datos se muestran en la tabla -->
        <?php  if(empty($list)){
       echo "<div class='aviso'><p>&#9888 No se encontraron registros con esas características en la base de datos &#9888 </p></div>";
      }
      else
      { 
      echo "<table class='tabla tabla-outline-red'>
        <thead>
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Apellido</th>
                <th scope='col'>Username</th>
                <th scope='col'>Rol</th>
                <th scope='col'>Departamento</th>
                <th scope='col'>Municipio</th>
            </tr>
        </thead>
        <tbody>";              
            foreach ($list as $key) : 
               echo "<tr>
                    <td> $key->idUsuario </td>
                    <td> $key->nombre </td>
                    <td> $key->apellido </td>
                    <td> $key->nombreUsuario </td>
                    <td> $key->rol </td>
                    <td> $key->departamento </td>
                    <td> $key->municipio</td>
                </tr>";
            endforeach; 

        echo "</tbody></table>"; 
       }
       
       ?>

    </div>
</main>
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
                    <div>
                        <select name="letra" class="letra" id="letra">
                            <option disabled selected>Letra</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="J">J</option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="N">N</option>
                            <option value="N">Ñ</option>
                            <option value="O">O</option>
                            <option value="P">P</option>
                            <option value="Q">Q</option>
                            <option value="R">R</option>
                            <option value="T">T</option>
                            <option value="V">V</option>
                            <option value="W">W</option>
                            <option value="X">X</option>
                            <option value="Y">Y</option>
                            <option value="Z">Z</option>
                        </select>
                    </div>
                    <div>
                        <select name="departamento" class="departamento" id="departamento">
                            <option disabled selected>Departamento</option>
                            <?php foreach ($departamentosList as $departamento) : ?>
                                <option value="<?= $departamento->idDepartamento ?>" <?= ((isset($filter['departamento'])) && $filter['departamento'] == $departamento->idDepartamento) ? "selected" :  "" ?>>
                                    <?= $departamento->departamento ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <select name="municipio" class="municipio" id="municipio" style="width:150px">
                            <option disabled selected>Municipio</option>
                            <?php foreach ($municipiosList as $municipio) : ?>
                                <option value="<?= $municipio->idMunicipio ?>">
                                    <?= $municipio->municipio ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="rol">
                        <div>
                            <label for="">Administrador</label>
                            <input name="rol" id="cargo1" value="1" type="radio">
                        </div>
                        <div>
                            <label for="">Moderador</label>
                            <input name="rol" id="cargo2" value="2" type="radio">
                        </div>
                        <div>
                            <label for="">Invitado</label>
                            <input name="rol" id="cargo3" value="3" type="radio">
                        </div>
                    </div>
                </div>

                <select name="ordenamiento">
                    <option disabled selected>Ordenar Por:</option>
                    <option value="value1">Nombre (ASC)</option>
                    <option value="value2">Nombre (DESC)</option>
                    <option value="value3">Departamento (ASC)</option>
                    <option value="value4">Departamento (DESC)</option>
                </select>

                <input type="submit" value="Filtrar" name="btnTipo">
                <a class="limpiar" href="<?= BASE_DIR ?>" role="button">Restaurar</a>                
            </form>
        </div>
    </div>

    <table class="tabla tabla-outline-red">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Username</th>
                <th scope="col">Rol</th>
                <th scope="col">Departamento</th>
                <th scope="col">Municipio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $key) : ?>
                <tr>
                    <td><?php echo $key->idUsuario ?></td>
                    <td><?php echo $key->nombre ?></td>
                    <td><?php echo $key->apellido ?></td>
                    <td><?php echo $key->nombreUsuario ?></td>
                    <td><?php echo $key->rol ?></td>
                    <td><?php echo $key->departamento ?></td>
                    <td><?php echo $key->municipio ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>
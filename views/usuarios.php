<main>
    <div class="personalizado">
        <div id="menuOpcion" class="moreOpcion">
            <form action="" method="GET">
                <div class="more">
                    <div style="border-bottom: 1px solid black; padding-bottom: 10px;">
                        <label for="">Nombre</label>
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
                        <input type="text" name="nombre">
                    </div>
                    <div>
                        <select name="Departamento">
                            <option value="">
                            </option>
                            <?php foreach ($departamentosList as $key) : ?>
                                <option value="<?php echo $key->departamento ?>">
                                    <?php echo $key->departamento ?>
                                </option>
                                <?php endforeach ?>>
                        </select>
                    </div>
                    <div>
                        <select name="Municipio">
                            <?php foreach ($municipiosList as $key) : ?>
                                <option value="<?php echo $key->municipio ?>">
                                    <?php echo $key->municipio ?>
                                </option>
                                <?php endforeach ?>>
                        </select>
                    </div>
                    <div class="rol">
                        <div>
                            <label for="">Administrador</label>
                            <input name="cargo1" id="cargo1" value="Administrador" type="checkbox">
                        </div>
                        <div>
                            <label for="">Moderador</label>
                            <input name="cargo2" id="cargo2" value="Moderador" type="checkbox">
                        </div>
                        <div>
                            <label for="">Invitado</label>
                            <input name="cargo3" id="cargo3" value="Invitado" type="checkbox">
                        </div>
                    </div>
                </div>

                <input type="submit" value="Buscar">
            </form>
        </div>
    </div>

    <table class="tabla tabla-outline-red" id="tbl_usuarios">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Username</th>
                <th scope="col">Cargo</th>
                <th scope="col">idDepartamento</th>
                <th scope="col">idMunicipio</th>
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
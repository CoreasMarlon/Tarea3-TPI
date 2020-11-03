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
                        <select name="miSelect">
                        <?php foreach ($departamentosList as $key): ?>
                                <option value="<?php echo $key->departamento?>"><?php echo $key->departamento?></option>
                            <?php endforeach ?>>
                        </select>
                    </div>
                    <div>
                        <select name="" id="">
                            <?php foreach ($municipiosList as $key): ?>
                                <option value="<?php echo $key->municipio ?>"><?php echo $key->municipio ?></option>
                            <?php endforeach ?>>
                        </select>
                    </div>
                    <div class="rol">
                        <div>
                            <label for="">Administrador</label>
                            <input type="checkbox">
                        </div>
                        <div>
                            <label for="">Moderador</label>
                            <input type="checkbox">
                        </div>
                        <div>
                            <label for="">Invitado</label>
                            <input type="checkbox">
                        </div>
                    </div>
                </div>

                <input type="submit" value="Buscar">
            </form>
        </div>
    </div>

    <table>
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

    <?php var_dump($departamentosList) ?>
</main>
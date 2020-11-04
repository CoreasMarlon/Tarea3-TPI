<main>
    <div class="personalizado">
        <div id="menuOpcion" class="moreOpcion">
        <form action="<?= BASE_DIR ?>Usuario/list" method="POST">
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
                        <select name="letra" class="letra" id="letra">
                            <option disabled selected>Letra</option>
                            <option value="A">A</option>
                            <option value="J">J</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                    <div>
                        <select name="departamento" class="departamento" id="departamento">
                            <option disabled selected>Departamento</option>
                            <?php foreach ($departamentosList as $departamento) { ?>
                            <option value="<?=$departamento->idDepartamento?>" <?=((isset($filter['departamento'])) && $filter['departamento'] == $departamento->idDepartamento)? "selected":  ""?>><?=$departamento->departamento?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <select name="municipio" class="municipio" id="municipio" style="width:150px">
                            <option disabled selected>Municipio</option>
                            <?php foreach ($municipiosList as $municipio) { ?>
                            <option value="<?=$municipio->idMunicipio?>"><?=$municipio->municipio?></option>
                            <?php } ?>
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

                <input type="submit" value="Filtrar" name="btnTipo">
                <a href="<?=BASE_DIR?>">Eliminar Filtro</a>
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
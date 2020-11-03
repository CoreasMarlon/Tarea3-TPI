<main>
    <form action="<?= BASE_DIR ?>Usuario/list" method="POST">
        <select name="departamento" class="departamento" id="departamento">
            <option disabled selected>Departamento</option>
            <?php foreach ($departamentosList as $departamento) { ?>
            <option value="<?=$departamento->idDepartamento?>" <?=((isset($filter['departamento'])) && $filter['departamento'] == $departamento->idDepartamento)? "selected":  ""?>><?=$departamento->departamento?></option>
            <?php } ?>
        </select>
        <select name="municipio" class="municipio" id="municipio">
            <option disabled selected>-- Municipio --</option>
        </select>
        <input type="submit" value="Filtrar" name="btnTipo">
    </form>

    <?php var_dump($list) ?>
    
</main>
<main>
    <form action="">

    <select class="departamento" id="departamento">
    <option disabled selected>Departamento</option>
    <?php foreach ($departamentosList as $departamento) { ?>
    <option value="<?=$departamento->idDepartamento?>" <?=((isset($filter['departamento'])) && $filter['departamento'] == $departamento->idDepartamento)? "selected":  ""?>><?=$departamento->departamento?></option>
    <?php } ?>
    </select>


    <select class="municipio" id="municipio">
    <option disabled selected>-- Municipio --</option>
    </select>

    </form>

    <?php var_dump($list) ?>
    
</main>


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
            <?php foreach ($list as $key): ?>
                <tr>
                    <td><?php echo $key->idUsuario?></td>
                    <td><?php echo $key->nombre?></td>
                    <td><?php echo $key->apellido?></td>
                    <td><?php echo $key->nombreUsuario?></td>
                    <td><?php echo $key->rol?></td>
                    <td><?php echo $key->departamento?></td>
                    <td><?php echo $key->municipio?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>    
</main>
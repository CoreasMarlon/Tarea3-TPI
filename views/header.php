<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASE_DIR ?>assets/css/style.css">
</head>

<body>
    <div class="contenedor">
        <header>
            <h1>Lista de usuarios</h1>

            <form action="<?= BASE_DIR ?>" method="POST">
                <label for="">Order by: </label>
                <select name="ordenamiento">
                    <option value="value1">Seleccionar</option>
                    <option value="value1">Nombre</option>
                    <option value="value2">Nombre (DESC)</option>
                    <option value="value3">Departamento</option>
                    <option value="value4">Departamento (DESC)</option>
                </select>
                <input type="submit" value="Filtrar" name="btnTipo">
            </form>
        </header>
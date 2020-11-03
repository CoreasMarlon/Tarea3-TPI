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
            <form action="<?= BASE_DIR ?>" method="post">

                <label for="">Filtrar Filas</label>
                <input type="text" placeholder="Buscar en esta tabla" name="buscar">
            </form>

            <form action="<?= BASE_DIR ?>Home/showHome" method="post">
                <label for="">Order by: </label>
                <select name="miSelect">
                    <option value="value1">Mamiferos</option>
                    <option value="value2">Aves</option>
                    <option value="value3">Reptiles</option>
                    <option value="value4">Peces</option>
                </select>
                <input type="submit" value="Filtrar" name="btnTipo">
            </form>
            <button id="menu">Busqueda Personalizada</button>
        </header>        
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
            <form action="<?= BASE_DIR ?>Home/showHome" method="post">

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
                                    <option value="value1">Apopa</option>
                                </select>
                            </div>
                            <div>
                                <select name="" id="">
                                    <option value="value1">San Miguel</option>
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
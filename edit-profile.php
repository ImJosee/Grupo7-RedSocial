<?php

session_start();
include 'header.php';

?>
<main>
    <form action="">
        <div class="header-info">
            <h2 class="contact"></h2>
            <h1 class="header">
                <strong>Envianos tu comentario</strong>
            </h1>
        </div>

        <div class="form-row">
            <div class="col">
                <label class="labels" for="email">Dirección de correo electrónico</label>
                <input type="email" class="form-control" id="email">
                </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label class="labels" for="nombre" required>Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
            <div class="col">
                <label class="labels" for="apellido" required>Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido">
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label class="labels" for="comentario">Comentario</label>
                <textarea name="comentario"  class="form-control" rows="8" cols="80"></textarea>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <p>
                    Por favor ingrese los detalles de su consulta y un miembro de atencion al cliente se pondra en contacto a la brevedad.
                </p>
            </div>
        </div>
        <div class="form-row">
            <label class="labels" for="browser">Browser</label>
                <select class="custom-select" id="inlineFormCustomSelect">
                    <option selected>Elige..</option>
                    <option value="1">Android mobile browser</option>
                    <option value="2">iOS Safari</option>
                    <option value="3">Internet Explorer</option>
                    <option value="4">Firefox</option>
                    <option value="5">Microsoft Edge</option>
                    <option value="6">Chrome</option>
                    <option value="7">Safari</option>
                    <option value="8">No lo se</option>
                    <option value="9">No listado</option>
                </select>
            </div>

            <div class="form-row">
            <div class="col">
                <label class="labels" for="digitalMe-usuaio" required>Nombre de usuario de <b>digitalMe</b></label>
                <input type="text" class="form-control" name="apellido" id="apellido">
            </div>
            </div>

        <div class="form-row">
            <div class="col">
                <button type="submit" class="enviar btn btn-success">Enviar</button>
            </div>
        </div>
    </form>
</main>
<?php include 'footer.php'?>
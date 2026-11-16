<?php 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="post" style="display: flex; gap: 10px; flex-direction: column; width: 310px;">
        <div>
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" value="<?=htmlspecialchars($titulo)?>">
        </div>        

        <fieldset>
            <legend>Elija la prioridad</legend>
            <div>
                <label for="prioridad-baja">Baja</label>
                <input type="radio" name="prioridad" id="prioridad-baja" value="baja" <?= $prioridad === 'baja' ? 'checked' : '' ?>>
            </div>
            <div>
                <label for="prioridad-media">Media</label>
                <input type="radio" name="prioridad" id="prioridad-media" value="media" <?= $prioridad === 'media' ? 'checked' : '' ?>>
            </div>
            <div>
                <label for="prioridad-alta">Alta</label>
                <input type="radio" name="prioridad" id="prioridad-alta" value="alta" <?= $prioridad === 'alta' ? 'checked' : '' ?>>
            </div>
        </fieldset>

        <fieldset>
            <legend>Módulos afectados</legend>
            <div>
                <label for="modulo-login">Login</label>
                <input type="checkbox" name="modulos[]" id="modulo-login" value="login" <?= in_array('login', $modulos) ? 'checked' : '' ?>>
            </div>
            <div>
                <label for="modulo-pagos">Pagos</label>
                <input type="checkbox" name="modulos[]" id="modulo-pagos" value="pagos" <?= in_array('pagos', $modulos) ? 'checked' : '' ?>>
            </div>
            <div>
                <label for="modulo-informes">Informes</label>
                <input type="checkbox" name="modulos[]" id="modulo-informes" value="informes" <?= in_array('informes', $modulos) ? 'checked' : '' ?>>
            </div>
            <div>
                <label for="modulo-perfil">Perfil</label>
                <input type="checkbox" name="modulos[]" id="modulo-perfil" value="perfil" <?= in_array('perfil', $modulos) ? 'checked' : '' ?>>
            </div>
        </fieldset>

        <div>
            <label for="capturaSubida">Captura</label>
            <input type="file" name="capturaSubida" id="capturaSubida">
        </div>

        <input type="submit" name="btnSubida" id="btnSubida">
    </form>
</body>

</html>
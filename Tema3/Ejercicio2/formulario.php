<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <title>Formulario</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <form action="resumen.php" method="post">
        <div class="form-field">
            <label for="nombre" class="form-label">Introduzca su nombre y apellidos:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" style="width: 25%;">
        </div><br>

        <div class="form-field">
            <label for="email" class="form-label">Introduzca su email:</label>
            <input type="email" name="email" id="email" class="form-control" style="width: 25%;">
        </div><br>

        <div class="form-field">
            <label for="URL" class="form-label">URL de tu página:</label>
            <input type="url" name="URL" id="URL" class="form-control" style="width: 25%;">
        </div><br>

        <div class="form-group">
            <label class="form-label">Establece tu sexo</label>
            <div class="mb-3 form-field">
                <input type="radio" name="sexo" id="hombre" value="Hombre" class="radio">
                <label for="hombre">Hombre</label>
            </div>

            <div class="mb-3 form-field">
                <input type="radio" name="sexo" id="mujer" value="Mujer" class="radio">
                <label for="mujer">Mujer</label>
            </div>
        </div><br>

        <div class="form-field">
            <label for="convivientes" class="form-label">Numero de convivientes en su domicilio:</label>
            <input type="number" name="convivientes" id="convivientes" class="from-control" style="width: 25%;">
        </div><br>

        <div class="form-group">
            <label class="form-label">Tus aficiones:</label>

            <div class="form-field">
                <input type="checkbox" id="lectura" name="aficiones[]" class="check" value="Lectura"/>
                <label for="lectura">Lectura</label>
            </div>
            <div class="form-field">
                <input type="checkbox" id="videojuegos" name="aficiones[]" class="check" value="Videojuegos"/>
                <label for="videojuego">Videojuegos</label>
            </div>
            <div class="form-field">
                <input type="checkbox" id="viajar" name="aficiones[]" class="check" value="Viajar"/>
                <label for="viajar">Viajar</label>
            </div>
            <div class="form-field">
                <input type="checkbox" id="deporte" name="aficiones[]" class="check" value="Deporte"/>
                <label for="deporte">Deporte</label>
            </div>
        </div><br>

        <div class="form-field">
            <label for="m_favorito" class="form-label">Menú favorito:</label>
            <select class="form-control" id="m_favorito" name = "m_favorito" style="width: 25%;">
                <option value="McDonald's">McDonald's</option>
                <option value="Burguer King">Burguer King</option>
                <option value="Taco Bell">Taco Bell</option>
                <option value="Domino's Pizza">Domino's Pizza</option>
            </select>
        </div><br>

        <button type="submit" class="btn-solid theme-primary">Resumen</button>

    </form>
</body>

</html>
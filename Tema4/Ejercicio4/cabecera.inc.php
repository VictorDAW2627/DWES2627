<?php 
    $enlaces = "";
    if (isset($_SESSION["loginusu"]) and !empty($_SESSION["loginusu"])) {
        $enlaces = "<a href='pag1.php'>Página 1</a><br><a href='pag2.php'>Página 2</a>";
    }else{
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

<?php echo $enlaces?>

</body>

</html>
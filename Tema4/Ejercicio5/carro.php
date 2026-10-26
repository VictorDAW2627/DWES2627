<?php 
$_SESSION = [];
session_start();
session_destroy();

session_start();

$_SESSION["carro"] = array("total"=>0, "articulos"=>[]);

$lista = "";

$articulos = array(
array("id" => 1, "nombre" => "Zapatillas Nike", "precio" => 60),
array("id" => 2, "nombre" => "Sudadera Domyos", "precio" => 15),
array("id" => 3, "nombre" => "Pala de pádel Vairo", "precio" => 50),
array("id" => 4, "nombre" => "Pelota de baloncesto Molten", "precio" => 20)
);

if (isset($_REQUEST["id"]) and is_numeric($_REQUEST["id"])) {
    for ($i=0; $i < count($articulos); $i++) { 
        if ($articulos[$i]["id"]==$_REQUEST["id"]) {
            $_SESSION["carro"]["articulos"]=[("articulo".count($_SESSION["carro"]["articulos"])+1)=>array($articulos[$i]["nombre"], $articulos[$i]["precio"])];
        }
    }
    header("location: carro.php");
} else if (isset($_SESSION["carro"]["articulos"])and!empty(["carro"]["articulos"])) {
    $lista = creaLista($_SESSION["carro"]["articulos"]);
}

function creaLista(array $articulos) : string {
    $lista = "<ul>";
    $ides = array_keys($articulos);
    foreach ($ides as $id) {
        $lista .= "<li>".$articulos[$id][0]." - ".$articulos[$id][1]."</li>";
        $_SESSION["carro"]["total"]+= $articulos[$id][1];
    }

    $lista .= "</ul><br>Total:".$_SESSION["carro"]["total"];

    return $lista;
}

?>

<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <title>Carro</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <h1>Lista de Artículos</h1>

    <nav>
        <ul>
            <li><a href="carro.php?id=1">Zapatillas Nike</a> (60 euros)</li>
            <li><a href="carro.php?id=2">Sudadera Domyos</a> (15 euros)</li>
            <li><a href="carro.php?id=3">Pala de pádel Vairo</a> (50 euros)</li>
            <li><a href="carro.php?id=4">Pelota de baloncesto Molten</a> (20 euros)</li>
        </ul>
    </nav>

    <h2>Carro de Compras</h2>

    <?php echo $lista ?>

</body>

</html>



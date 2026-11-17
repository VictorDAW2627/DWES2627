# Repaso

## Ejercicio 1:

Una sala de cine tiene 8 filas con 12 butacas cada una. 
Define como constantes estos tamaños y el número de butacas ocupadas (40). 
Guarda el estado de la sala en un array bidimensional donde cada butaca vale 0 (libre) o 1 (ocupada).

Crea la sala con todas las butacas libres y después ocupa 40 butacas elegidas al azar.

No se puede ocupar dos veces la misma: al terminar tienen que quedar exactamente 40 ocupadas y 56 libres.

Calcula cuántas butacas libres tiene cada fila y cuántas ocupadas tiene cada columna. Guarda los totales en dos arrays (nada de una variable distinta para cada fila o columna).

Averigua qué fila tiene más butacas libres y qué columna tiene más butacas ocupadas. Si hay empate, vale la primera.

Muestra la sala en una tabla HTML con una celda por butaca (la letra L si está libre, O si está ocupada) y el texto en estos colores:
Verde: todas las butacas de la fila con más libres.
Rojo: todas las butacas de la columna con más ocupadas.
Azul: la butaca donde se cruzan ambas.
Negro: el resto.

Debajo de la tabla, muestra un resumen guardado en un array asociativo y recorrido con foreach. Numera filas y columnas desde 1 al mostrarlas, aunque en el array empiecen en 0. Debe quedarte algo como esto. Los números de fila y columna cambiarán en cada ejecución, pero siempre habrá 56 libres y 40 ocupadas:

Butacas libres: 56
Butacas ocupadas: 40
Fila con más butacas libres: 3 (9 libres)
Columna con más butacas ocupadas: 7 (6 ocupadas) 

## Ejercicio 2:

Una academia guarda las inscripciones a un curso en inscripciones.txt, con una inscripción por línea y los campos separados por ;:

nombre;dd/mm/aaaa;teléfono;email

El fichero puede tener líneas en blanco, campos con espacios de más y líneas mal formadas. Cópialo tal cual en la misma carpeta que tus scripts:

```
Maria Lopez Garcia;14/03/1999;612345678;maria.lopez@correo.es
Juan Perez;31/02/2001;655443322;juan.perez@correo.es
Ana Ruiz;05/11/1995;96123456;ana.ruiz@correo.es
Pedro Gomez;22/07/2000;611222333;pedro.gomez.correo.es
LUCIA FERNANDEZ;30/12/1998;622333444;lucia@correo.es

Carlos Martin;17/09/2002;633444555;carlos.martin@correo.es
Elena Navarro;01/01/1997;644555666;elena.navarro@correo
Sofia Torres;29/02/2000;677888999;sofia.torres@correo.com
Miguel Angel Ruiz;12/08/1996;688999000;miguel.ruiz@correo.es
Laura Sanz;10/10/2003;699000111
R0berto Gil;03/04/1994;600111222;roberto.gil@correo.es
david moreno;18/06/1993;611000222;david.moreno@correo.es
  Paula Vidal ;27/04/1999; 622111333 ;paula.vidal@correo.es
Sergio Cano;25/12/2001;633222444;sergio.cano@correo.es
Irene MORA;09/05/1992;64433355a;irene.mora@correo.es
Pablo Reyes;15/02/1990;655444666;pablo.reyes@correo.es
Hugo Vega;11/11/2004;688222333;hugo@vega@correo.es
Alba Ortiz;02/06/2001;699333444;alba.ortiz@correo.es
Nuria Prieto;07/09/2000;677111222;nuria.prieto@correo.es
```

Crea estos tres ficheros:

biblioteca.php (se incluye con require_once). Funciones con type hinting en los parámetros y en el valor que devuelven:

-nombreValido(string $nombre): bool: solo letras y espacios, y no vacío.

-fechaValida(string $fecha, string $separador = "/"): bool: formato dd/mm/aaaa (con el separador indicado) y fecha real; por ejemplo, 31/02/2001 no lo es. Debe poder llamarse también como fechaValida("31-12-2026", "-").

-telefonoValido(string $telefono): bool: exactamente 9 dígitos.

-emailValido(string $email): bool: una única @ y, detrás de ella, al menos un punto.

-registraError(array &$errores, int $linea, string $motivo): añade el error de esa línea al array, que se recibe por referencia. No devuelve nada.

inscripciones.php (solo lógica, sin ningún echo). Lee el fichero con file() y, para cada línea:

-Ignora las líneas en blanco (no cuentan como leídas ni como errores).

-Separa los campos con explode y quítales los espacios sobrantes con trim.

-Comprueba que tiene 4 campos y valida cada uno con las funciones de la biblioteca. Si falla, registra el motivo con registraError y pasa a la siguiente línea. Si hay varios fallos, solo el primero, en este orden: campos, nombre, fecha, teléfono, email.

-Si es válida, la guarda en un array de inscripciones válidas (cada una, un array asociativo con nombre, fecha, teléfono y email).

Las líneas se numeran por su posición real en el fichero: la primera es la 1 y las líneas en blanco también cuentan. Al terminar, el script hace include("inscripciones.view.php").

inscripciones.view.php (solo presentación, sin validaciones): una tabla HTML con las inscripciones válidas, la lista de líneas descartadas con su motivo y un resumen con las líneas leídas, las válidas y las descartadas.

Los motivos son número de campos incorrecto, nombre no válido, fecha no válida, teléfono no válido y email no válido. Con el fichero de arriba, la lista y el resumen tienen que salir así:

```
Línea 2: fecha no válida
Línea 3: teléfono no válido
Línea 4: email no válido
Línea 8: email no válido
Línea 11: número de campos incorrecto
Línea 12: nombre no válido
Línea 16: teléfono no válido
Línea 18: email no válido

Líneas leídas: 19
Inscripciones válidas: 11
Líneas descartadas: 8
```

## Ejercicio 3:

El departamento de informática de un instituto quiere registrar incidencias, cada una con una captura de pantalla. Crea la carpeta capturas/ (el servidor web necesita permiso de escritura en ella y en la carpeta de los scripts, donde se creará incidencias.txt) y estos ficheros:

nuevaIncidencia.php y nuevaIncidencia.view.php. La lógica va en el primero, que al final hace include de la vista. Recuerda que los header() tienen que ejecutarse antes de enviar cualquier salida. El formulario se envía a su propia página, por POST y con multipart/form-data, y tiene:

-Título (texto).

-Prioridad (radio): baja, media o alta.

-Módulos afectados (checkboxes): login, pagos, informes y perfil.

-Captura (fichero), sin el campo oculto MAX_FILE_SIZE: el límite lo compruebas tú con size.

Al recibirlo, valida en el servidor (aunque el formulario ya limite las opciones, no te fíes del navegador) y muestra todos los errores en una lista, con estos mensajes exactos:

Si...	                  Mensaje
El título está vacío =>	El título es obligatorio
El título tiene menos de 5 o más de 50 caracteres => El título debe tener entre 5 y 50 caracteres
El título contiene ; (es el separador del fichero) => El título no puede contener ;
La prioridad no se ha elegido o no es una de las tres =>	Elige una prioridad
Ningún módulo marcado, o alguno no es de la lista =>	Marca al menos un módulo
La captura no llega o la subida falla (error distinto de 0) =>	Adjunta una captura
La captura no es JPEG ni PNG (type) =>	La captura debe ser JPEG o PNG
La captura pesa más de 200000 bytes (size) =>	La captura no puede superar los 200 KB

Del título solo se informa del primer fallo, y si la captura no llega no se comprueban ni su tipo ni su tamaño. Si hay errores, vuelve a mostrar el formulario con lo que el usuario había escrito y marcado (título, prioridad y módulos). Si todo es correcto:

-Guarda la captura en capturas/ como captura_<id>.png o captura_<id>.jpg, según su tipo. Nunca uses el nombre original. El <id> es el número de la incidencia (1 la primera, 2 la siguiente...) y sale de contar las líneas de incidencias.txt (1 si no existe).

-Añade a incidencias.txt una línea con el formato id;dd/mm/aaaa hh:mm:ss;ip;título;prioridad;módulos separados por comas;fichero de la captura, por ejemplo: 1;16/11/2026 10:32:05;127.0.0.1;Falla el login;alta;login,pagos;captura_1.png

-Muestra una confirmación con los datos y la captura y, a los 5 segundos, redirige al formulario vacío.

El título lo ha escrito el usuario: cada vez que lo escribas en el HTML, hazlo con htmlspecialchars.

listadoIncidencias.php (un solo fichero: la lógica arriba y el HTML debajo):

-Una tabla con las incidencias, en el orden del fichero: id, fecha, título, prioridad, módulos y la captura como imagen de 100 px de ancho. Si el fichero no existe o está vacío, no hay tabla ni contador: solo el texto No hay incidencias.

-Sobre la tabla, los enlaces Todas | Baja | Media | Alta, que filtran con ?prioridad=baja, ?prioridad=media y ?prioridad=alta, y el texto Mostrando X de Y incidencias (X tras filtrar, Y el total). Si prioridad llega con cualquier otro valor, redirige a listadoIncidencias.php.

-Enlaces entre el listado y el formulario.

Pruebas que debe pasar

-Enviar el formulario vacío: 4 errores (título, prioridad, módulos y captura).

-Un .pdf o .gif: error de tipo. Una imagen de más de 200 KB: error de tamaño (si supera el upload_max_filesize de tu php.ini, PHP la rechaza antes y verás el error de subida). En todos los casos, el título, la prioridad y los módulos siguen rellenos.

-Un envío correcto: confirmación y, a los 5 segundos, formulario vacío; la incidencia aparece en el listado.

-listadoIncidencias.php?prioridad=alta muestra solo las altas, y ?prioridad=x te devuelve al listado completo.

## Ejercicio 4:

Una tienda online mínima. Siguiendo el apartado 4 del documento, el carrito es un dato complejo y esencial para que la tienda funcione, así que va en la sesión. Los últimos productos añadidos son texto simple y prescindible, así que van en una cookie.

Crea estos ficheros, con la lógica arriba y el HTML debajo en cada página. Recuerda que session_start(), setcookie() y header() tienen que ejecutarse antes de enviar cualquier salida.

catalogo.php (cópialo tal cual; las dos páginas lo incluyen con require_once):
php
```
<?php
$catalogo = [
    1 => ["nombre" => "Camiseta", "precio" => 12],
    2 => ["nombre" => "Taza", "precio" => 8],
    3 => ["nombre" => "Libreta", "precio" => 5],
    4 => ["nombre" => "Mochila", "precio" => 30],
    5 => ["nombre" => "Gorra", "precio" => 10],
    6 => ["nombre" => "Pegatinas", "precio" => 3]
];
```

tienda.php. Las acciones van por enlaces con parámetros y, en todos los casos, la página redirige a tienda.php (header y exit) para que al recargar no se repita la acción.

-Tabla con los productos: nombre, precio con el formato 12 € y un enlace Añadir a tienda.php?anadir=ID.

-Sobre la tabla, Unidades en el carrito: N (0 si no hay carrito) y un enlace a carrito.php.

-?anadir=ID: si ID es un id exacto del catálogo (abc, 0, 01, 1.5 o 99 no valen), suma una unidad al carrito y actualiza la cookie; si no, no hace nada.

-La cookie ultimos guarda durante 7 días los ids de los 3 últimos productos distintos añadidos, el más reciente primero y separados por comas. Si añades 1, 2, 1, 3 y 4 por este orden, acaba valiendo 4,3,1. En las DevTools la verás como 4%2C3%2C1, porque PHP codifica la coma.

-Bajo la tabla, si hay recientes, Añadidos recientemente: Mochila, Libreta, Camiseta (nombres, en el mismo orden) y un enlace Olvidar a tienda.php?olvidar=1, que borra la cookie.

-Las cookies las controla el usuario: ignora cualquier valor de ultimos que no sea un id del catálogo, tanto al mostrarla como al actualizarla.

carrito.php:

-Sin carrito: El carrito está vacío y un enlace Seguir comprando a la tienda, sin tabla.

-Con carrito: una tabla con producto, precio, cantidad y subtotal de cada línea, con un enlace Quitar uno (carrito.php?quitar=ID). Debajo, Total: 67 € y los enlaces Vaciar carrito (?vaciar=1), Finalizar compra (?finalizar=1) y Seguir comprando.

-quitar: resta una unidad y, si llega a 0, quita el producto; si ID no está en el carrito, no hace nada. Después redirige a carrito.php.

-vaciar: elimina el carrito de la sesión y redirige a carrito.php.

-finalizar: con el carrito vacío, redirige a carrito.php. Si no, muestra Compra realizada y Has comprado N unidades por T €, y cierra la sesión: borra a mano sus variables y después session_destroy(). Calcula N y T antes de destruirla.

Pruebas que debe pasar

-Añade los productos 1, 2, 1, 3 y 4: Unidades en el carrito: 5, la cookie ultimos vale 4,3,1, Añadidos recientemente: Mochila, Libreta, Camiseta y el carrito suma Total: 67 €.

-Borra la cookie PHPSESSID en las DevTools (Application → Cookies): el carrito se vacía, pero ultimos sigue.

-Cambia ultimos por 9,abc,2 en las DevTools: la tienda solo muestra Taza y no se rompe.

-tienda.php?anadir=99, ?anadir=abc y ?anadir=01 no cambian nada.

-Con 2 camisetas y una mochila, Finalizar compra muestra Has comprado 3 unidades por 54 €; después, el carrito está vacío y ultimos sigue ahí.

## Ejercicio 5:
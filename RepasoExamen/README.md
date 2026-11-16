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
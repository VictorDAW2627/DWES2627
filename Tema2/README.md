# Tema 1

## Ejercicio 1:

Crea una página llamada contador.php. Crea una función llamada cuenta($a, $b
) que reciba dos parámetros y vaya contando de un número al otro, separando los
números por comas. Después, pruébala en el código PHP haciendo que cuente del 10
al 20.

### Resultado:

## Ejercicio 2:

Crea una página llamada intercambia.php. Añade dentro una función llamada inter-
cambia que reciba 2 parámetros numéricos por referencia, y lo que haga sea intercam-
biar sus valores. Es decir, si recibe el parámetro $a y el valor de $b , y $b tome el valor de $a.

### Resultado:

# Ejercicios Finales

## Ejercicio 1:

Crea las siguientes funciones:
Una función que devuelva el mayor de todos los números recibidos como parámetro variables:
function mayor(): int. Utiliza las funciones func_get_args(), etc...
No puedes usar la función max().

### Resultado:

## Ejercicio 2:

Crea una variable de texto con una hora en ella (por ejemplo, “21:30:12”), y luego procésala
para extraer por separado la hora, el minuto y el segundo, y comprobar si es una hora válida.
Por ejemplo, la hora anterior sí debería ser válida, pero si ponemos “12:63:11” no debería serlo,
porque 63 no es un minuto válido.

### Resultado:

## Ejercicio 3:

Añade las siguientes funciones:
• digitos(int $num): int → devuelve la cantidad de dígitos de un número.
• digitoN(int $num, int $pos): int → devuelve el dígito que ocupa, empezando
por la izquierda, la posición $pos.
• quitaPorDetras(int $num, int $cant): int → le quita por detrás (derecha)
$cant dígitos.
• quitaPorDelante(int num, int cant): int → le quita por delante (izquierda)
$cant dígitos.

### Resultado:

## Ejercicio 4:

Vamos a simular un formulario de acceso:
login.php: el formulario de entrada, que solicita el usuario y contraseña. compruebaLogin

.php: recibe los datos y comprueba si son correctos (los usuarios se guardan en un array aso-
ciativo) pasando el control mediante el uso de include a:

ok.php: El usuario introducido es correcto
ko.php: El usuario es incorrecto. Informar si ambos están mal o solo la contraseña. Volver a
mostrar el formulario de acceso.

### Resultado:

# Funciones Predefinidas

## Ejercicio 5:

Lee una frase y devuelve una nueva con solo los caracteres de las posiciones impares.

### Resultado:

## Ejercicio 6:

A partir de una frase con palabras sólo separadas por espacios, devolver:
• Letras totales y cantidad de palabras
• Una línea por cada palabra indicando su tamaño
Nota: no se puede usar str_word_count

### Resultado:

## Ejercicio 7:

Investiga que hace la función str_word_count, y vuelve a hacer el ejercicio.

### Resultado:

## Ejercicio 8:

EsCrIbE uNa FuNcIóN qUe TrAnSfOrMe UnA cAdEnA eN cAnI.

### Resultado:

## Ejercicio 9:

Escribe una función que devuelva un booleano indicando si una palabra es palíndroma (se lee
igual de izquierda a derecha que de derecha a izquierda, por ejemplo, "ligar es ser agil
").

### Resultado:

## Ejercicio 10:

Crea un programa llamado CasasRuralesTelefonos.php que cargue los datos de este
archivo CSV de casas rurales de la provincia de Castellón.
Queremos quedarnos con el id, localidad, nombre y telefono de las casas rurales que tengan un
teléfono definido, descartando el resto.
El programa debe mostrar por pantalla el listado final procesado, y cuántas casas rurales se
han descartado por tener datos nulos.

### Resultado:

## Ejercicio 11:

Con el fichero plantillas.csv muestra en un tabla HTML la plantilla del Atlético de Madrid
ordenada por dorsal.

### Resultado:
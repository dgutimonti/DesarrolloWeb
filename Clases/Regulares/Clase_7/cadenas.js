var cadena = prompt('ingrese una cadena: ', '');
    document.writeln('La cadena ingresada es:' + cadena);
    document.writeln('<br>');
    document.writeln('La cantidad de caracteres son: ' + cadena.length);
    document.writeln('<br>');
    document.writeln('El primer caracter es: ' + cadena.charAt(0));
    document.writeln('<br>');
    document.writeln('Los primeros 3 caracteres son: ' + cadena.substring(0,3));
    document.writeln('<br>');
    if (cadena.indexOf('hola') != 1){
        document.writeln('Se ingreso la subcadena hola');
    } else {
        document.writeln('No se ingreso la subcadena hola');
    }

    document.writeln('<br>');
    document.writeln('La cadena convertida a mayusculas es: ' + cadena.toUpperCase());
    document.writeln('<br>');
    document.writeln('La cadena convertida a minusculas es: ' cadena.toLowerCase());
    
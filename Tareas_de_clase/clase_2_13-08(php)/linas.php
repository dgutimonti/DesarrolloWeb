<html>
<head>

</head>
<body>
<? php 
 $a = 10;
$b = 20;
$c = 30;
$d = 40;

if($a > $b && $a > $c && $a > $d) {
echo "El numero mayor es: $a";
elseif ($b > $c && $b > $d) {
echo " El numero mayo es: $b";
} elseif ($c > $d) {
echo "el numeor mayor es: $c"
} else {
  echo "El mayor es: $d";
}
}
  ?>
</body>
</html>

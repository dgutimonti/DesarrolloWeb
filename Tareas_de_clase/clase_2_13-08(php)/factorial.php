<hTML lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<?php
function factorial($n) {
    if ($n < 0) {
        return null;
    }
    if ($n === 0 || $n === 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

$num = 5;
echo "Factorial de $num es: " . factorial($num);
?>
</body>
</hTML>
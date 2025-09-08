<?php
session_start();
echo "<nav>
      <ul>
        <li><a href=\"yo.php\">Yo</a></li>
        <li><a href=\"mifamilia.php\">Mi Familia</a></li>
        <li><a href=\"misamigos.php\">Mis Amigos</a></li>
        <li><a href=\"miciudad.php\">Mi Ciudad</a></li>
        <li><a href=\"mishobbies.php\">Mis Hobbies</a></li>
        <li><a href=\"enviamemensaje.php\">Envíame un mensaje</a></li>";
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "<li><a href=\"logout.php\">Logout</a></li>";
} else {
    echo "<li><a href=\"login.php\">Login</a></li>";
}
echo "  </ul>
    </nav>";
?>

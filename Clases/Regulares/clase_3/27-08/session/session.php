<?php session_start();
    if(isset($_SESSION['contador'])){
        $_SESSION['contador']++;
    } else {
        $_SESSION['contador']=0;
    }
?>

<p>haz visitado la pagina <?php echo $_SESSION['contador'];?></p>
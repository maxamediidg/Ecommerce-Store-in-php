<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>


<?php 


if(isset($_POST['update'])){

    $id = $_POST['id'];
    $pro_qty = $_POST['pro_qty'];
    $subtotal = $_POST['subtotal'];
    	
    $update = $conn->prepare("UPDATE cart SET pro_qty = '$pro_qty', pro_subtotal = '$subtotal' where id = '$id'");
    $update->execute();


}

?>





<?php require "../includes/footer.php"; ?>

<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>


<?php 


if(isset($_POST['delete'])){

    $id = $_POST['id'];

    	
    $delete = $conn->prepare("delete from cart where id = '$id'");
    $delete->execute();


}

?>





<?php require "../includes/footer.php"; ?>

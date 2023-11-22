<?php
  include("connecter_base.php");
  
?>

<?php

if (isset($_GET['id_service']) && $_GET['id_service'] != "") {
    try {
        $requete = $base->prepare('DELETE FROM service WHERE id_service=:id');
        $requete->execute(array(':id' => $_GET['id_service']));
	echo '<script>window.location.href = "supprimer_service.php";</script>';
	exit();
    } catch (PDOException $e) {
        $message = "You can't delete it because this service is already associated with several users. ";
        $htmlErrorMessage = "<h1>Error occurred during deletion</h1>
                            <p>$message</p>
                            <a href='supprimer_service.php'><button style='background-color: #f44336; color: white; padding: 10px 20px; border: none; text-decoration: none; cursor: pointer; font-size: 16px; border-radius: 4px;'>Go Back</button></a>";
        echo $htmlErrorMessage;
    }
}

?>

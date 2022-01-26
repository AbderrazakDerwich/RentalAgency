<?php
    require '../../vendor/autoload.php';
    $uploads_dir = '../../public/load';
    $_GET['action']=$_GET['action'] ?? null ;
    $id=$_GET['id'] ?? null;
    $act = $_GET['act'] ?? null ;
    if ($_GET['action'] !== null)
    {
        if (count($_POST) > 0)
        {
            foreach ($_FILES["picture"] as $key => $error) 
            {
                if ($error == UPLOAD_ERR_OK) 
                {
                    $tmp_name=$_FILES["picture"]["tmp_name"];
                    $name =$_POST['brand'].".PNG";
                    move_uploaded_file($tmp_name , $uploads_dir.$name);    
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/styleadmin.css">
    <?php require '../link.html' ; ?>
    <title>Page Admin</title>
</head>
<body>
<header>
    <?php require 'header.php' ;?>
</header>
<?php if ( $act !== null ) : ?>
    <div class="alert alert-primary" role="alert">
        Votre<?= $act ?> bien fait !
    </div>
<?php endif ?>
<div class="container">
    <form action='../../Controller/ControllerEditUser.php?action=remplir&&idUpdate=<?= $id ?>' method='POST' enctype='multipart/form-data'>
        <div>
            <label for="model">Modèle</label>    
            <input type='text' name='model' value=""><br>
        </div></br>
        <div>
            <label for="model">Marque</label>
            <input type='text' name='brand' value="<?=  null ;?>" ><br>
        </div></br>
        <div>
            <label for="model">kilométrage</label>
            <input type='number' name='maxMileage' value="<?=  null ;?>"><br>
        </div></br>
        <div>
            <label for="model">Prix par jour </label>
            <input type='number' name='price' value="<?=  null ;?>" ><br>
        </div></br>
        <div>
            <label for="model">Télécharger une image (.jpeg .jpg .png )</label>
            <input type='file' name='picture' "><br>
        </div></br></br>
        <div>
            <button type="submit"  class="btn btn-outline-primary">Enregistrer</button>
        </div>    
    </form>
</div>    
</body>
<header>
    <?php require 'footer.html' ;?>
</header>
</html>

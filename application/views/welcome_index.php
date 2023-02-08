<?php
// security
defined('BASEPATH') OR exit('No direct script access allowed');
// --- 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/regist.css'); ?>">
    <title>Mise en ligne</title>
</head>
<body>
    <div class="content">
        <div class="container">
            <div class="title">Mis en ligne de votre article</div>
            <form action="<?php echo site_url("Insert")?>" method="post" id="formulaire" enctype="multipart/form-data">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Descrivez votre Objet</span>
                        <textarea type="text" name="descri" placeholder="description"></textarea>
                    </div>

                    <div class="input-box">
                        <span class="details"> Prix suggerer : </span>
                        <input type="text" name="prix" placeholder="Prix">
                    </div>

                    <div class="input-box">
                        <span class="details"><label for="uploadBtn"><i class="fa-solid fa-upload"></i>Selectionne les images</label></span>
                        <input type="file" name="files[]" id="uploadBtn" multiple>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" name="submit" value="Ajouter">
                </div>
            </form>
        </div>
        <div class="tit">
            <h1>E-Takalo</h1>
        </div>
    </div>

</body>
</html>
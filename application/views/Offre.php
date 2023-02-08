<?php 
$allobject = $this->GetProduct_model->get_AllObjet(); 
$allmember = $this->GetProduct_model->getMembres();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url("assets/css/Page.css") ; ?>">
    <link rel="stylesheet" href="<?php echo site_url("assets/css/offre.css") ; ?>">
    <link rel="stylesheet" href="<?php echo site_url("assets/fontawesome-5/css/all.css") ; ?>">
    <title>Ha_takalo</title>
</head>
<body>
    <div class="sidebar">
        <div class="profile">
          <div class="logo">
            <h2 class="logo-txt">E-Takalo</h2>
          </div>
          <div class="profile-content">
            <span class="img-p"> <img src="<?php echo site_url("assets/images/profile-2.svg") ; ?>" alt=""></span>
            <figcaption class="names" > <?php echo getNamebyId($allmember , $_SESSION['email'] ) ; ?> </figcaption>
          </div>
          <div class="content-menu">
            <div class="name_fon">
            <span class="name"> <a href="<?php echo site_url("Affiche/getPage") ; ?>">Acceuil</a></span>
              <span class="name"> <a href="<?php echo site_url("Control") ; ?>"> Categorie </a> </span>
              <span class="name"> <a href="<?php echo site_url("Proposition") ; ?>">Notification</a> </span>
              <span class="name"> <a href="<?php echo site_url("Ajouter") ; ?>"> Ajouter </a> </span>
            </div>
          </div>
      </div>
    </div>
    <div class="boite-content">
      <div class="echange">
          <h1>Objet a echanger</h1>
          <span cla><img src="<?php echo site_url("assets/images/upload/".GetPhoto($allobject, $_SESSION['offre']))   ; ?>" alt="" srcset="" width="300px"  height="250px"></span>
      </div>
      <div class="objet">
          <h1>Mon Objet</h1>
      </div>
      <form action="<?php echo site_url("AddTransaction") ; ?> " method="get">
        <input type="hidden" name="objetEchange" value="<?php echo $_SESSION['offre'] ; ?>">
        <div class="contains-offre">
            <div class="photo">
              <?php
                    $tab = $this->GetProduct_model->get_data_objetbyId($_SESSION['email']); 
                    for ($i=0; $i < count($tab) ; $i++) { ?>
                        <div class="contain">
                            <span><img src="<?php echo site_url("assets/images/upload/".GetPhoto($allobject, $tab[$i]['id'])  ) ; ?>" alt="" srcset="" width="200px"  height="200px"></span>
                            <span class="name"> <?php echo $tab[$i]['descri'] ; ?> </span>
                            <span><input type="checkbox" name="<?php echo $tab[$i]['id'] ; ?>" class="cm-toggle"> </span>
                        </div>
                    <?php }
              ?> 
            </div>
            <div class="input">
              <input type="submit" value="Echanger">
            </div>
        </div>
      </form>
    </div>
</body>
</html>

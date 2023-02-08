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
    <link rel="stylesheet" href="<?php echo site_url("assets/css/Notification.css") ; ?>">
    <link rel="stylesheet" href="<?php echo site_url("assets/fontawesome-5/css/all.css") ; ?>">
    <title>Ireo_takalo</title>
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
      
      <div class="containse">
          <?php
          $tab = $this->GetProduct_model->verifPropostion($_SESSION['email']);

          $idPropo = $this->GetProduct_model->get_Idroposition();
          
          for ($i = 0; $i < count($idPropo); $i++) {
              $obj = $this->GetProduct_model->getObjet($idPropo[$i]['idA_echanger']);
              if ($obj['idMembre'] == $_SESSION['email']) {
                  ?>
              <div class="contain-echange">
                    <div class="myProduit">
                        <span>  <img src="<?php echo site_url("assets/images/upload/" . GetPhoto($allobject, $idPropo[$i]['idA_echanger'])); ?>" width="150px"  height="150px"></span>
                    </div>
                    <div class="echange">
                        <span>Echange =></span>
                    </div>
                    <div class="Propose">
                        <?php
                        for ($j = 0; $j < count($tab); $j++) {
                            if ($idPropo[$i]['idA_echanger'] == $tab[$j]['idA_echanger']) { ?>     
                                    <span> <img src="<?php echo site_url("assets/images/upload/" . GetPhoto($allobject, $tab[$j]['idB_echanger'])); ?>" width="150px"  height="150px"></span>
                               <?php }
                        } ?>
                    </div>
                    <a  class="accepter" href="<?php echo site_url("Accept/index/" . $idPropo[$i]['idA_echanger']); ?> " >Accepter</a><a class="refuser" href="">Refuser</a>
              </div>
            <?php }
          }
          ?>
      </div>
</body>
</html>

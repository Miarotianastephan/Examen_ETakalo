<?php
    $categoire = $this->GetProduct_model->get_data_categorie();
    $objetBycategorie = $this->GetProduct_model->get_objetbycatego();
    $allmember = $this->GetProduct_model->getMembres();
    $details = $this->GetProduct_model->get_AllObjet();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url("assets/css/Page.css") ; ?>">
    <link rel="stylesheet" href="<?php echo site_url("assets/fontawesome-5/css/all.css") ; ?>">
    <link rel="stylesheet" href="<?php echo site_url("assets/css/Categorie.css") ; ?>">
    <script src="<?php echo site_url("assets/js/Affiche.js") ; ?>" defer></script>
    <title>Document</title>
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
              <span class="name"> <a href="<?php echo site_url("Proposition") ; ?>">Notification</a> </span>
              <span class="name"> <a href="<?php echo site_url("Ajouter") ; ?>"> Ajouter </a> </span>
              <span class="name"> <a href="<?php echo site_url("Control") ; ?>"> Categorie </a> </span>
            </div>
          </div>
      </div>
    </div> 
    <div class="contain-marque">
      <div class="marque">
            <?php
                for ($i=0; $i <count($categoire)  ; $i++) { ?>
                      <span class="filter-btn" data-project="<?php echo  $categoire[$i]['id'] ; ?>"> <?php echo  $categoire[$i]['nomcategorie'] ; ?> </span>
              <?php } 
            ?>
            <span class="filter-btn active" data-project="all">Tous</span>
        </div>
    </div>
      <div class="contains filter-project-items">
          <?php
              for ($j=0; $j < count($objetBycategorie) ; $j++) { ?>
                  <div class="contain filter-project-item" data-project="<?php echo $objetBycategorie[$j]['idCategorie'] ; ?>">
                        <span>
                            <img src="<?php echo site_url("assets/images/upload/".GetPhoto($details , $objetBycategorie[$j]['idObjet'] )) ; ?>" alt="" width="250px" height="250px">
                        </span>
                        <span class="name">
                            <?php 
                              $object  = $this->GetProduct_model->getObjet($objetBycategorie[$j]['idObjet'])  ;
                              echo $object['descri'];
                            ?>
                        </span>
                  </div>
              <?php }
          ?>
      </div>
    
</body>
</html>
<?php
    $tab = array();
    $allmember = $this->GetProduct_model->getMembres();
    $type = getTypebiid($allmember, $_SESSION['email']);
$tab = $_SESSION['tablo'];
$big = $this->GetProduct_model->get_AllObjet() ;
$categoire = $this->GetProduct_model->get_data_categorie();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url("assets/css/Page.css") ; ?>">
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
              <span class="name"> <a href="<?php echo site_url("Control") ; ?>"> Categorie </a> </span>
              <span class="name"> <a href="<?php echo site_url("Proposition") ; ?>">Notification</a> </span>
              <span class="name"> <a href="<?php echo site_url("Ajouter") ; ?>"> Ajouter </a> </span>
              <?php
                  if($type == 0){ ?>
                      <span class="name"> <a href="<?php echo site_url("Stat") ; ?>"> Statistique </a> </span>
                  <?php } 
              ?>
            </div>
          </div>
      </div>
    </div>
      <div class="contains filter-project-items">
          <?php
              for ($i=0; $i < count($tab) ; $i++) { ?>
                  <div class="contain filter-project-item">
                      <span cla><img src="<?php echo site_url("assets/images/upload/" .GetPhoto($big,$tab[$i]['id'])  ); ?>" alt="" srcset="" width="300px"  height="250px"></span>
                      <span class="name"> <?php echo $tab[$i]['descri'] ; ?> </span>
                  </div>
              <?php }
          ?>
      </div>
</body>
</html>

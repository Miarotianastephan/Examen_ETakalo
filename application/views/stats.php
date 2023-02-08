<?php
    $tab = array();
    $allmember = $this->GetProduct_model->getMembres();
    $type = getTypebiid($allmember, $_SESSION['email']);
if ($type == 0) {
  $tab = $this->GetProduct_model->get_data_objet();
}
else{
  $tab = $this->GetProduct_model->get_data_objetbyDiif($_SESSION['email']);
}
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
    <link rel="stylesheet" href="<?php echo site_url("assets/css/style_inscription.css") ; ?>">
    <link rel="stylesheet" href="<?php echo site_url("assets/fontawesome-5/css/all.css") ; ?>">
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
                      <span class="name"> <a href=""> Statistique </a> </span>
                  <?php } 
              ?>
            </div>
          </div>
      </div>
    </div>
      <div class="contains filter-project-items">
            <div class="stat">
              <span>
                  Nombre des Membres inscris : <?php $nbr =   $this->GetProduct_model->countMember() ;
                  echo $nbr['n']; ?>
              </span>
              <span>
                  Nombre des Echange effectuer : <?php $nbrs = $this->GetProduct_model->countEchance() ;
                  echo $nbrs['n']; ?>
              </span>
            </div>
                
              <div class="histo">
                    <?php
                        $tablo = $this->GetProduct_model->histo();
                        for ($i=0; $i < count($tablo)  ; $i++) {  ?>
                            <div class="histo">
                                <span>Ancien : <?php echo $tablo[$i]['idAncproprio'] ; ?></span>
                                <span>l'Objet : <?php echo $tablo[$i]['idObjet'] ; ?></span>
                                <span>Date : <?php echo $tablo[$i]['dtappart'] ; ?></span>
                            </div>
                        <?php }
                    ?>
              </div>
      </div>
</body>
</html>

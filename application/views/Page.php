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
              <span class="name"> <a href="<?php echo site_url("Deconnexion") ; ?>"> Deconnexion </a> </span>
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
                      <?php if($type == 0) { ?>
                          <form class="forma" action ="<?php echo site_url("AddCategorie"); ?>" method="get">
                            <span>Categorie : </span>
                              <select name="catego" id="">
                                <?php
                                  for ($j=0; $j < count($categoire) ; $j++) { ?>
                                    <option value="<?php echo $categoire[$j]['id'] ; ?>"><?php echo $categoire[$j]['nomcategorie'] ; ?></option>
                                  <?php } 
                                ?>
                              </select>
                              <input type="hidden" name="objet" value="<?php echo $tab[$i]['id'] ; ?> ">
                              <input type="submit" value="ajouter">
                          </form>
                      <?php } else{ ?>
                        <span class="modify"> <a href="getOffre/<?php echo $tab[$i]['id'] ; ?>">  faire une echange </a> </span>
                     <?php } ?>
                      
                  </div>
              <?php }
          ?>
      </div>
      <div class="Recherche">
        <h1>Recherche</h1>
        <form  action="<?php echo site_url("Recherche") ; ?>" method="get">
          <input type="text" name="recherche" placeholder="recherche...">
          <select name="catego" id="">
          <option value="all">all</option>
              <?php
                  for ($j=0; $j < count($categoire) ; $j++) { ?>
                    <option value="<?php echo $categoire[$j]['id'] ; ?>"><?php echo $categoire[$j]['nomcategorie'] ; ?></option>
                  <?php } 
              ?>
            </select>  
            <input type="submit" value="Recherche"> 
        </form> 
      </div>
      <footer>
            <div class="footer-content">
                <h3>Copyright &copy; by e-TAKALO</h3>
                <ul class="social">
                    <li><a href="#">Rakotonavalona Andriatoavina Andy : Etu001829 <i class="fa logo"></i></a></i></li>
                    <li><a href="#">Ramanantsoa Miarotiana Stephan Etu:001846<i class="fa logo"></i></a></i></li>
                    <li><a href="#">RINAH Etu:001786<i class="fa logo"></i></a></i></li>
                </ul>
            </div>
            <div class="footer-bottom">
                <p>Madagascar</p>
            </div>
        </footer>
</body>
</html>

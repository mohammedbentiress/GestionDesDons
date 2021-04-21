<!DOCTYPE html>
<?php
  require '../Controller/mainController.php';
  $controller = new mainController();
  $donneurs = $controller->GetDonneurs();


        
  if(isset($_POST['addDon']) 
      &&isset($_POST['donName']) && !empty($_POST['donName']) 
      && isset($_POST['donneurName']) && !empty($_POST['donneurName'])
      && isset($_POST['donType']) && !empty($_POST['donType']))
    {
        $donneurName = preg_replace('/[_]/', ' ', $_POST['donneurName']);
        $donName = $_POST['donName'];
        $donneurID = $controller->getDonneurID($donneurName);
        $donType= $_POST['donType'];
        

        $result = $controller->createDon($donName, $donType, $donneurID);
        if($result > 0){
            header("location: DonsView.php");
        }
        else
        {
            echo "error";
        }
    }
?>
<html>
  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
    <style>
      .bd-form {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      .std-form {
        padding: 40px;
        background-color: #f8f9fe;
        width: 80%;
      }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="http://localhost/gestiondesdons/index.php">Acceuil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link btn btn-outline-info " href="http://localhost/gestiondesdons/Views/DonsView.php">List des dons</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ajouter don<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/gestiondesdons/Views/DonneurForm.php">Ajouter donneur</a>
        </li>
        <form method="POST" class="form-inline">
            <div class="col-sm-10">
                    <select class="custom-select" name="donneurName" id="donneurName" required>
                    <option value="">Filtrez par donneur </option>
                    <?php 
                        foreach($donneurs as $donneur)
                            {?>
                                <option value=<?php echo preg_replace('/\s+/', '_', $donneur['donneur_name'])?> ><?php echo $donneur['donneur_name'] ?></option>
                            <?php } 
                    ?>
                    </select>
            </div>
            <button class="btn btn-outline-info my-2 my-sm-0" name="filterDonneur" type="submit">Recherche</button>
        </form>

      </ul>
    </div>
  </nav>
    <div class="bd-form">
      <form class="row g-3 std-form" method="post" action="">
        <div class="row mb-3">
          <label for="donName" class="col-sm-2 col-form-label"
            >Nom de Don</label
          >
          <div class="col-sm-10">
            <input name="donName" type="text" class="form-control" id="donName" required/>
          </div>
        </div>
        <div class="row mb-3">
          <label for="donType" class="col-sm-2 col-form-label"
            >Type de don</label
          >
            <div class="col-sm-10">
                <select class="custom-select" name="donType" required id="donType">
                    <option value="">Choisissez un type de don</option>
                    <option value="somme_argent">Somme d'argent</option>
                    <option value="vetement">Vêtement</option>
                    <option value="produit_alimentaire">Produit alimentaire</option>
                </select>
                <div class="invalid-feedback">Choisie un type de don</div>
            </div>
        </div>
        <div class="row mb-3">
          <label for="donneurID" class="col-sm-2 col-form-label"
            >ID Donneur</label
          >
            <div class="col-sm-10">
                <select class="custom-select" name="donneurName" id="donneurName" required>
                <option value="">Choisissez un donneur </option>
                <?php 
                    foreach($donneurs as $donneur)
                        {?>
                            <option value=<?php echo preg_replace('/\s+/', '_', $donneur['donneur_name'])?> ><?php echo $donneur['donneur_name'] ?></option>
                        <?php } 
                ?>
                </select>
                <div class="invalid-feedback">Choisie un type de don</div>
            </div>
        </div>
        
        <button type="submit" name="addDon" class="btn btn-info">Add</button>
      </form>
    </div>
  </body>
</html>

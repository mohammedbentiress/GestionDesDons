<!DOCTYPE html>
<?php
  require '../Controller/mainController.php';
  $controller = new mainController();
  $donneurs = $controller->GetDonneurs();


        
  if(isset($_POST['addDonneur']) 
      &&isset($_POST['donneurName']) && !empty($_POST['donneurName']) 
      && isset($_POST['teleNumber']) && !empty($_POST['teleNumber']))
    {
        $donneurName = $_POST['donneurName'];
        $teleNumber = $_POST['teleNumber'];
        
        var_dump($donneurName);
        var_dump($teleNumber);
        $result = $controller->createDonneur($donneurName, $teleNumber);
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
          <a class="nav-link" href="http://localhost/gestiondesdons/Views/DonForm.php">Ajouter don</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ajouter donneur<span class="sr-only">(current)</span></a>
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
          <label for="donneurName" class="col-sm-2 col-form-label"
            >Nom de donneur</label
          >
          <div class="col-sm-10">
            <input name="donneurName" type="text" class="form-control" id="donneurName" required/>
          </div>
        </div>
        <div class="row mb-3">
          <label for="teleNumber" class="col-sm-2 col-form-label"
            >Numéro de telephone</label
          >
          <div class="col-sm-10">
            <input name="teleNumber" type="text" class="form-control" id="teleNumber" required/>
          </div>
        </div>
        
        <button type="submit" name="addDonneur" class="btn btn-info">Add</button>
      </form>
    </div>
  </body>
</html>

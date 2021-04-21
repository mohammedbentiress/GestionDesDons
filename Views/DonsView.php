<?php 
    require '../Controller/mainController.php';
    $controller = new mainController();
    $dons = $controller->getDons();
    $donneurs = $controller->GetDonneurs();
     if(isset($_POST['filterDonneur']) 
      &&isset($_POST['donneurName']) && !empty($_POST['donneurName']) )
    {
        $donneurName = preg_replace('/[_]/', ' ', $_POST['donneurName']);
        $donneurID = $controller->getDonneurID($donneurName);
        $dons = $controller->getDons($donneurID);

        if(count($dons) > 0){
            $dons = $controller->getDons($donneurID);
        }
        else
        {
            echo "error";
        }
    }





    ?>
    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
</body>
<head>

<style>
    .btns-list{
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
</style>

</head>
<body >
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="http://localhost/gestiondesdons/index.php">Acceuil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link btn btn-outline-info " href="#">List des dons<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/gestiondesdons/Views/DonForm.php">Ajouter don</a>
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
    <div class="container">
    <h1>Students list</h1>
        <table class="table">
            <thead class="table-dark">
            <tr >
                <th>ID</th>
                <th>Nom de don</th>
                <th>Type de don</th>
                <th>Donneur</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                foreach($dons as $don)
                {?>
                    <tr>
                        <?php  
                            foreach($don as $key => $value)
                            {
                                ?> 
                                <td>
                                <?php
                                if($key == "donneur_ID")
                                {
                                    echo $controller->getDonneurName($value);
                                } 
                                else {
                                     echo $value;
                                }
                            } ?>
                            </td>
                    </tr>
                <?php } 
            ?>
            </tbody>
        </table>
    <div class="row justify-content-center">
        <a class="col-4 btn btn-primary" href="studentForm.php">Add student</a>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>



</html>
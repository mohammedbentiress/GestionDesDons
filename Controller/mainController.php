<?php
    require "../Model/don.php";
    require "../Model/donneur.php";
    require "../DAO/donDAO.php";
    require "../DAO/donneurDAO.php";
class mainController
{
    /**
     * Gett the list of all dons
     *
     * @return array
     */
    public function getDons(?int $donneurID=null):array
    {
        $donDao = new DonDAO();
        $dons = $donDao->selectDons($donneurID);
        $donsList= [];
        while($don = mysqli_fetch_assoc($dons))
        {
           array_push($donsList, $don);
        }
        return $donsList;
    }

    /**
     * Create a new don 
     *
     * @param string $donName
     * @param string $donType
     * @param integer $donneur_ID
     * @return integer
     */
    public function createDon(string $donName, string $donType, int $donneur_ID):int
    {
        $donDAO = new DonDAO();
        $don = new Don($donName, $donType, $donneur_ID);
        $don = $donDAO->insertDon($don);
        return $don;
    }

    /**
     * Gett the list of all donneurs
     *
     * @return array
     */
    public function GetDonneurs():array
    {
        $donDAO = new DonneurDAO();
        $dons = $donDAO->selectDonneurs();
        $donsList= [];
        while($don = mysqli_fetch_assoc($dons))
        {
           array_push($donsList, $don);
        }
        return $donsList;
    }

     /**
      * Create a new donneur
      *
      * @param string $donneurName
      * @param string $teleNumber
      * @return integer
      */
    public function createDonneur(string $donneurName, string $teleNumber):int
    {
        $donneurDAO = new DonneurDAO();
        $donneur = new Donneur($donneurName, $teleNumber);
        $donneur = $donneurDAO->insertDonneur($donneur);
        return $donneur;
    }
    /**
     * get Donneur name from donneur ID 
     *
     * @param integer $donneurID
     * @return void
     */
    public function getDonneurName(int $donneurID):string
    {
        $donneurDAO = new DonneurDAO();
        $donneur = $donneurDAO->donneurNameFromDonneurID($donneurID);
        return mysqli_fetch_row($donneur)[0];  
    }
     
    /**
     * get Donneur Id from donneur name
     *
     * @param integer $donneurID
     * @return void
     */
    public function getDonneurID(string $donneurName):int
    {
        $donneurDAO = new DonneurDAO();
        $donneur = $donneurDAO->donneurIDFromDonneurName($donneurName);
        return mysqli_fetch_row($donneur)[0];  
    }


}

$test = new mainController();

//var_dump($test->createDon('Don 3','somme_argent',1));

//var_dump($test->createDonneur('Mohammed Bentiress', '+212 75826934'));


//var_dump($test->GetDonneurs());
// var_dump($test->getDons(2));
// echo "********************************";
//var_dump($test->getDons());
// var_dump($test->getDonneurName(1));
// var_dump($test->getDonneurID("Amine Jamla"));
<?php 
require '../../vendor/autoload.php';
use App\Utils\DB;
use App\Repository\RepositoryUser;
use App\Repository\RepositoryVicule;
use App\Entitie\User;
use App\Utils\Tools;
session_start();
$db=DB::getInstace();
$manageruser=new RepositoryUser($db);
$manager=new RepositoryVicule($db);
$data=$manager->read();
$item=$manageruser->selectByEmail($_SESSION['email']);
$brand=[];
foreach($data as $given ) 
{
    if (in_array($given->getbrand(),$brand)===false)
    {
        array_push($brand,$given->getbrand());
    }
}
//print_r($brand);
// pagination
$limit=4;
$nbrbrand=count($brand);
$pages = ceil($nbrbrand/4);
$page = $_GET['page'] ?? 0 ; 
?>
<!DOCTYPE html>
<?php require '../link.html' ; ?>
<html>
<body>
<nav class="navbar navbar-dark bg-primary" style="margin-bottom: 10%;">
    <div class="container-fluid">
        <form class="d-flex input-group w-auto">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon"/>
            <span class="input-group-text text-white " id="search-addon"><button  type="submit" class="btn btn-outline-success btn-sm">Search</button></span>
        </form>
        <span class="navbar-text" style="color:brown;">
            <span style="font-size: 15px; float: left; vertical-align: top;font-style: italic;color:lavenderblush;" > bienvenue monsieur <span style="color:lightsalmon;"><?= $item->getFirstName()." ".$item->getLastName() ?></span> dans votre espace client </span>
            <span style="font-size: 15px; float: right; vertical-align:top;color:lavenderblush;padding-left:70px" ><a href="../logout.php"> Deconnexion</a></span>
        </span>
        
    </div>
</nav>
<link rel="stylesheet" href="../../public/css/styleuser.css">
<div class="row" style=" margin-left: 1% ; ">
    <h5 class="card-title" style="text-align: center;">Liste de voiture disponible</h5>
        <?php for($i=$page;$i<($page+$limit);$i++) : ?>
            <?php if (!empty ($brand[$i])) : ?>
                <div class="col-3">
                    <div class="card" style="width: 16rem ;height: 16rem; border: thick double #32a1ce;margin-bottom:10%;" >
                        <img class="card-img-top"  src="<?= Tools::lien($brand[$i]) ?>"  alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center;"><?= $brand[$i] ?></h5>
                            <a href="rent.php?brand=<?= $brand[$i] ?>" > Liste </a>
                        </div>
                    </div>
                </div>
            <?php endif ?> 
        <?php endfor ?> 
</div>

<ul class="w3-pagination w3-border w3-round">
   <?php if ($page>=4): ?> 
        <a href="?page=<?= $page-$limit ?>">&#10094; Previous</a>
    <?php endif ; ?>
    <?php if ($page<$nbrbrand-$limit): ?>
        <a href="?page=<?= $page+$limit ?>">Next &#10095;</a>
    <?php endif ; ?>
</ul>
</body>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php require '../link.html' ; ?>
    <link rel="stylesheet" href="../../public/css/stylelogin.css">
</head>
<header>
    <?php if (!empty($_GET['error'])) : ?>
        <div class="alert alert-danger" role="alert">
            <strong><center>N'avez pas un compte!  voici le lien d'inscription au dessous </center></strong>
        </div>
    <?php endif  ?>
</header>
<body>
<div id="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col">               
                <div class="card box">
                    <div class="card-body p-3">
                       <h1 class="display-4 text-center pb-4 logo">bienvenue</h1>
                       <!--  Formulaire -->
                        <form action="../../Controller/ControllerLogin.php?action=user" method="POST">
                            <div class="form-group">
                                <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email"  name="email" class="form-control" placeholder="email"> </div>
                            </div>
                            </br>  
                            <div class="form-group">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                    <input type="password"  name="password" class="form-control" placeholder="Mot de passe"> </div>
                            </div>
                            </br>
                            <button type="submit"  class="btn btn-primary btn-block">Login</button> 
                        </form>
                    </div> 
                    </hr>
                    <a href="../inscription/index.php" class="text-center small pb-2">Inscription</a> </div>
                </div>     
            </div><!-- /container -->
        </div><!-- /login -->
    </div>
</div>
</body>
</html>
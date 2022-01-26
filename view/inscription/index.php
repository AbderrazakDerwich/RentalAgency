<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php require '../link.html'; ?>
    <link rel="stylesheet" href="../../public/css/styleinscription.css">
</head>

<body>
    <div id="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card box">
                        <div class="card-body p-3">
                            <h1 class="display-4 text-center pb-4 logo">Inscription</h1>
                            <?php $_GET['action'] = $_GET['action'] ?? 'none'; ?>
                            <?php if ($_GET['action'] === 'false') : ?>
                                <div class="alert alert-success" role="alert">
                                    Accédez à votre compte en cliquant sur le lien <span><a href='../login/index.php' style="color:brown">Login</a></span>
                                </div>
                            <?php endif ?>
                            <?php if ($_GET['action'] === 'true') : ?>
                                <div class="alert alert-danger" role="alert">
                                    cette adresse est déjà utilisée
                                </div>
                            <?php endif ?>
                            <form method="POST" action="../../Controller/ControllerInscription.php?user=user">

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nom <span style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="firstname" placeholder="Votre nom " required>
                                    </div>
                                </div>
                                </br>
                                
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Prenom<span style="color:red;"> *</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="lastname" placeholder="Votre prenom">
                                    </div>
                                </div>
                                </br>
                                
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email<span style="color:red;"> *</span></label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                                </br>
                                
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password<span style="color:red;"> *</span></label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div>
                                </div>
                                </br>
                                
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0"> Sex </legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" value="male">
                                                <label class="form-check-label" for="inlineRadio1">Masculin</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" value="feminine">
                                                <label class="form-check-label" for="inlineRadio2">féminin</label>
                                            </div>
                                        </div>
                                </fieldset>
                                </br>
                                
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                </div>

                            </form>
</body>

</html>
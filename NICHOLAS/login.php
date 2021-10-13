
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#032d55">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#032d55">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#032d55">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="shortcut icon" href="//virtual.iscp.edu.br/pluginfile.php/1/theme_moove/favicon/1574420247/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="bg">
        <div class="container">
            <div class="row justify-content-md-center form-align-middle align-items-center">
                <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                    <div class="form-login">
                        <form action="https://virtual.iscp.edu.br/login/index.php" method="post" id="login" class="loginform">
                            <img src="./img/logo.png" class="logo"><br>
                                                        <input name="username" type="text" id="login_username" class="form-control input-sm" placeholder="Usuário Intranet"><br>
                            <input name="password" type="password" id="login_password" class="form-control input-sm" placeholder="Senha Intranet"><br>
                            <div class="btn-login">
                                <span class="group-btn"><input type="submit" value="Acessar" class="btn btn-primary"></span><br>
                            </div>
                            <span style="text-align: right; font-size: 0.7em">
                                <a href="https://suporte.iscp.edu.br" target="_blank"><i class="fa fa-envelope-o" aria-hidden="true"></i> Suporte Técnico</a>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(".alert").fadeTo(2000, 500).slideUp(500, function() {
        $(".alert").slideUp(3000);
    });
</script>

</html>
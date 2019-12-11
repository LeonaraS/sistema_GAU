<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./../../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="./../../node_modules/mdbootstrap/css/mdb.min.css">

    <!--  Css -->
    <link rel="stylesheet" href="./../../assets/css/app.css">

    <title>GAU</title>

</head>

<body>

    <div class=" view  img_login_back ">
        <div class="mask rgba-black-strong">
        
            <div class="container-fluid ">
                <div class="row d-flex justify-content-end mr-5">
                     <a href="./../../index.php" class="text-success"><i class="fas fa-home fa-2x text-success mt-4"></i> Ínicio</a>   
                 </div>

                <div class="container">
                     <div class="row d-flex justify-content-center align-items-center height">

   

                        <!-- Default form login -->
                        <form action="./../../source/Controllers/class.session.php" class="text-center border-none " id="form_login"  method="post">

                            <div class="container mb-2">
                                <div class="row d-flex justify-content-center">
                                        <img class="img-fluid size_img_login"  src="./../../assets/img/logo400.png" alt="GAU">
                                </div>
                            </div>

                            <!-- Email -->
                            <input type="email" name="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

                            <!-- Password -->
                            <input type="password" name="senha" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Senha">

                            

                            <!-- Sign in button -->
                            <button class="btn btn-success btn-block my-4 btn_color_login" type="submit" name="enviar" value="enviar">Logar</button>

                            <!-- Register -->
                            <p class="text-white">Ainda não possui uma conta?
                                <a class="text-success" href="./../cadastrar/cadastro.php">Cadastre-se</a>
                            </p>

                    
                        </form>
                        <!-- Default form login -->
                        
                    </div>
                </div>
            </div>
        </div>   





    <!-- JQuery MDB  -->
    <script type="text/javascript" src="./../../node_modules/mdbootstrap/js/jquery-3.4.1.min.js"></script>

    <!-- MDB   -->
    <script type="text/javascript" src="./../../node_modules/mdbootstrap/js/popper.min.js"></script>

    <!-- Bootstrap  -->
    <script type="text/javascript" src="./../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- MDB  -->
    <script type="text/javascript" src="./../../node_modules/mdbootstrap/js/mdb.min.js"></script>

    <!-- jquery -->

    <script src="./../../node_modules/jquery/dist/jquery.min.js"></script>

    <!-- Validate -->
    <script src="./../../node_modules/jquery-validation/dist/jquery.validate.min.js"></script>

    <script src="./../../node_modules/jquery-validation/dist/additional-methods.js"></script>

    <script src="./../../node_modules/jquery-validation/dist/localization/messages_pt_BR.js"></script>
     <!-- validate script -->
     <script type="text/javascript">

        $(document).ready(function() {

            $("#form_login").validate({
                rules: {
                    email:
                    {
                        required: true,
                        email: true
                    },
                    senha:
                    {
                        required: true
                    }
                }
            });

        });
    </script>

</body>

</html>
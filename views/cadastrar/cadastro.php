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

    <div class=" view  img_cadastro ">
        <div class="mask rgba-black-strong">

            <div class="container-fluid">
                <div class="row d-flex justify-content-end mr-5">
                    <a href="./../../index.php" class="text-success"><i class="fas fa-home fa-2x text-sucess mt-2"></i>
                        Ínicio</a>
                </div>
            </div>

            <div class="alert text-center" role="alert">
                <?php

                    require './../../source/Controllers/class.db.php';

                    require './../../source/Controllers/class.cidadao.php';

                    if (isset($_POST['Cadastrar']) && $_POST['Cadastrar'] === 'Cadastrar') {
                        
                        $cidadao = new Cidadao();
                        $cidadao->setNome($_POST['nome']);
                        $cidadao->setCpfCnpj($_POST['cpf_cnpj']);
                        $cidadao->setRg($_POST['rg']);
                        $cidadao->setFoneFixo($_POST['fone_fixo']);
                        $cidadao->setCelular($_POST['celular']);
                        $cidadao->setEmail($_POST['email']);
                        $cidadao->setSenha($_POST['senha']);
                        $cidadao->adicionar();
                    }
                ?>
            </div>

            <div class="container ">

                <div class="d-flex justify-content-center">
                    <p class="h1 font-weight-light text-white ">Cadastrar Usuário</p>
                </div>
                <!-- <hr class="bg-white"> -->
                <form action="" method="post" name="form_cadastro" id="form_cadastro" accept-charset="utf-8" onsubmit="return valida()">
                    <div class="form-row">

                        <div class="form-group col-md-6 text-white ">
                            <label>Nome completo:</label>
                            <input type="text" name="nome" value="" class=" Resultado form-control" placeholder="">
                        </div>

                        <div class="form-group col-md-6 text-white">
                            <label>CPF:</label>
                            <input type="text" class="Resultado form-control" name="cpf_cnpj" value="" placeholder="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 text-white">
                            <label>RG:</label>
                            <input type="text" class="form-control" name="rg" value="" placeholder="">
                        </div>

                        <div class="form-group col-md-6 text-white">
                            <label>Fone fixo:</label>
                            <input type="number" class="form-control" name="fone_fixo" value="" placeholder="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 text-white">
                            <label>Celular:</label>
                            <input type="number" class="form-control" name="celular" value="" placeholder="">
                        </div>

                        <div class="form-group col-md-6 text-white">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" value="" placeholder="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 text-white">
                            <label>Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha" value=""
                                placeholder="senha de 8 a 10 caracteres" minlength="8" maxlength="10">
                        </div>

                        <div class="form-group col-md-6 text-white">
                            <label>Repita a senha:</label>
                            <input type="password" class="form-control" name="senha2" value=""
                                placeholder="repita a senha anterior" >
                        </div>
                    </div>

                    <!-- Entrar -->
                    <p class="text-white text-center">Já possui uma conta?
                        <a class="text-success" href="./../login/login.php">Entre</a>
                    </p>

                    <div class=" d-flex align-items-center justify-content-center  ">
                        <div class="sizebtn row d-flex justify-content-center text-center ">
                            <button type="submit" class="sizebtn btn btn-success" name="Cadastrar"
                                value="Cadastrar">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    
    <!-- JQuery MDB -->
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

        $("#form_cadastro").validate({
            rules: {
                nome: {
                    required: true,
                    maxlength: 100,
                    minlength: 5,
                    minWords: 2,
                },
                cpf_cnpj: {
                    required: true,
                    cpfBR: true,
                },
                rg: {
                    required: true
                },
                fone_fixo: {
                    required: true
                },
                celular: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                senha: {
                    required: true
                },
                senha2: {
                    required: true,
                    equalTo:"#senha"
                }
            },
            messages:
            {
          nome:{ 
            required: "O campo nome é obrigatório.",
            minlength: "O campo nome deve conter no mínimo 3 caracteres."
          },
          cpf_cnpj:{ 
            required: "O campo nome é obrigatório.",
            minlength: "O campo nome deve conter no mínimo 3 caracteres."
          },
          rg:{ 
            required: "O campo nome é obrigatório.",
            minlength: "O campo nome deve conter no mínimo 3 caracteres."
          },
          fone_fixo:{ 
            required: "O campo nome é obrigatório.",
            minlength: "O campo nome deve conter no mínimo 3 caracteres."
          },
          celular:{ 
            required: "O campo nome é obrigatório.",
            minlength: "O campo nome deve conter no mínimo 3 caracteres."
          },
          email: {
            required: "O campo email é obrigatório.",
            email: "O campo email deve conter um email válido."
          },
          senha: {
            required: "O campo senha é obrigatório."
          },
          senha2:{
            required: "O campo confirmação de senha é obrigatório.",
            equalTo: "O campo confirmação de senha deve ser identico ao campo senha."
          }
        }
        });


    });

    </script>
    <script src="./../../assets/js/valida.js"></script>

</body>

</html>
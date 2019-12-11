<!-- Contate-nos -->
<section id="Contato" class="container-fluid mb-5">

    <h2 class="mb-5 font-weight-bolder text-center">Contate-nos</h2>

    <div class="row d-flex justify-content-center">

        <div class="col-lg-5 col-md-12">

            <form class="p-5 grey-text ">

                <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>

                    <input type="text" id="form3" class="form-control form-control-sm">
                    <label for="form3">Nome Completo</label>

                </div>

                <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>

                    <input type="text" id="form2" class="form-control form-control-sm">
                    <label for="form2">Seu e-mail</label>

                </div>

                <div class="md-form form-sm"> <i class="fa fa-pencil prefix"></i>

                    <textarea type="text" id="form8" class="md-textarea form-control form-control-sm"
                        rows="4"></textarea>
                    <label for="form8">Escreva uma mensagem</label>

                </div>

                <div class="text-center mt-4">

                    <button class="btn default-color text-white">Confirmar <i
                            class="fa fa-paper-plane-o ml-1"></i></button>

                </div>

            </form>

        </div>

        <!-- google maps -->

        <div class="row">

            <div class="col-md-6 mb-4">

                <div class="z-depth-1-half map-container-5" style="height: 400px">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20310.603063486204!2d-51.07180973305926!3d-0.002563791876423661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8d61e1e023630001%3A0x707ce82298e519f8!2sFaculdade+Meta!5e0!3m2!1spt-BR!2sbr!4v1566579506346!5m2!1spt-BR!2sbr"
                        width="600px" height="400" frameborder="0" style="border:0" allowfullscreen>
                    </iframe>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- Footer -->
<footer class="page-footer font-small menu -3 pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row d-flex justify-content-center">

            <!-- Grid column -->
            <div class="col-md-4  ">

                <!-- Content -->
                <h5 class="font-weight-bold text-uppercase mb-4 text-center">GAU</h5>
                <p>
                    Esse sistema foi desenvolvido para atender a população e os funcionários da SEMAM, armazenamos
                    dados, emitimos relatórios, e ainda tentamos concientizar a população sobre arborização urbana.
                </p>

            </div>
            <!-- Grid column -->


            <hr class=" w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-6 ">

                <!-- Contact details -->
                <h5 class="font-weight-bold text-uppercase mb-4 text-center">Endereço</h5>

                <ul class="list-unstyled">
                    <li>
                        <p>
                            <i class="fas fa-home mr-3"></i>R. Pedro Siqueira, 333 - Jardim Marco Zero
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-envelope mr-3"></i> suporte@gau.com
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-phone mr-3"></i> (96) 3251-5436
                        </p>
                    </li>

                </ul>

            </div>
            <!-- Grid column -->



        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <?php 
            echo date('d/m/Y', strtotime($hoje));?> Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/"> GAU</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->





<!-- JQuery MDB -->
<script type="text/javascript" src="./node_modules/mdbootstrap/js/jquery-3.4.1.min.js"></script>

<!-- MDB   -->
<script type="text/javascript" src="./node_modules/mdbootstrap/js/popper.min.js"></script>

<!-- Bootstrap  -->
<script type="text/javascript" src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- MDB  -->
<script type="text/javascript" src="./node_modules/mdbootstrap/js/mdb.min.js"></script>

<script src="./node_modules/jquery/dist/jquery.min.js"></script>

<script src="./"></script>

<!-- JAVASCRIPT -->
<script src="./assets/js/app.js"></script>
</body>

</html>
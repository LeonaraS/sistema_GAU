<?php
if (isset($_POST['Cadastrar']) && $_POST['Cadastrar'] === 'Cadastrar') {

	$cidadao = new Cidadao();
	$cidadao->setNome($_POST['nome']);
	$cidadao->setCpfCnpj($_POST['cpf_cnpj']);
	$cidadao->setRg($_POST['rg']);
	$cidadao->setCelular($_POST['celular']);
	$cidadao->setEmail($_POST['email']);
	$cidadao->setSenha($_POST['senha']);
	$cidadao_idcidadao = $cidadao->adicionar();
	$endereco = new Endereco();
	$endereco->setServicoIdservico($_POST['servico_idservico']);
	$endereco->setBairroIdbairro($_POST['bairro_idbairro']);
	$endereco->setInfracaoIdinfracao($_POST['infracao_idinfracao']);
	$endereco->setAreaverdeIdareaverde($_POST['areaverde_idareaverde']);
	$endereco->setCidadaoIdcidadao($cidadao_idcidadao);
	$endereco->setCep($_POST['cep']);
	$endereco->setLogradouro($_POST['logradouro']);
	$endereco->setNumero($_POST['numero']);
	$endereco->setPontoReferencia($_POST['ponto_referencia']);
	$endereco->adicionar();
}
?>


<div class=" mt-5">

    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Cadastre-se</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="post" accept-charset="utf-8" onsubmit="">
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" id="orangeForm-name" name="nome" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Nome Completo</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-address-card prefix grey-text"></i>
                            <input type="password" id="orangeForm-pass" name="cpf_cnpj" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">CPF ou CNPJ</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-address-card prefix grey-text"></i>
                            <input type="password" id="orangeForm-pass" name="rg" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Rg</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-mobile-alt prefix grey-text"></i>
                            <input type="password" id="orangeForm-pass" name="celular" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Celular</label>
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="email" id="orangeForm-email" name="email" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-email">E-mail</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <input type="password" id="orangeForm-pass" name="senha" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Senha</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <input type="password" id="orangeForm-pass" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Confirmar Senha</label>
                        </div>

                        <input type="hidden" name=" servico_idservico" value="0">

                        <div class="md-form mb-4">
                            <i class="fas fa-map-marker-alt prefix grey-text"></i>

                            <input type="password" id="orangeForm-pass" name="bairro_idbairro"
                                class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Bairro</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-location-arrow prefix grey-text"></i>
                            <input type="password" id="orangeForm-pass" name="cep" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Cep</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="far fa-compass prefix grey-text"></i>
                            <input type="password" id="orangeForm-pass" name="logradouro" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Logradouro</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-home prefix grey-text"></i>
                            <input type="password" id="orangeForm-pass" name="numero" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Número</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-route prefix grey-text"></i>
                            <input type="password" id="orangeForm-pass" name="ponto_referencia"
                                class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Ponto de
                                referência</label>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-success" name="Cadastrar" value="Cadastrar">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
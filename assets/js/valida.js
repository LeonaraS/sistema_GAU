function valida()
        {
            var filter_nome = /^([a-zA-Zà-úÀ-Ú]|\s+)+$/;

            if(document.form_cadastro.email.value.indexOf('@') == -1 || document.form_cadastro.email.value.indexOf('.') == -1 || document.form_cadastro.email.value == "" || document.form_cadastro.email.value == null)
            {
                alert("E-mail inválido, por favor digite um e-mail válido.");
                document.form_cadastro.email.focus();
                return false;
            }

            if (!filter_nome.test(document.form_cadastro.nome.value)) 
        {
            alert("Nome precisa conter apenas letras.");
            document.form_cadastro.nome.focus();
            return false;
        }

        }

function funcionario()
{
    var filter_nome = /^([a-zA-Zà-úÀ-Ú]|\s+)+$/;

    if(document.form_funcionario.email.value.indexOf('@') == -1 || document.form_funcionario.email.value.indexOf('.') == -1 || document.form_funcionario.email.value == "" || document.form_funcionario.email.value == null)
            {
                alert("E-mail inválido, por favor digite um e-mail válido.");
                document.form_funcionario.email.focus();
                return false;
            }

            if (!filter_nome.test(document.form_funcionario.nome.value)) 
        {
            alert("Nome precisa conter apenas letras.");
            document.form_funcionario.nome.focus();
            return false;
        }
}
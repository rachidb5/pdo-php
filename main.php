<?php

/***VALIDAÇÃO DOS DADOS RECEBIDOS DO FORMULÁRIO ***/
if ($_REQUEST['nome_cliente'] == "") {
    echo "O campo Nome não pode ficar vazio.";
    exit;
}

if (strlen($_REQUEST['cpf_cliente']) != 11) {
    echo "O campo CPF precisa ter 11 caracteres.";
    exit;
}

if (!stripos($_REQUEST['email_cliente'], "@") || !stripos($_REQUEST['email_cliente'], ".")) {
    echo "O campo E-mail não é válido.";
    exit;
}

if ($_REQUEST['data_nascimento_cliente'] == "") {
    echo "O campo Data de Nascimento não pode ficar vazio.";
    exit;
}

echo $_REQUEST['nome_cliente']
?>

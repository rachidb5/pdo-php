<?php

require "config.php";
$lista = [];
$sql = $conn->query('SELECT * FROM cliente');

if ($sql->rowCount() > 0) {
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Formulário HTML - Cadastro de Clientes</title>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form action="main.php" method="post" onsubmit="()=>validarFormulario()">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h3>Cadastro de Clientes</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="nome_cliente">Nome</label>
                    <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" placeholder="Seu nome" required />
                  </div>
                  <div class="form-group">
                    <label for="cpf_cliente">CPF</label>
                    <input type="text" class="form-control" minlength="11" maxlength="11" id="cpf_cliente" name="cpf_cliente" placeholder="Seu CPF" title="Digite apenas números" required />
                  </div>
                  <div class="form-group">
                    <label for="email_cliente">Endereço de E-mail</label>
                    <input type="email" class="form-control" id="email_cliente" name="email_cliente" aria-describedby="emailHelp" placeholder="Seu e-mail" required />
                    <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
                  </div>
                  <div class="form-group">
                    <label for="data_nascimento_cliente">Data de Nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento_cliente" name="data_nascimento_cliente" placeholder="Sua data de nascimento" required />
                  </div>
                  <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">
                      Enviar
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">CPF</th>
              <th scope="col">EMAIL</th>
              <th scope="col">DATA DE NASCIMENTO</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($lista as $u):?>
            <tr>
              <td><?=$u["nome_cliente"];?></td>
              <td><?=$u["cpf_cliente"];?></td>
              <td><?=$u["email_cliente"];?></td>
              <td><?=$u["data_nascimento_cliente"];?></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
  function validarFormulario(formulario) {
    if (
      formulario.nome_cliente.value === "" ||
      formulario.nome_cliente.value === null
    ) {
      alert("O campo Nome não pode ficar vazio.");
      formulario.nome_cliente.focus();
      return false;
    }
    if (formulario.cpf_cliente.value.length != 11) {
      alert("O campo CPF precisa ter 11 caracteres.");
      formulario.cpf_cliente.focus();
      return false;
    }
    //o campo e-mail precisa ser válido, ou seja, deve : "@" e "."
    if (
      formulario.email_cliente.value.indexOf("@") == -1 ||
      formulario.email_cliente.value.indexOf(".") == -1
    ) {
      alert("O campo E-mail não é válido.");
      formulario.email_cliente.focus();
      return false;
    }
    if (
      formulario.data_nascimento_cliente.value === "" ||
      formulario.data_nascimento_cliente.value === null
    ) {
      alert("O campo Data de Nascimento não pode ficar vazio.");
      formulario.data_nascimento_cliente.focus();
      return false;
    }
  }
</script>

</html>
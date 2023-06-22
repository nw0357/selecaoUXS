<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
    <title>Login</title>
</head>
<body>
  <h1 class="center-align">Entrar</h1>
  <form action="validar_acesso.php" method="post" class="valign-wrapper">
    <div class="row">
        <div class="input-field col s12">
        <input id="email" type="email" class="validate" name="email" required>
        <label for="email">Email*</label>
    </div>
    <div class="row">
    <div class="input-field col s12">
      <input id="password" type="password" class="validate" name="senha" required>
      <label for="password">Senha*</label>
    </div>
  </div>
  <input type="submit" value="Entrar" name="enviar" class="btn waves-effect waves-red"><br>
  <span>Não possui uma conta? <a href="cadastro.php">Cadastre-se aqui!</a></span>
  </form>
  <script src="materialize/js/materialize.min.js"></script>
</body>
</html>
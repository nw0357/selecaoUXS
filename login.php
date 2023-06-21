<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
    <title>Document</title>
</head>
<body>
  <h1 class="center-align">Entrar</h1>
  <form action="validar_acesso.php" method="post" class="valign-wrapper" style="border: 5px;">
    <div class="row">
        <div class="input-field col s12">
        <input id="email" type="email" class="validate" name="email">
        <label for="email">Email</label>
    </div>
    <div class="row">
    <div class="input-field col s12">
      <input id="password" type="password" class="validate" name="senha">
      <label for="password">Password</label>
    </div>
  </div>
  <input type="submit" value="Entrar" name="enviar" class="red white-text">
  </form>
  <script src="materialize/js/materialize.min.js"></script>
</body>
</html>
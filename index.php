<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IFSHOP | Login</title>
  <link rel="icon" type="image/SVG" href="./assets/ifsul-logo.svg">
  <link rel="stylesheet" href="./styles.css">
</head>

<body>
  <div class="page-container">
    <div class="img-container">
      <img src="./assets/login-img.png" alt="homem mexendo no notebook" />
    </div>
    <div class="form-container">
      <h1>LOGIN</h1>

      <form method="post" action="./phpFunctions.php" class="form-items">
        <div class="input-container">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required />
        </div>
        <div class="input-container">
          <label for="pasword">Senha</label>
          <input id="pasword" type="password" name="password" required />
        </div>

        <div class="dont-have-an-account-container">
          <span>Não possui uma conta?</span>
          <a href="./pages/signup.php">Cadastre-se!</a>
        </div>


        <button type="submit">Enviar</button>
      </form>

      <div><img src="./assets/ifsul-logo.svg" alt="logo do ifsul" /></div>
    </div>
  </div>
</body>

</html>
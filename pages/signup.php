<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet">
    <title>IFSHOP | Cadastro</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="./signup.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
    <div class="page-container">
        <nav class="go-back-btn">
            <a href="../"><- Voltar</a>
        </nav>
        <div class="img-container">
            <img src="../assets/login-img.png" alt="homem mexendo no notebook" />
        </div>
        <div class="form-container">
            <h1>Cadastro</h1>


            <form method="post" action="./cadastraUsuario.php" class="form-items">
                <div class="input-container">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="ex: John Doe" required />
                </div>
                <div class="input-container">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="ex: johndoe@email.com" required />
                </div>
                <div class="input-container">
                    <label for="cpf">CPF</label>
                    <input type="number" id="cpf" name="cpf" minlength="12" maxlength="12" placeholder="ex: 00011122233" required />
                </div>
                <div class="input-container">
                    <label for="pasword">Senha</label>
                    <input id="password" type="password" name="senha" required />
                </div>

                <button type="submit">Cadastrar</button>
            </form>

            <div><img src="../assets/ifsul-logo.svg" alt="logo do ifsul" /></div>
        </div>
    </div>
</body>

</html>
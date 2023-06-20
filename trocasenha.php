<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Tela de Login</title>
</head>

<body>
    <div class="container">
        <form class="container" action="acao.php?acao=6" method="post" onsubmit="return validarSenha()">
            <div class="cadastro">
                <h2>Troca de senha!</h2>

                <div>
                    <label>Senha Antiga</label>
                    <input type="password" name="senha" placeholder="Senha" required>
                    <span id="erroSenha" class="erro"></span>
                </div>
                <div>
                    <label>Senha Nova</label>
                    <input type="password" name="senhaN" placeholder="Senha" required>
                    <span id="erroSenhaN" class="erro"></span>
                </div>
                <div>
                    <label>Confirmar Senha</label>
                    <input type="password" name="senhaNC" placeholder="Senha" required>
                    <span id="erroSenhaNC" class="erro"></span>
                </div>
                <div class="button-cadastro">
                    <button type="submit">Logar</button>
                </div>
                <p>Voltar para tela listagem?<a href="listartarefa.php">clique aqui</a></p>

                <?php
                if(isset($_GET['acao']) ){
                ?>
                <div class="alert alert-success">
                    <?php
                    if($_GET['acao']==1)
                    {
                        echo "Senha nova e confirmar senha são diferentes!";
                    }
                    if($_GET['acao']==2)
                    {
                        echo "Senha atual inválida";
                    }
                    if($_GET['acao']==3)
                    {
                        echo "Senha alterada com sucesso";
                    }
                    ?>
                </div>
                <?php
                }
                ?>
            </div>
        </form>
    </div>

    <script>
        function validarSenha() {
            var senhaNova = document.getElementsByName("senhaN")[0].value;
            var senhaConfirmada = document.getElementsByName("senhaNC")[0].value;

            // Verificar se a senha tem pelo menos 6 caracteres
            if (senhaNova.length < 6) {
                document.getElementById("erroSenhaN").innerHTML = "A senha deve ter no mínimo 6 caracteres.";
                return false;
            }

            // Verificar se a senha contém pelo menos uma letra maiúscula
            if (!/[A-Z]/.test(senhaNova)) {
                document.getElementById("erroSenhaN").innerHTML = "A senha deve conter pelo menos uma letra maiúscula.";
                return false;
            }

            // Verificar se a senha contém pelo menos um número
            if (!/\d/.test(senhaNova)) {
                document.getElementById("erroSenhaN").innerHTML = "A senha deve conter pelo menos um número.";
                return false;
            }

            // Verificar se a senha nova coincide com a confirmação
            if (senhaNova !== senhaConfirmada) {
                document.getElementById("erroSenhaNC").innerHTML = "A senha nova e a confirmação de senha são diferentes.";
                return false;
            }

            // Se todas as validações passarem, o formulário pode ser enviado
            return true;
        }
    </script>
</body>

</html>

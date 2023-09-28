<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login&index.css">
    <title>Login</title>
    <style>
        .div-cabecalho {
            padding-right: 0%;
        }
    </style>
</head>

<body>
    <header>

        <div id="headermaior">
            <div class="div-cabecalho" id="modo-desktop">
                <ul>
                    <a href="index.html">
                        <li>Home</li>
                    </a>
                    <a href="">
                        <li>Perfil</li>
                    </a>
                    <a href="">
                        <li>Funcionalidades</li>
                    </a>
                    <a href="">
                        <li>Sobre o Senai</li>
                    </a>
                </ul>
            </div>
            <div class="div-cabecalho" id="modo-mobile">
                <nav id="nav-menu-hamburguer">
                    <ul id="menu" role="menu">
                        <br />
                        <li><a class="header-item" href="index.html">Home</a></li>
                        <br />
                        <hr />
                        <br />
                        <li><a class="header-item" href="index.html">Perfil</a></li>
                        <br />
                        <hr />
                        <br />
                        <li><a class="header-item" href="products.html">Funcionalidades</a></li>
                        <br />
                        <hr />
                        <br />
                        <li><a class="header-item" href="aboutus.html">Sobre o SENAI</a></li>
                        <br />
                        <hr />
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div id="div_1">
            <div id="caixa_geral">
                <div id="caixa_bemvindo_login">
                    <h1 class="titulo_principal_login">Bem vindo!</h1>
                    <h3 class="subtitulo_login">Faça login para continuar</h3>
                </div>

                <form action="processa_login.php" id="form_senha_login" method="POST">
                    <input id="email_login" type="text" name="email" placeholder="Insira seu email" required>

                        <div id="align">
                        <input id="senha_login" type="password" name="senha" placeholder="Insira sua senha" required>
                        <span id="imagem_senha"></span>
                        </div>
                    </input>
                    <div id="alinharEnvio">
                        <button id="botao_envio_login" type="submit">Entrar</button>
                    </div>
                </form>
                <div id="caixaRecuperarSenha">
                    <div class="linhas"></div>
                    <a href="">Esqueci a senha</a>
                    <div class="linhas"></div>
                </div>

            </div>
        </div>
 
    </main>

    <script>
    var form_senha_login = document.getElementById("form_senha_login");
    var visualizacao_senha_login = document.querySelector("#senha_login");
    var imagemSenha = document.querySelector("#imagem_senha");
    imagemSenha.style.backgroundImage = 'url("img/olho-fechado.png")';


    imagemSenha.addEventListener('click', function () {
        form_senha_login.classList.toggle('visibilidade_login')
        if (form_senha_login.classList.contains("visibilidade_login")) {
            imagemSenha.style.backgroundImage = 'url("img/olho-aberto.png")';
            visualizacao_senha_login.type = 'text';
        } else {
            imagemSenha.style.backgroundImage = 'url("img/olho-fechado.png")';
            visualizacao_senha_login.type = 'password';
        }
    });
</script>

    
</body>

</html>

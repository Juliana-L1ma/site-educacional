<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login&index.css">
    <title>Login</title>
</head>

<body>
    <header>
        <div id="headermenor">
            <a href="#"><img style="height: 70%;" alt=""></a>
        </div>
        <div id="headermaior">
            <div class="div-cabecalho" id="modo-desktop">
                <ul>
                    <a href="">
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

                        <div style="display: flex; width: 100%;">
                        <input id="senha_login" type="password" name="senha" placeholder="Insira sua senha" required>
                        <img id="img_senha_login" src="img/olho-fechado.png" height="20px" alt="">
                        </div>
                        <button id="botao_envio_login" type="submit">Entrar</button>
                </form>
            </div>
        </div>
    </main>
    <script>
        var form_senha_login = document.getElementById("form_senha_login");
        var teste = document.getElementById("email_login")
        var visualizacao_senha_login = document.querySelector("#img_senha_login");
        var senha_login = document.querySelector("#senha_login");
        visualizacao_senha_login.addEventListener('click', function () {
            form_senha_login.classList.toggle('visibilidade_login')
            if (form_senha_login.classList.contains("visibilidade_login")) {
                visualizacao_senha_login.src = 'img/olho-aberto.png';
                senha_login.type = 'text';
            }
            else {
                visualizacao_senha_login.src = 'img/olho-fechado.png';
                senha_login.setAttribute('type', 'password');
            }
        });
    </script>

    
</body>

</html>

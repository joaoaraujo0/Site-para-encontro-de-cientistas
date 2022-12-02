<!-- 
      * Página RecuperarSenha *

          Funções:
            - Inserir o token recebido por email
            - Voltar para LoginCadastro 
            - Enviar token para inserir a nova senha (caso o tolken esteja correto)
-->

<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SciLink - Recuperar Senha</title>
    <link rel="icon" href="./img/logo.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./style/styleRecu.css" />
    <link rel="icon" type="image/jpg" href="../View/img/logo.png" />
  </head>

  <body>

    <main>

      <div class="box">

        <div class="inner-box">

          <div class="forms-wrap">

            <form autocomplete="off" action="../Controllers/Email.php" class="sign-in-form" method="POST">

              <input type="hidden" name="acao" value="VerificaToken">

              <div class="logo">
                <img src="./img/logo.png" alt="easyclass" />
                <h4><span>Sci</span>Link</h4>
              </div>

              <div class="heading">
                <h2>Insira o Token</h2>
                <p>Te mandamos um token por email!</p>
              </div>

              <div class="actual-form">

                <div class="input-wrap1">
                  <input name="tokenUsuario" type="text" minlength="4" class="input-field" autocomplete="off" required />
                  <label>Token</label>
                </div>

              </div>

              <div>
                <button type="submit" class="resetar">Nova Senha</button>
                <a href="../View/RecuperarSenha.php" class="toggle2">Voltar</a>
              </div>

            </form>

          </div>

          <div class="carousel">

            <div class="images-wrapper">
              <img src="./img/image1.png" class="image img-1 show" alt="" />
              <img src="./img/image2.png" class="image img-2" alt="" />
              <img src="./img/image3.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">

              <div class="text-wrap">

                <div class="text-group">
                  <h2>Trabalhe em equipe e coopere!</h2>
                  <h2>Entre em contato com diversas áreas!</h2>
                  <h2>Evolua e construe um futuro conosco!</h2>
                </div>

              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>

            </div>

          </div>

        </div>

      </div>

    </main>

    <!-- Arquivos JavaScript -->
    <!-- Carrosel -->
    <script src="./script/app.js"></script>

  </body>

</html>
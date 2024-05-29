<?php
 require 'usuarios.php';
 $usuario = new Usario;
 $usuario->conectar();



 if(isset($_POST['bot_Ca'])){

  if(isset(
     
   $_POST['nome'],
   $_POST['email'],
   $_POST['senha']

  )){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    //verificar se o email já foi cadastrado 
    if($usuario->emailCadastrado($email)){
      echo "Email já cadastrado";
      exit;}else{
        if($usuario->cadastrar($nome, $email, $senha)){
          echo "Usuário Cadastrado";
        }
        }
      }
    }
 




?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yume</title>
    <link rel="stylesheet" href="element.css">
    <link rel="shortcut icon" href="IMG/favicon.jpg" type="image/x-icon">

   
</head>
<body>
    <header class="cabeca">
         <a href="#" class="logo">
           <img src="img/pixil-frame-0 (1).png" alt="Carregando...">
        </a>

    <nav class="navegar">
        <a href="index.html">HOME</a>
        <a href="Login.php">LOGIN</a>
        <a href="Cadastro.php">CADASTRAR</a>
        <a href="produtos.php">PRODUTOS</a>
    </nav>
    
    </header>
   
    <div class="aviso">
        <p>É necessário realizar o cadastro para poder vender seus produtos ou comprar.</p>
    </div>
    
    <form class="cadastro" method="post">
     <fieldset>
       <label>Nome:</label>
       <input type="text" id="nome" name="nome" placeholder="Digite seu nome" autocomplete="name" required> 

       <label>Email:</label>
       <input type="email" id="email" name="email" placeholder="Digite seu email" autocomplete="email" required>
        
       <label>Senha:</label>
       <input type="password"  id="senha" name="senha" placeholder="Digite sua senha" autocomplete="current-password" required>

       <input type="submit" value="Cadastrar" name="bot_Ca">
      </fieldset>
    </form>
   <footer>

   <div class="footer-contato">
    <span class="dev"> Desenvolvido por Felipe Gonçalves</span>
     <a href="https://github.com/FRG15" class="rede"><img src="IMG/Git.png" alt="G"></a>
      <a href="https://www.linkedin.com/in/felipe-gon%C3%A7alves-201562269/recent-activity/all/"
      class="rede"><img src="IMG/In.png" alt="L"></a>
       <a href="https://www.facebook.com/felipelipegx" class="rede"> <img src="IMG/F.png" alt="F"></a>
  </div>
    
     </footer> 


</body>
</html>
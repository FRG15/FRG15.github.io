<?php 
require_once 'usuarios.php';
$usuario = new Usario;
$usuario->conectar();
// $usuario->conectar() serve para conectar com o banco de dados
if(isset($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    
  
    }
 // se o email e a senha não estiver vazia, enviar para o banco
    if(!empty($email) && !empty($senha))
   {
    if($usuario->logar($email,$senha))
    {
      header("location:Private.php");
      //vai localizar 
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
      
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <section>
      <fieldset>
        <form method="post" class="login">
           <label>Login</label>
           <input type="email" name="email" id="" placeholder="Digite seu Email" autocomplete="name">
           <label>Senha</label>
           <input type="password" name="senha" id="" placeholder="Digite sua Senha" autocomplete="current-password">
           <input type="submit" value="LOGAR">
       </form>
      </fieldset>
    </section>
    
</body>
</html>
  
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
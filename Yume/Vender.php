<?php 
require_once 'CadaPro.php';
$usuario = new produtos;
$usuario->conectar();
// $usuario->conectar() serve para conectar com o banco de dados
if(isset($_POST['titulo'])){
    $titulo = addslashes($_POST['titulo']);
    $descricao = addslashes($_POST['descricao']);
    $preco = addslashes($_POST['preco']);
 // se o email e a senha não estiver vazia, enviar para o banco
    if(!empty($titulo) && !empty($descricao) && !empty($preco))
   {
    if($usuario->cadastrarProduto($titulo, $descricao, $preco))
    {
      header("location:prologa.php");
      //vai localizar 
    }  
  }

}


?>







<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yume.com</title>
    <link rel="stylesheet" href="element.css">
    <link rel="shortcut icon" href="IMG/favicon.jpg" type="image/x-icon">

   
</head>
<body>

    <header class="cabeca">
         <a href="#" class="logo">
           <img src="img/pixil-frame-0 (1).png" alt="Carregando...">
        </a>
    <nav class="navegar">
        <a href="Vender.php">VENDER</a>
        <a href="Private.php">CONTA</a>
        <a href="inloga.html">HOME</a>
        <a href="prologa.php">PRODUTOS</a>
    </nav>
    </header>

    <fieldset>
      <form class="tela-ve" method="post">
        <label>Nome do Produto:</label>
        <input type="text" id="nome" name="titulo" autocomplete="name"  placeholder="Digite aqui"  required>
        
        <label>Descrição do Produto:</label>
        <textarea id="descricao" name="descricao" placeholder="Digite aqui"></textarea>
        
        <label>Preço do Produto:</label>
        <input type="number" name="preco" id="preco" step="0.01"  placeholder="Digite aqui"  required>
        
        <input type="submit" value="Cadastrar Produto" onclick="cadastrarProduto()" >
      </form>
    </fieldset>
    
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
<?php
class produtos {
    private $conexao;

    public function conectar () {
        $dbname = 'primeiro';
        $host = 'localhost';
        $usuario = 'root';
        $password = '';
     
        try {
            $this->conexao = new PDO ("mysql:dbname=".$dbname.";host=".$host, $usuario, $password);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $msgEx){
            throw new Exception('Erro de Conexão'.$msgEx->getMessage());
        }
      }

      public function cadastrarProduto($titulo, $descricao, $preco){
        if(empty($titulo) || empty($descricao) || empty($preco)){
           echo "Por favor, preencha todos os campos";return;
        }
        
        $sql=$this->conexao->prepare("INSERT INTO produtos (titulo, descricao, preco)
        Values (:t,:d,:p)");
        $sql->bindValue(":t",$titulo);
        $sql->bindValue(":d",$descricao);
        $sql->bindValue(":p",$preco);
        $sql->execute();
      }

      public function get_dados(){
        
        try {$sql = $this->conexao->query("SELECT FROM * produtos");
            if($sql->rowCount()>0){
                $dados = $sql->fetchALL(PDO::FETCH_ASSOC);
            return $dados;            
           }else{return false;}}
           catch(PDOException $msgEX){ 
            throw new Exception ('Erro na consulta no Banco de dados
            Dados:'.$msgEX->getMessage());
         }
        }
      }




?>
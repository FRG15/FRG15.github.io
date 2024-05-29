<?php 
class Usario{
    private $conexao;
    
       public function conectar(){

        $dbname = 'Primeiro';
        $host = 'localhost';
        $usuario = 'root';
        $password = '';

        try {
            $this->conexao = new PDO("mysql:dbname=".$dbname.";host=".$host,$usuario,$password);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $msgEx){
            throw new Exception("Erro de Conexão".$msgEx->getMessage());
        }
     }
      
      public function cadastrar ($nome,$email,$senha){
         if(empty($nome) || empty($email)  || empty($senha)){
            echo "Por favor, preencha todos os campos";return;
         }
        
        

        $sql=$this->conexao->prepare("INSERT INTO usario (nome, email, senha)
        Values (:n,:e,:s)");
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->execute();

      } 


       public function emailCadastrado($email){
        try {
            $sql = "SELECT * FROM usario WHERE email = :email";
            $dados = $this->conexao->prepare($sql);
            $dados->bindParam(':email',$email);
            $dados->execute();

            return $dados->rowCount()>0;}
            
             catch (PDOException $erro){
                throw new Exception('Erro na Consulta:'.$erro->getMessage());}
             }
               
             public function get_dados(){
                try{
                    $sql = $this->conexao->query("SELECT * FROM usario");
                //função criada para coletar os dados inseridos no formulário  
                // se for maior que 0 linhas é para retornar os dados abaixo dele
                // , mas se não for, retorna falso e mostra o erro
                    if($sql->rowCount()>0){
                        $dados = $sql->fetchALL(PDO::FETCH_ASSOC);
                        return $dados;
                    }else{return false;}} catch(PDOException $msgEX){
                        throw new Exception ('Erro na consulta no Banco de dados
                        Dados:'.$msgEX->getMessage());
                    }
                }

                public function logar ($email,$senha){
                    $sql = $this->conexao->prepare("SELECT id_usuario FROM usario WHERE email = :e AND senha = :s");
                    $sql->bindValue(":e",$email);
                    $sql->bindValue(":s",$senha);
                    $sql->execute();

                    if($sql->rowCount()>0){
                        $dados = $sql->fetch();
                         // está pegando apenas o id
                         // se executar e tiver valor, significa que o usuário está cadastrado
                         session_start();
                         //start na sessão
                         $_SESSION['id_usuario']=$dados['id_usuario'];
                         return true;
                         //o SESSION vai receber os dados do usuario
                       }
                       else {return false;} 
                    }
                
                }
?>
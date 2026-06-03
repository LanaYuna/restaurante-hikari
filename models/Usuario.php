<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/hikari/config/conexao.php';

require_once ROOT_PATH . 'config/conexao.php';

class Usuario{

    public static function cadastrar($nome, $email, $telefone, $senha){
        
        $conexao = abrirBanco();
        $tipo = "cliente";

        if($conexao->connect_error) {
            return false;
        }

        $sql = "INSERT INTO usuario (nome, email, telefone, senha, tipo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        
        if($stmt){

            $stmt->bind_param("sssss", $nome, $email, $telefone, $senha, $tipo);


            try {

                if ($stmt->execute()) {

                    $id = $conexao->insert_id; // RETORNA ID DO USUÁRIO APÓS INSERT
                    $stmt->close();
                    $conexao->close();

                    return $id;
                }
                
            } catch( mysqli_sql_exception $erro){

                if($erro->getCode() === 1062){ // CODIGO 1062 SIGNIFICA DADO DUPLICADO
                    $mensagemErro = $erro->getMessage();
                    $stmt->close();
                    $conexao->close();

                    if(str_contains($mensagemErro, "email")){
                        return "email_duplicado";
                    } elseif(str_contains($mensagemErro, "telefone")){
                        return "telefone_duplicado";
                    }
                  
                    return "duplicado";
                }
                
            }
           
            $stmt->close();
        }

        $conexao->close();
        return "erro_generico";
    }

    public static function buscarPorEmail($email){
        
        $conexao = abrirBanco();

        if($conexao->connect_error) {
            return false;
        }

        $sql = "SELECT * FROM usuario WHERE email = ?";
        $stmt = $conexao->prepare($sql);

        if($stmt){

            $stmt->bind_param("s", $email); 

            if($stmt->execute()){

                $resultadoBanco = $stmt->get_result();

                if($resultadoBanco->num_rows > 0){
                    $usuario = $resultadoBanco->fetch_assoc(); // Linhas em array
                    
                    $stmt->close();
                    $conexao->close();

                    return $usuario; // Retorna array com os atributos de usuario
                }
            } 

            $stmt->close();
            
        } else{
            echo "Preparação falhou". $conexao->connect_error;
        }

        $conexao->close();
        return false;
    }
    
    public static function editar($nome, $email, $telefone, $usuario_id){

        $conexao = abrirBanco();

        if($conexao->connect_error){
            return false;
        }

        $sql = "UPDATE usuario SET nome = ?, email = ?, telefone = ? WHERE id = ?";

        $stmt = $conexao->prepare($sql);

        if(!$stmt){
            $conexao->close();
            return false;
        }

        $stmt->bind_param("sssi", $nome, $email, $telefone, $usuario_id);

        $resultado = $stmt->execute();

        $stmt->close();
        $conexao->close();

        return $resultado;
    }

    public static function apagar($usuario_id){

            $conexao = abrirBanco();

            if($conexao->connect_error){
                return false;
            }

            $sql = "DELETE FROM usuario WHERE id = ?";
            $stmt = $conexao->prepare($sql);

            $stmt->bind_param("i", $usuario_id);

            $resultado = $stmt->execute();

            $stmt->close();
            $conexao->close();

            return $resultado;
    }

    public static function buscarPorId($id){

        $conexao = abrirBanco();

        if($conexao->connect_error) {
            return false;
        }

        $sql = "SELECT * FROM usuario WHERE id = ?";
        $stmt = $conexao->prepare($sql);

        if($stmt){

            $stmt->bind_param("i", $id); 

            if($stmt->execute()){

                $resultadoBanco = $stmt->get_result();

                if($resultadoBanco->num_rows > 0){
                    $usuario = $resultadoBanco->fetch_assoc(); 
                    
                    $stmt->close();
                    $conexao->close();

                    return $usuario; 
                }
            } 

            $stmt->close();
            
        } else{
            echo "Preparação falhou". $conexao->connect_error;
        }

        $conexao->close();
        return false;

    }
}

?>
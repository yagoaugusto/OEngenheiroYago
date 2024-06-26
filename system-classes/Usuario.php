<?php

class Usuario{

  public function cadastrar_usuario($nome,$email,$telefone,$senha)
  {
    $query =
    "INSERT INTO usuario(nome,email,telefone,senha) values ('{$nome}','{$email}','{$telefone}','{$senha}')";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->execute();
  }


  public static function verifica_email($email)
  {
    $query =
    "SELECT * from usuario where email='{$email}'";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
  }

public static function listar_usuarios()
  {
    $query =
    "SELECT * from usuario";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
  }  

}

  ?>

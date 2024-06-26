<?php

class Projetos{

  public function cadastrar_projeto($titulo,$transf_competencia,$transf_natureza)
  {
    $query =
    "INSERT INTO projeto(titulo,transf_competencia,transf_natureza) values ('{$titulo}','{$transf_competencia}','{$transf_natureza}')";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->execute();
  }

  public function excluir_projeto($id)
  {
    $query =
    "DELETE from projeto where id=$id";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->execute();
  }

  public function atualizar_projeto($id,$titulo,$transf_competencia,$transf_natureza)
  {
    $query =
    "UPDATE projeto set titulo='{$titulo}',transf_competencia='{$transf_competencia}',transf_natureza='{$transf_natureza}' where id=$id";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->execute();
  }


  public static function listar_projetos()
  {
    $query =
    "SELECT * from projeto where status='ATIVO'";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
  }

  public static function info_projeto($id)
  {
    $query =
    "SELECT * from projeto where id=$id";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
  }
}
<?php

class Saldo{

  public function movimentar($responsavel,$tipo,$projeto,$natureza,$mes,$ano,$competencia,$valor,$comentario)
  {
    $query =
    "INSERT INTO saldo(responsavel,tipo,projeto,natureza,mes,ano,competencia,valor,comentario) 
    values ('{$responsavel}','{$tipo}','{$projeto}','{$natureza}','{$mes}','{$ano}','{$competencia}','{$valor}','{$comentario}')";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->execute();
  }

  public static function verificar_existencia_saldo($projeto,$natureza,$competencia)
  {
    $query =
    "SELECT * from saldo where  
    projeto = $projeto and
    natureza = $natureza and
    competencia = '{$competencia}' and
    tipo='SALDO'";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
  }

  public static function listar_movimentacoes_saldo()
  {
    $query =
    "SELECT saldo.id, 
    saldo.log,tipo,mes,ano,competencia,valor,saldo.comentario,
    usuario.nome as responsavel,
    natureza.titulo as natureza,
    projeto.titulo as projeto
    from saldo 
    join natureza on natureza.id=saldo.natureza
    join projeto on projeto.id=saldo.projeto
    join usuario on usuario.id=saldo.responsavel
    order by saldo.id desc";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
  }

}
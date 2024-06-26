<?php

class Compras{

  public function cadastrar_fornecedor($titulo,$endereco,$telefone,$email,$responsavel)
  {
    $query =
    "INSERT INTO fornecedor(titulo,endereco,telefone,email,responsavel) values ('{$titulo}','{$endereco}','{$telefone}','{$email}','{$responsavel}')";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->execute();
  }

  public function novo_pedido($solicitante,$projeto,$produto,$quantidade,$unidade,$desc_necessidade,$prazo_recebimento)
  {
    $query =
    "INSERT INTO pedido(solicitante,projeto,produto,quantidade,unidade,desc_necessidade,prazo_recebimento) 
    values ('{$solicitante}','{$projeto}','{$produto}','{$quantidade}','{$unidade}','{$desc_necessidade}','{$prazo_recebimento}')";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->execute();
  }

  public function atualizar_fornecedor($titulo,$endereco,$telefone,$email,$responsavel,$id)
  {
    $query =
    "UPDATE fornecedor set titulo='{$titulo}',endereco='{$endereco}',telefone='{$telefone}',email='{$email}',responsavel='{$responsavel}'
    where id='{$id}'";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->execute();
  }


  public function cadastrar_produto($codigo,$nome,$descricao,$unidade,$categoria,$natureza)
  {
    $query = 
    "INSERT INTO produto (codigo,nome,descricao,unidade,categoria,natureza) 
    values ('{$codigo}','{$nome}','{$descricao}','{$unidade}','{$categoria}','{$natureza}')";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->execute();
  }

  public function atualizar_produto($codigo,$nome,$descricao,$unidade,$categoria,$id,$natureza)
  {
    $query = 
    "UPDATE produto set codigo='{$codigo}',nome='{$nome}',descricao='{$descricao}',unidade='{$unidade}',categoria='{$categoria}',natureza='{$natureza}'
    where id='{$id}'";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->execute();
  }

  public function excluir_fornecedor($id)
  {
    $query = 
    "UPDATE fornecedor set status='INATIVO' where id='{$id}'";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->execute();
  }

  public function excluir_produto($id)
  {
    $query = 
    "UPDATE produto set status='INATIVO' where id='{$id}'";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->execute();
  }

  public static function listar_fornecedores()
  {
    $query =
    "SELECT * from fornecedor where status='ATIVO'";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
  }

  public static function info_produto($id)
  {
    $query=
    "SELECT  produto.id as id,codigo,nome,produto.descricao,unidade,categoria,produto.status, 
    natureza.id as id_natureza,natureza.titulo as natureza
    from produto 
    join natureza on natureza.id=produto.natureza
    where produto.id='{$id}'";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
  }

  public static function listar_natureza()
  {
    $query=
    "SELECT * FROM natureza order by titulo";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
  }

  public static function listar_pedidos()
  {
    $query=
    "SELECT log_pedido,pedido.produto as produto,quantidade,projeto.titulo as projeto,
    usuario.nome as solicitante,pedido.id as id,pedido.situacao,prazo_recebimento,desc_necessidade
    FROM pedido 
    join usuario on pedido.solicitante=usuario.id
    join projeto on pedido.projeto=projeto.id
    order by pedido.id desc";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
  }

  public static function info_fornecedor($id)
  {
    $query=
    "SELECT * FROM fornecedor where id='{$id}'";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
  }

  public static function listar_produtos()
  {
    $query =
    "SELECT  produto.id as id,codigo,nome,produto.descricao,unidade,categoria,produto.status, 
    natureza.id as id_natureza,natureza.titulo as natureza
    from produto 
    join natureza on natureza.id=produto.natureza
    where status='ATIVO'";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
  }


  public static function ultimo_pedido()
  {
    $query =
    "SELECT * FROM pedido order by id desc limit 1";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
  }

  public static function info_pedido($pedido)
  {
    $query =
    "SELECT pedido.id as id,log_pedido,prazo_recebimento,pedido.situacao,usuario.nome as solicitante,
    projeto.titulo as projeto,desc_necessidade
    FROM pedido 
    join usuario on usuario.id=solicitante
    join projeto on projeto.id=projeto
    where pedido.id = '{$pedido}'";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
  }









}
?>
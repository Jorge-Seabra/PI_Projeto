<?php

require_once('Conexao.php');
require_once('Model.php');

$json = file_get_contents('php://input');
$rb = json_decode($json);

$nomeController = $rb->nomeJS;
$senhaController = $rb->senhaJs;

$objConexao = new Conexao();
$acesso = $objConexao->abrirConexao();
$objModel = new Model($acesso);

$objModel->nomeModel = $nomeController;
$objModel->senhaModel = $senhaController;

$vaiModelVoltaView = $objModel->goiaba();

echo(json_encode($vaiModelVoltaView));

?>
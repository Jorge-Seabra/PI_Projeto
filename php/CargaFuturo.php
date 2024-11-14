<?php
class Conexao
{

public $host = "localhost: 3308";
public $nomebanco = "explicaomvc";
public $usuariobanco = "root";
public $senhausuario = "";
public $pdo = null;

public function abrirconexao()
{
    try {
        $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->nomeBanco);
        $this->usuarioBanco;
        $this->senhaUsuario;
      } catch (PDOException $ex) {
        echo 'Erro ao conectar com o banco de dados: ' . $ex->getMessage();
      }
      return $this->pdo;

    }
}
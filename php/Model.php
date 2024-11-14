<?php
class Model
{
    public $id = 0;
    public $nomeModel = null;
    public $senhaModel = null;
    public $banco = null;



    function __construct($conexao)
    {
        $this->banco = $conexao;
    }

    public function goiaba(){
     
        $retornoController = ['status' => 0, 'dados' => null];
        try{
            $carrossel = $this->banco->prepare('
            Select * from usuarios;
        ');
 
            $carrossel->execute();
            $dados = $carrossel->fetchAll();
            $retornoController['status'] = 1;
            $retornoController['dados'] = $dados;

            return $retornoController;

        }catch(PDOException $xuxuzinho){
            echo 'Erro ao buscar usuarios: ' . $xuxuzinho->getMessage();
        }
        return $retornoController;

    }
}
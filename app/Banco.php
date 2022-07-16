<?php

namespace App;

class Banco
{
    const SERVIDOR = 'localhost';
    const USUARIO = 'felipeneves';
    const SENHA = 'qwe@123';
    const BANCODADOS = 'emissao';

    public $instancia;

    public function __construct()
    {
        $this->instancia = mysqli_connect(self::SERVIDOR, self::USUARIO, self::SENHA, self::BANCODADOS);
    }

    public function cadastrar($tabela, $colunas, $valores): bool
    {
        $sql = "INSERT INTO $tabela ($colunas) VALUES ($valores)";
        return $this->executar($sql);
    }

    public function consultar(string $cabecalho, string $tabela, string $where = null, string $groupBy = null, string $orderBy = null, string $limit = null)
    {
        is_null($where) ? '' : $where;
        is_null($orderBy) ? '' : $orderBy;
        is_null($limit) ? '' : $limit;
        is_null($groupBy) ? '' : $groupBy;
        $sql = "SELECT $cabecalho FROM $tabela $where $groupBy $orderBy $limit";
        // echo $sql; die();
        return $this->executar($sql);
    }

    private function executar($sql)
    {
        return mysqli_query($this->instancia, $sql);
    }
}

?>
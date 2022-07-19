<?php

namespace App;
use App\Banco;
use mysqli;

class Vouchers
{
    const TABELA = "vouchers";
    private $banco;

    public function __construct()
    {
        $this->banco = new Banco();
    }
    public function uploadCSV()
    {
        $nomeCompletoArquivo = $_FILES['arquivo']['name'];
        $exetensaoArquivo = explode('.', $nomeCompletoArquivo)[1];
        $diretorioArquivo = $_FILES['arquivo']['tmp_name'];
        if ($exetensaoArquivo == 'csv') {
        
            $csvLido = fopen($diretorioArquivo, 'r');
        
            while ($registro = fgetcsv($csvLido)) {

                $voucher = mysqli_real_escape_string($this->banco->instancia, $registro[1]);
                $produto = mysqli_real_escape_string($this->banco->instancia, $registro[0]);
                $regiao = mysqli_real_escape_string($this->banco->instancia, $registro[2]);

                $colunas = "voucher, produto, regiao";

                $valores = "'$voucher', '$produto', '$regiao'";

                $this->banco->cadastrar(self::TABELA, $colunas, $valores);
            }

            fclose($csvLido);
            header('location: voucher.php?true');
            exit();
        }

        header('location: voucher.php?false');
    }

    

}

































// echo
            //     "<tr>" .
            //         "<th>" . $resultados['idDocumento'] . "</th>" .
            //         "<th>" . $resultados['dataAprovacao'] . "</th>" .
            //         "<th>" . $resultados['unidade'] . "</th>" .
            //         "<th>" . $resultados['nomeCompletoArquivo'] . "</th>" .
            //     "</tr>"
            // ;

?>















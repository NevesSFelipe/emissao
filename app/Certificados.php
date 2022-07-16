<?php

namespace App;
use App\Banco;
use mysqli;

class Certificados
{
    const TABELA = "certificados";
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

                $status = mysqli_real_escape_string($this->banco->instancia, $registro[0]);
                $id = mysqli_real_escape_string($this->banco->instancia, $registro[1]);
                $pedidoExt = mysqli_real_escape_string($this->banco->instancia, $registro[2]);
                $referenciaExt = mysqli_real_escape_string($this->banco->instancia, $registro[3]);
                $solicitacao = mysqli_real_escape_string($this->banco->instancia, $registro[4]);
                $titular = mysqli_real_escape_string($this->banco->instancia, $registro[5]);
                $dataAprovacao = mysqli_real_escape_string($this->banco->instancia, $registro[6]);
                $situacao = mysqli_real_escape_string($this->banco->instancia, $registro[7]);
                $dataSituacao = mysqli_real_escape_string($this->banco->instancia, $registro[8]);
                $recusas = mysqli_real_escape_string($this->banco->instancia, $registro[9]);
                $email = mysqli_real_escape_string($this->banco->instancia, $registro[10]);
                $unidadeExt = mysqli_real_escape_string($this->banco->instancia, $registro[11]);
                $unidade = mysqli_real_escape_string($this->banco->instancia, $registro[12]);
                $extProduto = mysqli_real_escape_string($this->banco->instancia, $registro[13]);
                $extProdutoNome = mysqli_real_escape_string($this->banco->instancia, $registro[14]);
                $idusuario = mysqli_real_escape_string($this->banco->instancia, $registro[15]);
                $usuario = mysqli_real_escape_string($this->banco->instancia, $registro[16]);
                $idcertificado = mysqli_real_escape_string($this->banco->instancia, $registro[17]);
                $renovacao = mysqli_real_escape_string($this->banco->instancia, $registro[18]);
                $videoconferencia = mysqli_real_escape_string($this->banco->instancia, $registro[19]);
                $atendimentoexterno = mysqli_real_escape_string($this->banco->instancia, $registro[20]);
                $certificado = mysqli_real_escape_string($this->banco->instancia, $registro[21]);
                $campo1 = mysqli_real_escape_string($this->banco->instancia, $registro[22]);
                $campo2 = mysqli_real_escape_string($this->banco->instancia, $registro[23]);
                $campo3 = mysqli_real_escape_string($this->banco->instancia, $registro[24]);
                $validade = mysqli_real_escape_string($this->banco->instancia, $registro[25]);

                $colunas = "status, id, pedidoExt, referenciaExt, solicitacao, titular, dataAprovacao, situacao, dataSituacao, recusas, email, unidadeExt, unidade, extProduto, extProdutoNome, idusuario, usuario, idcertificado, renovacao, videoconferencia, atendimentoexterno, certificado, campo1, campo2, campo3, validade";

                $valores = "'$status', '$id', '$pedidoExt', '$referenciaExt', '$solicitacao', '$titular', '$dataAprovacao', '$situacao', '$dataSituacao', '$recusas', '$email', '$unidadeExt', '$unidade', '$extProduto', '$extProdutoNome', '$idusuario', '$usuario', '$idcertificado', '$renovacao', '$videoconferencia', '$atendimentoexterno', '$certificado', '$campo1', '$campo2', '$campo3', '$validade'";

                $consultar = $this->banco->consultar("*", self::TABELA, "WHERE id = $id AND status = '$status' AND dataAprovacao = '$dataAprovacao'", null, null, null);
                if(mysqli_num_rows($consultar)) {
                    header('location: index.php?repetidos');
                    exit();
                }
                
                $this->banco->cadastrar(self::TABELA, $colunas, $valores);

            }

            
            fclose($csvLido);
            header('location: index.php?true');
            exit();
        }

        header('location: index.php?false');
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















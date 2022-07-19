<?php
    require_once 'vendor/autoload.php';
    use App\Vouchers;
    $vouchers = new Vouchers();     
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $vouchers->uploadCSV(); 
    }
?>


<?php require_once 'views/includes/header.php'; ?>

    <h2>Importar Vouchers</h2>

    <form method="POST" enctype="multipart/form-data" action="voucher.php" class="mb-3">
        <div class="form-group mt-3 mb-3">
            <input type="file" class="form-control-file" id="arquivo" name="arquivo"  />
        </div>
        <button type="submit" class="btn btn-success">Importar CSV</button>
    </form>

    <?php       
        $retorno = end(explode("?", $_SERVER["REQUEST_URI"]));
        switch($retorno) {
            case 'true':
                require_once 'views/msgSucesso.php';
                break;
            case 'false':
                require_once 'views/msgErro.php';
                break;
            case 'repetidos':
                require_once 'views/msgRepetido.php';
                break;
            default:
                echo '';
        }
    ?>

<?php require_once 'views/includes/footer.php'; ?>
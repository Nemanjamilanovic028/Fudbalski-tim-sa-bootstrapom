<!DOCTYPE html>

<?php
    require_once './db.php';
    $db = new Db();
?>

<html>
    <head>
    <link rel="stylesheet" href="izgled.css">
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    </head>
    
    <script>
        function proveri()
        {
            id_igraca = document.getElementById('id_igraca').value;
            id_tima_iz_kog_odlazi = document.getElementById('id_tima_iz_kog_odlazi').value;
            id_tima_iz_kog_odlazi = document.getElementById('id_tima_iz_kog_odlazi').value;
            
            if(id_igraca == '' || id_tima_iz_kog_odlazi == '' || id_tima_iz_kog_odlazi == '')
                alert('Polja ne mogu biti prazna');
            /*else if(!Number.isInteger(id_igraca) && !Number.isInteger(id_tima_iz_kog_odlazi) && !Number.isInteger(id_tima_iz_kog_odlazi))
            {
                alert('vrednosti moraju biti int');
                return false;
            }*/
            else
                return false;
        }
    </script>
    
    <body>
        <h1 class="dodavanje_igraca">Dodavanje transfera:</h1>
        <div class="container mt-4">
        <a class="stranice" href="transferi.php">Nazad na stranicu Transferi</a>
        <form id="myForm" method="get" class="mt-4">
            <div class="col-3">
                <label for="id_igraca" class="form-label sve">Id igrača:</label>
                <input type="text" class="form-control" name="id_igraca" id="id_igraca">
            </div>
            <div class="col-3">
                <label for="id_tima_iz_kog_odlazi" class="form-label sve">Id tima iz kog odlazi:</label>
                <input type="text" class="form-control" name="id_tima_iz_kog_odlazi" id="id_tima_iz_kog_odlazi">
            </div>
            <div class="col-3">
                <label for="id_tima_u_koji_dolazi" class="form-label sve">Id tima u koji dolazi:</label>
                <input type="text" class="form-control" name="id_tima_u_koji_dolazi" id="id_tima_u_koji_dolazi">
            </div>
            <button type="button" class="btn btn-primary" onclick="proveri()">Dodaj</button>
        </form>
    </div>
        
        <?php
            if(isset($_GET['id_igraca']))
            {
                $id_igraca = $_GET['id_igraca'];
                $id_tima_iz_kog_odlazi = $_GET['id_tima_iz_kog_odlazi'];
                $id_tima_u_koji_dolazi = $_GET['id_tima_u_koji_dolazi'];
                
                $db->addTransfer($id_igraca, $id_tima_iz_kog_odlazi, $id_tima_u_koji_dolazi);
                header("Location: transferi.php");
            }
        ?>
    </body>
</html>

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
            ime = document.getElementById('ime').value;
            prezime = document.getElementById('prezime').value;
            id_tima = document.getElementById('id_tima').value;
            
            if(ime == '' || prezime == '' || id_tima == '')
                alert('Polja ne mogu biti prazna');
            else if(!Number.isInteger(id_tima))
            {
                alert('Godina mora biti int');
                return false;
            }
            else
                return false;
        }
    </script>
    
    <body>
    <div class="container mt-4">
        <h1 class="dodavanje_igraca">Dodavanje Igrača:</h1>
        <form id="myForm" method="get">
            <a class="stranice" href="index.php">Pocetna</a>
            <br><br>    
            <div class="col-3">
                <label for="ime" class="form-label sve">Ime:</label>
                <input type="text" class="form-control" name="ime" id="ime">
            </div>
            <div class="col-3">
                <label for="prezime" class="form-label sve">Prezime:</label>
                <input type="text" class="form-control" name="prezime" id="prezime">
            </div>
            <div class="col-3">
                <label for="id_tima" class="form-label sve">Id tima:</label>
                <input type="text" class="form-control" name="id_tima" id="id_tima">
            </div>
            <button type="button" class="btn btn-primary dugme_dodaj" onclick="proveri()">Dodaj</button>
        </form>
    </div>
        
        <?php
            if(isset($_GET['ime']))
            {
                $ime = $_GET['ime'];
                $prezime = $_GET['prezime'];
                $id_tima = $_GET['id_tima'];
                
                $db->addPlayer($ime, $prezime, $id_tima);
                header("Location: index.php");
            }
        ?>
    </body>
</html>

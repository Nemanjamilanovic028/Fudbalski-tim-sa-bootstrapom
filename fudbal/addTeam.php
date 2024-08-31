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
            naziv = document.getElementById('naziv').value;
            grad = document.getElementById('grad').value;
            
            if(naziv == '' || grad == '')
                alert('Polja ne mogu biti prazna');
            else
                return false;
        }
    </script>
    
    <body>
    <div class="container mt-4">
        <h1 class="dod_tim">Dodavanje Tima:</h1>
        <form id="myForm" method="get">
            <a class="poc" href="index.php">Pocetna</a>
            <br><br>
            <div class="col-3">
                <label for="naziv" class="form-label">Naziv:</label>
                <input type="text" class="form-control" name="naziv" id="naziv">
            </div>
            <div class="col-3">
                <label for="grad" class="form-label">Grad:</label>
                <input type="text" class="form-control" name="grad" id="grad">
            </div>
            <button type="submit" class="btn btn-primary" onclick="proveri()">Dodaj</button>
        </form>
    </div>
        
        <?php
            if(isset($_GET['naziv']))
            {
                $naziv = $_GET['naziv'];
                $grad = $_GET['grad'];
                
                $db->addTeam($naziv, $grad);
                header("Location: teams.php");
            }
        ?>
    </body>
</html>

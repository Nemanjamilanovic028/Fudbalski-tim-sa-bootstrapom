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
        function obrisiNavijaca(id)
        {
            window.location = "deleteNavijaca.php?id_navijaca=" + id;
        }
        
        function izmeniNavijaca(id)
        {
            window.location = "editNavijaca.php?id_navijaca=" + id;
        }
        
        function dodajTransfer()
        {
            window.location = "dodajTransfer.php";
        }
    </script>
    
    <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><h1>Igrači</h1></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="teams.php"><h1>Timovi</h1></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="utakmice.php"><h1>Utakmice</h1></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="navijaci.php"><h1>Navijači</h1></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transferi.php"><h1>Transferi</h1></a>
                </li>
            </ul>
        </div>
    </nav>
        <br>
        <?php
            if(!isset($_GET['search']) || $_GET['search'] == '')
                $transferi = $db->getAllTransferi();
            else
                $transferi = $db->getAllTransferi($_GET['search']);
            
                $table = "<table class='table table-striped table-bordered'>";
    
                $table .= "<thead><tr> 
                    <th>Ime igrača</th> 
                    <th>Prezime igrača</th> 
                    <th>Tim za koji je igrao</th> 
                    <th>Tim za koji trenutno igra</th> 
                </tr></thead>";
                
                $table .= "<tbody>";
                
                foreach ($transferi as $transfer) {
                    $table .= "<tr> 
                        <td>" . htmlspecialchars($db->getPlayerById($transfer['id_igraca'])['ime']) . "</td> 
                        <td>" . htmlspecialchars($db->getPlayerById($transfer['id_igraca'])['prezime']) . "</td> 
                        <td>" . htmlspecialchars($db->getTeamById($transfer['id_prethodnog_tima'])['naziv']) . "</td> 
                        <td>" . htmlspecialchars($db->getTeamById($transfer['id_trenutnog_tima'])['naziv']) . "</td> 
                    </tr>";
                }
                
                $table .= "</tbody>";
                $table .= "</table>";
                
                echo $table;
        ?>
        
        <br>
        <button type="button" class="btn btn-primary" name="dodaj" onclick="dodajTransfer()">Dodaj</button>

        </div>
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

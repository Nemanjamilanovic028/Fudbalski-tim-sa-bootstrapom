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
    function obrisiIgraca(id) {
        window.location = "delete.php?id_igraca=" + id;
    }

    function izmeniIgraca(id) {
        window.location = "edit.php?id_igraca=" + id;
    }

    function dodajIgraca() {
        window.location = "add.php";
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
    
        <div class="col-2">
        <form class="form-inline" method="get" action="<?php echo ($_SERVER['PHP_SELF']); ?>">
            <div class="form-group mb-2">
                <input type="text" class="form-control" placeholder="Pretraga" name="search" value="<?php echo isset($_GET['search']) ? ($_GET['search']) : ''; ?>">
            </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Pretraži</button>
        </form>
        <br>
        <?php
        if (!isset($_GET['search']) || $_GET['search'] == '')
            $players = $db->getAllPlayers();
        else
            $players = $db->getAllPlayers($_GET['search']);

        $table = "<table class=\"table table-striped table-bordered\">";

        $table .= "<tr> <th>Ime</th> <th>Prezime</th> <th>Naziv tima</th> <th>Akcije</th> </tr>";

        foreach ($players as $player) {
            $table .= "<tr> 
                        <td>" . ($player['ime']) . "</td> 
                        <td>" . ($player['prezime']) . "</td> 
                        <td>" . ($db->getTeamById($player['id_tima'])['naziv']) . "</td> 
                        <td>
                            <button class='btn btn-danger btn-sm' onclick='obrisiIgraca(" . $player['id'] . ")'>Obriši</button>
                            <button class='btn btn-warning btn-sm' onclick='izmeniIgraca(" . $player['id'] . ")'>Izmeni</button>
                        </td> 
                    </tr>";
        }

        $table .= "</table>";

        echo $table;
        ?>



        <br>
        <button type="button" class="btn btn-primary" name="dodaj" onclick="dodajIgraca()">Dodaj</button>




        
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
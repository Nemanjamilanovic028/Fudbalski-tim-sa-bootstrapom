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
    function obrisiNavijaca(id) {
        window.location = "deleteNavijaca.php?id_navijaca=" + id;
    }

    function izmeniNavijaca(id) {
        window.location = "editNavijaca.php?id_navijaca=" + id;
    }

    function dodajNavijaca() {
        window.location = "addNavijaca.php";
    }
</script>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <h1>Igrači</h1>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teams.php">
                            <h1>Timovi</h1>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="utakmice.php">
                            <h1>Utakmice</h1>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="navijaci.php">
                            <h1>Navijači</h1>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transferi.php">
                            <h1>Transferi</h1>
                        </a>
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
            $navijaci = $db->getAllNavijaci();
        else
            $navijaci = $db->getAllNavijaci($_GET['search']);

        $table = "<table border='1'>";

        $table .= "<tr> <th>Ime</th> <th>Prezime</th> <th>Tim za koji navija</th> <th></th> </tr>";

        foreach ($navijaci as $navijac) {
            $table .= "<tr> <td>" . $navijac['ime'] . "</td> <td>" . $navijac['prezime'] . "</td> <td>" . $db->getTeamById($navijac['id_tima'])['naziv'] . "</td> <td><input type='button' value='obrisi' onclick='obrisiNavijaca(" . $navijac['id'] . ")'> <input type='button' value='izmeni' onclick='izmeniNavijaca(" . $navijac['id'] . ")'></td> </tr>";
        }

        $table .= "</table>";

        echo $table;
        ?>

        <br>
        <input type="button" class="btn btn-primary" name="dodaj" value="Dodaj" onclick="dodajNavijaca()">






    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
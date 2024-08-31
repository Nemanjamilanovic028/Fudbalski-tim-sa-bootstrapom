<!DOCTYPE html>



<?php
    require_once './db.php';
    $db = new Db();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="izgled.css">  
        <title></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    </head>
    
    <script>
        function obrisiUtakmicu(id)
        {
            window.location = "deleteUtakmica.php?id_utakmice=" + id;
        }
        
        function izmeniTim(id)
        {
            window.location = "editTeam.php?id_tima=" + id;
        }
        
        function dodajUtakmicu()
        {
            window.location = "addUtakmicu.php";
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
            if(!isset($_GET['search']) || $_GET['search'] == '')
                $utakmice = $db->getAllUtakmice();
            else
                $utakmice = $db->getAllUtakmice($_GET['search']);
            
              
                $table = "<table class='table table-striped table-bordered'>";
                
                $table .= "<thead><tr> 
                    <th>Naziv tima domaćina</th> 
                    <th>Naziv tima gosta</th> 
                    <th>Golovi domaćin</th> 
                    <th>Golovi gost</th> 
                    <th>Akcije</th> 
                </tr></thead>";
                
                $table .= "<tbody>";
                
                foreach ($utakmice as $utakmica) {
                    $table .= "<tr> 
                        <td>" . htmlspecialchars($db->getTeamById($utakmica['id_tima_1'])['naziv']) . "</td> 
                        <td>" . htmlspecialchars($db->getTeamById($utakmica['id_tima_2'])['naziv']) . "</td> 
                        <td>" . htmlspecialchars($utakmica['golovi_1']) . "</td> 
                        <td>" . htmlspecialchars($utakmica['golovi_2']) . "</td> 
                        <td>
                            <button class='btn btn-danger btn-sm' onclick='obrisiUtakmicu(" . htmlspecialchars($utakmica['id']) . ")'>Obriši</button>
                        </td> 
                    </tr>";
                }
                
                $table .= "</tbody>";
                $table .= "</table>";
                
                echo $table;
            
            
        ?>
        
        <br>
        <button type="button" class="btn btn-primary" name="dodaj" onclick="dodajUtakmicu()">Dodaj</button>


    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

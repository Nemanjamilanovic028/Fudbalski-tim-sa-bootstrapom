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
    function proveri() {
        id_tima_1 = document.getElementById('id_tima_1').value;
        id_tima_2 = document.getElementById('id_tima_2').value;
        golovi_1 = document.getElementById('golovi_1').value;
        golovi_2 = document.getElementById('golovi_2').value;

        if (id_tima_1 == '' || id_tima_2 == '' || golovi_1 == '' || golovi_2 == '')
            alert('Polja ne mogu biti prazna');
        else
            return false;
    }
</script>

<div class="container mt-4">
<h1 style="color: white;">Dodavanje Utakmice</h1>
    <form id="myForm" method="get">
        <div class="form-group">
            <label for="id_tima_1" class="form-label">Domaćin:</label>
            <div class="col-3">
                <select class="form-select" name="id_tima_1" id="id_tima_1">
                    <?php
                    $teams = $db->getAllTeams();
                    foreach ($teams as $team):
                    ?>
                        <option value="<?php echo $team['id']; ?>">
                            <?php echo $team['naziv']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="id_tima_2" class="form-label">Gost:</label>
            <div class="col-3">
                <select class="form-select" name="id_tima_2" id="id_tima_2">
                    <?php
                    $teams = $db->getAllTeams();
                    foreach ($teams as $team):
                    ?>
                        <option value="<?php echo $team['id']; ?>">
                            <?php echo $team['naziv']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-3">
                <label for="golovi_1" class="form-label">Golovi Domaćin:</label>
                <input type="text" class="form-control" name="golovi_1" id="golovi_1">
            </div>
        </div>

        <div class="form-group">
            <div class="col-3">
                <label for="golovi_2" class="form-label">Golovi Gost:</label>
                <input type="text" class="form-control" name="golovi_2" id="golovi_2">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" onclick="proveri()">Dodaj</button>
        <a href="utakmice.php" class="btn btn-secondary ml-2">Povratak na Utakmice</a>
    </form>
</div>
</body>

</html>
<?php

session_start();
include_once('connexion.php');
if(!isset($_SESSION['USER_PASS'])){
    header('location:login.php');
    die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <script src="convTabToExl.js"></script>
</head>
<body>
    <section class="infoTable">
        <div class="logout">
            <a href="logout.php">logout <span><i class="fa-solid fa-right-to-bracket"></i></span></a>
        </div>
        <div class="tabelContent">
            <h1>Admin interface :</h1>
            <div class="downTab">
                <button id="telechargerTab">Download Tabel <span><i class="fa-solid fa-download"></i></span></button>
            </div>
            <div class="TabelTitel">
                <h2>Microbiome-DATA :</h2>
            </div>
            <div class="tabelInfo">
                <table border="2px" style="border: 2px solid black;" id="tabData">
                    <tr>
                        <th>PMID</th>
                        <th>DOL</th>
                        <th>YEAR</th>
                        <th>TITLE</th>
                        <th>COUNTRY</th>
                        <th>KeyWord</th>
                        <th>DataSaourse</th>
                        <th>InsertionData</th>
                        <th>CONTROLING</th>
                    </tr>

                    <?php
                                    include_once("connexion.php");
                                    $req = mysqli_query($con, "SELECT * FROM newform");
                                    if (mysqli_num_rows($req) == 0) {
                                        echo "il n y a pas encore des donneés !";
                        
                                    } else {
                                        while ($row = mysqli_fetch_assoc($req)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $row['pmid'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['dol'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['year'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['title'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['country'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['keyWord'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['dataSourse'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['insertionDate'] ?>
                                                </td>
                                                <td>
                                                    <div class="controle">
                                                        <a href="supprimer.php?id=<?= $row['form_id'] ?>" class="delete"> <i class="fa-solid fa-trash"></i>
                                                        delete</a>
                                                        <a href="modifier.php?id=<?= $row['form_id'] ?>" class="update"><i class="fa-solid fa-wrench"></i>
                                                        update</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                    ?>
                    
                </table>
            </div>
        
        </div>
    </section>


<script>
var telechargerTab=document.querySelector('#telechargerTab');
telechargerTab.addEventListener('click',()=>{
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#tabData"));
})

</script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="microbiome.css">
    <title>Document</title>
</head>
<body>

<?php
    include_once("connexion.php");
    
    if(isset($_POST['send'])){

        $pmid=$_POST['pmid'];
        $dol=$_POST['dol'];
        $year=$_POST['year'];
        $title=$_POST['title'];
        $country=$_POST['country'];
        $keyWords=$_POST['keyWords'];
        $dataSources=$_POST['dataSources'];
        $InsertDate=$_POST['InsertDate'];
        
        if(($pmid)&&($dol)&&($year)&&($title)&&($country)&&($keyWords)&&($dataSources)&&($InsertDate)){
            $add = "insert into newform (pmid,dol,year,title,country,keyWord,dataSourse,insertionDate) values ('$pmid','$dol','$year','$title','$country','$keyWords','$dataSources','$InsertDate') ";
            $req=mysqli_query($con,$add);
            if($req){
                echo `<script>alert("vos informations est bien enregistrer .")</script>`;
            }else{
                echo `<script>alert("vos informations non pas enregistrer ! veuiller remplire tous les champs ...")</script>`;
            }
        }
    }
    ?>

    <section class="contentGlobal">
        <div class="formContent">
            <div class="logo">
                <img src="./imges/logo.png" alt="logo de la site">
            </div>
            <div class="title">
                <h1>Microbiome & antimicrobial resistance</h1>
                <hr>
            </div>

            <form action="" method="POST">
                <div class="inputs">
                    <label for="pmid">PMID</label><br>
                    <input type="number" name="pmid" placeholder="PMID" required>
                </div>
                <div class="inputs">
                    <label for="dol">DOL</label><br>
                    <input type="text" name="dol" placeholder="DOL" required>
                </div>
                <div class="inputs">
                    <label for="year">Year</label><br>
                    <input type="number" name="year" placeholder="Year" required>
                </div>
                <div class="inputs">
                    <label for="title">Title</label><br>
                    <input type="text" name="title" placeholder="Title" required>
                </div>
                <div class="inputs">
                    <label for="country">Country</label><br>
                    <input type="text" name="country" placeholder="Country" required>
                </div>
                <div class="inputs">
                    <label for="keyWords">Key_Words</label><br>
                    <input type="text" name="keyWords" placeholder="Key_Words" required>
                </div>
                <div class="inputs">
                    <label for="dataSources">Data_Sources</label><br>
                    <input type="text" name="dataSources" placeholder="Data_Sources" required>
                </div>
                <div class="inputs">
                    <label for="InsertDate">InsertDate</label><br>
                    <input type="date" name="InsertDate" placeholder="InsertDate" required>
                </div>
                <br>
                <div class="btn">
                    <input type="submit" value="Enregistrer" name="send">
                </div>
            </form>
                
        </div>
    </section>
</body>
</html>
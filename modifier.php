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
    $id=$_GET['id'];
    $req = mysqli_query($con,"SELECT * FROM newform where form_id=$id");
    $row=mysqli_fetch_assoc($req);
    if(isset($_POST['btn'])){

        $pmid=$_POST['pmid'];
        $dol=$_POST['dol'];
        $year=$_POST['year'];
        $title=$_POST['title'];
        $country=$_POST['country'];
        $keyWords=$_POST['keyWords'];
        $dataSources=$_POST['dataSources'];
        $InsertDate=$_POST['InsertDate'];


        if(($pmid) && ($dol) && ($year) && ($title) && ($country) && ($keyWords) && ($dataSources) && ($InsertDate)){
            $req = mysqli_query($con,"UPDATE newform SET pmid='$pmid' , dol='$dol' , year='$year' , title='$title' , country='$country' , keyWord='$keyWords' , dataSourse='$dataSources' , insertionDate='$InsertDate' WHERE form_id=$id ");
            if($req){
                header("location:admin.php");
            }
            else {
                die(mysqli_error($con));
            }
        }
        $message="veuillez remplire tous les champs slvp !";  
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
                    <input type="number" name="pmid" placeholder="PMID" required value="<?=$row['pmid']?>">
                </div>
                <div class="inputs">
                    <label for="dol">DOL</label><br>
                    <input type="text" name="dol" placeholder="DOL" required value="<?=$row['dol']?>">
                </div>
                <div class="inputs">
                    <label for="year">Year</label><br>
                    <input type="number" name="year" placeholder="Year" required value="<?=$row['year']?>">
                </div>
                <div class="inputs">
                    <label for="title">Title</label><br>
                    <input type="text" name="title" placeholder="Title" required value="<?=$row['title']?>">
                </div>
                <div class="inputs">
                    <label for="country">Country</label><br>
                    <input type="text" name="country" placeholder="Country" required value="<?=$row['country']?>">
                </div>
                <div class="inputs">
                    <label for="keyWords">Key_Words</label><br>
                    <input type="text" name="keyWords" placeholder="Key_Words" required value="<?=$row['keyWord']?>">
                </div>
                <div class="inputs">
                    <label for="dataSources">Data_Sources</label><br>
                    <input type="text" name="dataSources" placeholder="Data_Sources" required value="<?=$row['dataSourse']?>">
                </div>
                <div class="inputs">
                    <label for="InsertDate">InsertDate</label><br>
                    <input type="date" name="InsertDate" placeholder="InsertDate" required value="<?=$row['insertionDate']?>">
                </div>
                <br>
                <div class="btn">
                    <input type="submit" value="Enregistrer" name="btn">
                </div>
            </form>
                
        </div>
    </section>
</body>
</html>
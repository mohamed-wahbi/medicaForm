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
    if(isset($_POST['submit'])){
        $pmid=$_POST['pmid'];
        $dol=$_POST['dol'];
        $year=$_POST['year'];
        $title=$_POST['title'];
        $country=$_POST['country'];
        $keyWords=$_POST['keyWords'];
        $dataSources=$_POST['dataSources'];
        
        if(($pmid)&&($dol)&&($year)&&($title)&&($country)&&($keyWords)&&($dataSources)){
            $add = "insert into newform (pmid,dol,year,title,country,keyWord,dataSourse,) values ('$pmid','$dol','$year','$title','$country','$keyWords','$dataSources') ";
            $req=mysqli_query($con,$add);
            if($req){
                $msg= `<h3>alert("voila ! vous etes inscrit avec succes .")</h3>`;
            }
            else{
                $msg="<h3>ERROR ! remplire tous les champs slvp .</h3>";
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

            <form method="POST">
                <div class="inputs">
                    <label for="pmid">PMID</label><br>
                    <input type="number" name="pmid" placeholder="PMID" value="<?=$row['pmid']?>">
                </div>
                <div class="inputs">
                    <label for="dol">DOL</label><br>
                    <input type="text" name="dol" placeholder="DOL" value="<?=$row['dol']?>" >
                </div>
                <div class="inputs">
                    <label for="year">Year</label><br>
                    <input type="text" name="year" placeholder="Year" value="<?=$row['year']?>">
                </div>
                <div class="inputs">
                    <label for="title">Title</label><br>
                    <input type="text" name="title" placeholder="Title" value="<?=$row['title']?>">
                </div>
                <div class="inputs">
                    <label for="country">Country</label><br>
                    <input type="text" name="country" placeholder="Country" value="<?=$row['country']?>">
                </div>
                <div class="inputs">
                    <label for="keyWords">Key_Words</label><br>
                    <input type="text" name="keyWords" placeholder="Key_Words" value="<?=$row['keyWord']?>">
                </div>
                <div class="inputs">
                    <label for="dataSources">Data_Sources</label><br>
                    <input type="text" name="dataSources" placeholder="Data_Sources" value="<?=$row['dataSourse']?>">
                </div>
                <br>
                <div class="btn">
                    <input type="submit" value="Enregistrer">
                </div>
            </form>
        </div>
    </section>
</body>
</html>




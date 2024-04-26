<?php

function get_all_toys(){
    //onexpose $cponnexion
    global $connexion;
    //:on crée la requete pour récupérer les jouets
    $query = 'SELECT * FROM `toys`';
    //on exécute la requetass
    if($result = mysqli_query($connexion, $query)){ //on ouvre la connexion et on fait la requete
        //on vérifie que l'on a des resultats
        if(mysqli_num_rows($result)>0){//au moins un resultat dans result
            //on peut parcourir les résultats
            while($toy = mysqli_fetch_assoc($result)){//retourne pour chaque jouet un tableau associatif-->

                render_all_toys($toy);
                 }
        }
    }
}

function get_brands_with_count(){


global $connexion;
//:on crée la requete pour récupérer les jouets
//on crée la requete
 $query = "SELECT brands.id, brands.name, COUNT(toys.brand_id) AS total
 FROM brands 
 INNER JOIN toys ON brands.id = toys.brand_id
 GROUP BY brands.id";
//on exécute la requetass
if($result = mysqli_query($connexion, $query)){ //on ouvre la connexion et on fait la requete
    //on vérifie que l'on a des resultats
    if(mysqli_num_rows($result)>0){//au moins un resultat dans result
        //on peut parcourir les résultats
        while($brand = mysqli_fetch_assoc($result)){//retourne pour chaque jouet un tableau associatif-->
        ?> 
        <li>
            <a class="dropdown-item" href="#">
                <?php echo $brand['name'] ?> ( <?php echo $brand['total'] ?> )
            </a>
        </li>
        <?php
}
}
}}


function get_toy_by_id($toy_id){
    global $connexion;
    //on crée la requete, on récupère l'id de chaque jouet dans la variable
    $query = "SELECT toys.id, toys.name, toys.price, toys.image, toys.description, brands.name AS brand_name
    FROM `toys`
    INNER JOIN `brands` ON toys.brand_id = brands.id
    WHERE toys.id = ?";


    //on prépare la requete
    if($stmt = mysqli_prepare($connexion, $query)){
        //on bind les param
        mysqli_stmt_bind_param($stmt, "i", $toy_id);
    }
    //on exécute la requete
    if(!mysqli_execute($stmt)){
        echo "Erreur lors de l'exécution de la requete";
    }
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result)>0){
        while($toy = mysqli_fetch_assoc($result)){
        render_toy_detail($toy);
        }
    }
}
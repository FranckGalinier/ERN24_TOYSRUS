<?php
//méthode qui récupère tous les jouets
function get_all_toys($brand_id, $order){
  //on expose $connexion
  global $connexion;
  if($brand_id == 0 ){

    //:on crée la requete pour récupérer les jouets
    $query = "SELECT * FROM `toys` ";
		if($order == 'asc'){
			$query .= "ORDER BY price ASC";
		}elseif($order == 'desc'){
			$query .= "ORDER BY price DESC";}
    //on exécute la requetass
    if($result = mysqli_query($connexion, $query)){ //on ouvre la connexion et on fait la requete
      //on vérifie que l'on a des resultats
      if(mysqli_num_rows($result)>0){//au moins un resultat dans result
        //on peut parcourir les résultats
        while($toy = mysqli_fetch_assoc($result)){//retourne pour chaque jouet un tableau associatif-->

          render_all_toys($toy); //renvoie le tableau associatif à la fonction render_all_toys qui va afficher les jouets dans la page
        }
      }
    }
  }else{

		$query = "SELECT * FROM `toys` WHERE brand_id = ? ";

		if($order == 'asc'){
			$query .= "ORDER BY price ASC";
		}elseif($order == 'desc'){
			$query .= "ORDER BY price DESC";
		}
		//on prépare la requete
		if($stmt = mysqli_prepare($connexion, $query)){
			//on bind les parametres
			mysqli_stmt_bind_param($stmt, "i", $brand_id);
			//on exécute la requete
			if(mysqli_stmt_execute($stmt)){
				$result = mysqli_stmt_get_result($stmt);
				if(mysqli_num_rows($result)>0){
					while($toy = mysqli_fetch_assoc($result)){
						render_all_toys($toy);
					}
				}	
			}
		}
	}
}


//méthode qui récupère les marques avec le nombre de jouets
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
        <a class="dropdown-item" href="../brand.php?brand_id=<?php echo $brand['id'] ?> ">
          <?php echo $brand['name'] ?> ( <?php echo $brand['total'] ?> )
        </a>
      </li>
      <?php
    	}
    }
  }
}

//méthode qui récupère un jouet en fonction de son id
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
//méthode qui récupère les jouets en fonction de la marque
function get_toy_by_brand($brand_id){
    global $connexion;
        $query = "SELECT toys.id, toys.name, toys.price, toys.image, toys.description, brands.name AS brand_name
        FROM `toys`
        INNER JOIN `brands` ON toys.brand_id = brands.id
        WHERE brand_id = ?";

      //on prépare la requete
    if($stmt = mysqli_prepare($connexion, $query)){
        //on bind les param
        mysqli_stmt_bind_param($stmt, "i", $brand_id);
    }
    //on exécute la requete
    if(!mysqli_execute($stmt)){
        echo "Erreur lors de l'exécution de la requete";
    }
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result)>0){
        while($toy = mysqli_fetch_assoc($result)){
        render_all_toys($toy);
        }
    }
}

//méthode qui récupère les articles les plus vendus
function get_top_3(){
  global $connexion;

  $query = "SELECT t.id, t.name, t.price, t.image, SUM(s.quantity) AS total
  FROM toys AS t
  INNER JOIN sales as s ON t.id =s.toy_id
  GROUP BY t.id
  ORDER BY total DESC 
  LIMIT 3";

  if($result = mysqli_query($connexion, $query)){ //on ouvre la connexion et on fait la requete
  	//on vérifie que l'on a des resultats
    if(mysqli_num_rows($result)>0){//au moins un resultat dans result
      //on peut parcourir les résultats
      while($toy = mysqli_fetch_assoc($result)){

        render_all_toys($toy);
      }
    }
	}
}

//méthode qui récupère toutes les marques
function get_all_brands(){
  //on réqucère la connexion
  global $connexion;
  //on crée la requete
  $query = "SELECT * FROM brands";
  //on exécute la requete
  if($result = mysqli_query($connexion, $query)){ //on ouvre la connexion et on fait la requete
  //on vérifie que l'on a des resultats
    if(mysqli_num_rows($result)>0){//au moins un resultat dans result
      //on peut parcourir les résultats
      while($brand = mysqli_fetch_assoc($result)){//retourne pour chaque marque dans un tableau associatif-->

        render_list_brand($brand);
      }
    }
  }
}

//méthode qui récupère touts les magasins
function get_stores(){
	global $connexion;
	//on crée la requete
	$query = "SELECT * FROM stores";
	//on exécute la requete
	if($result = mysqli_query($connexion, $query)){ //on ouvre la connexion et on fait la requete
		//on vérifie que l'on a des résultat
		if(mysqli_num_rows($result)>0){//au moins un resultat dans result
			//on peut parcourir les résultats
			while($store = mysqli_fetch_assoc($result)){//retourne pour chaque magasin un tableau associatif-->

				render_list_stores($store);
			}
		}
	}
}

//méthode qui récupère le nom du magasin
function get_title_store($store_id){
	global $connexion;
	//on crée la requete
	$query = "SELECT * FROM stores WHERE id = ?";
	//on prépare la requete
	if($stmt = mysqli_prepare($connexion, $query)){
		//on bind les parametres
		mysqli_stmt_bind_param($stmt, "i", $store_id);
		//on exécute la requete
		if(mysqli_stmt_execute($stmt)){
			$result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result)>0){
				while($store = mysqli_fetch_assoc($result)){ ?>
					<h1>Magasin choisi : <?php echo $store['name'] ?> </h1>
					<h5> Adresse : <?php echo $store['postal_code'] ?> <?php echo $store['city'] ?></h5>
				
	
					
					<?php
				}
			}		
		}
	}
}

//méthode qui récupère les jouets par magasin
function get_all_toys_by_store($store_id){
	global $connexion;
	//on crée la requete
	$query = 'SELECT t.id, t.name, t.price, t.image, s.quantity, m.name AS magasin, m.postal_code, m.city, b.name AS marque
	FROM stock AS s
	INNER JOIN toys AS t ON s.toy_id = t.id
	INNER JOIN stores AS m ON s.store_id = m.id
	INNER JOIN brands AS b ON t.brand_id = b.id
	WHERE m.id = ? ';

	//on prépare la requete
	if($stmt = mysqli_prepare($connexion, $query)){
		//on bind les parametres
		mysqli_stmt_bind_param($stmt, "i", $store_id);
		//on exécute la requete
		if(mysqli_stmt_execute($stmt)){
			$result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result)>0){
				while($toy = mysqli_fetch_assoc($result)){
					render_toy_by_store($toy);
				}
			}
		}
	}
}
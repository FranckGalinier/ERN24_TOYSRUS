<?php
function render_all_toys($toy){ ?>
  <a class="card m-2" href="../detail.php?toy_id=<?php echo $toy['id'] ?>" style="width: 18rem;">
    <div class="d-flex flex-column align-items-center card-body">
      <img class="toy_img" src="../img/<?php echo $toy['image']?>" alt="image de <?php echo $toy['name'] ?>">
      <h5 class="toy_name"> <?php echo $toy['name']?> </h5>
      <p class="toy_price"> <?php echo str_replace('.',',',$toy['price'])?>€</p> <!-- str_replace permet de remplacer dans une string (ici le point par la virgule)-->
    </div>
  </a>
<?php }

function render_toy_detail($toy){ ?>
  <div class="d-flex flex-column align-items-center">
    <h2 class="mt-3"><?php echo $toy['name'] ?></h2>
    <div class="d-flex justify-content-center">
      <div class="d-flex flex-column col-md-4 p-4">
        <img class="toy_img" src="../img/<?php echo $toy['image'] ?>" alt="<?php echo $toy['name'] ?>">
        <p class="toy_price"><?php echo str_replace('.', ',', $toy['price']) ?>€</p>
        <!-- TODO: placer la liste ici -->
        
        <!-- TODO: appeler une fonction qui va retourner 
                    le nombre de jouet par magasin ou le nombre total de jouet-->
      </div>
      <div class="d-flex flex-column col-md-8 p-4">
        <p class="fw-bold"><span class="text-primary">Marque: </span> <?php echo $toy['brand_name'] ?></p>
        <p><?php echo $toy['description'] ?></p>
      </div>
    </div>
  </div>
<?php }

//méthode pour afficher les marques dans la liste déroutante

function render_list_brand($brand){
  $selected =""; // selected est une variable qui permet de sélectionner la marque choisie
  if($_POST['brand'] == $brand['id']){ // si la marque choisie est égale à la marque dans la liste déroulante
    $selected = 'selected'; // alors la marque est sélectionnée
  }
  ?> <option value="<?php echo $brand['id'] ?>" <?php echo $selected  ?>> <!-- on affiche la marque dans la liste déroulante avec l'id de la marque-->
  <?php echo $brand['name'] // on affiche la marque ?> 
  </option>

 <?php 
 }


//méthode qui récupère les marques
function render_list_stores($store){
  ?> <li>
        <a class="dropdown-item" href="../store.php?store_id=<?php echo $store['id'] ?> ">
        <?php echo $store['name'] ?>
        </a>
      </li>
  <?php
}

function render_toy_by_store($toy){
//gestion du stock
//si le produit est à 0 alors on affiche le message "rupture de stock"
$quantity = $toy['quantity'] == 0 ? "Rupture de stock" : $toy['quantity']; // si la quantité est égale à 0 alors on affiche en rupture de stock sinon on affiche la quantité
//gestion de la couleur suivant le stock
$color = $toy['quantity'] == 0 ? "text-danger" : ($toy['quantity'] < 5 ? "text-warning" : "text-success"); 
// si la quantité est égale à 0 alors on affiche en rouge sinon si la quantité est inférieure à 5 alors on affiche en orange sinon on affiche en vert)
?>

<div class="card mb-3" style="width: 540px;">
<div class="row g-0">
  <div class="col-md-4">
    <img class="img-field rounded-start toy_img" src="../img/<?php echo $toy['image'] ?>" alt="<?php echo $toy ['name'] ?>">
  </div>
  <div class="col-md-8">
    <div class="card-body">
      <h5 class="card-title"><?php $toy['name'] ?></h5>
      <p class="card-text">Prix : <?php echo str_replace('.','.', $toy['price']) ?>€</p>
      <p class="card-text">Stock disponibles:
        <span class="<?php echo $color ?> fw-bold"><?php echo $quantity ?></span>
      </p>
      <a class="btn btn-outline-primary" href="../detail.php?toy_id=<?php echo $toy['id'] ?>">Détails</a>
    </div>
  </div>

</div>

</div>

<?php }
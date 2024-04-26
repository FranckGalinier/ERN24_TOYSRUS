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
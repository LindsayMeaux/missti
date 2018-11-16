<?php
include_once 'header.php';
include_once 'controller/searchadsCtrl.php';
include_once 'controller/addadsCtrl.php';

?>




  <div class="container-fluid">
    <div class="row">
      <div id="formBox" class="offset-2 col-8 offset-2">
        <form  enctype="multipart/form-data" action="#" method="POST">
          <div class="form-group">
            <select name="type" id="type">
              <option selected disabled>Choisissez le type</option>
              <?php foreach ($typeList as $typeDetail) { ?>
                <option value="<?= $typeDetail->id ?>"><?= $typeDetail->name ?></option>
              <?php } ?>

            </select>
            <select name="color" >
              <option selected disabled>Choisissez la couleur</option>
              <?php foreach ($colorList as $colorDetail) { ?>
                <option value="<?= $colorDetail->id ?>"><?= $colorDetail->name ?></option>
              <?php } ?>
            </select>
            <select name="material" id="material">
              <option selected disabled>Choisissez une matière</option>
              <?php foreach ($materialList as $materialDetail) { ?>
                <option value="<?= $materialDetail->id ?>"><?= $materialDetail->name ?></option>
              <?php } ?>
            </select>
            <label for="dateApp">Date de perte du doudou:</label>
            <input class="form-control" id="dateApp" type="date" name="dateApp"/>
            <?php if (isset($formError['dateApp'])) { ?>
                <p class="text-danger"><?= isset($formError['dateApp']) ? $formError['dateApp'] : '' ?></p>
            <?php } ?>
            <select name="cities" class="custom-select" id="inputGroupSelect">
              <option selected disabled>veuillez sélectionner une ville---</option>
              <?php foreach ($citiesList as $citiesDetail) { ?>
                <option value="<?= $citiesDetail->id ?>"><?= $citiesDetail->name . ' ' . $citiesDetail->code ?></option>
              <?php } ?>
            </select>
          </div>
            <input type="submit" name="submit" id="submit" value="Trouver le doudou "/>
          </form>
          <p class="text-danger"><?= isset($formError['submit']) ? $formError['submit'] : '' ?></p>
        </div>
      </div>
      <div class="row">
<?php foreach ($teddyAnnounce as $teddyDetail){?>

    <div class="card col-md-12" id="card" >

      <div class="card-body"> <?=$teddyDetail->idCity ?> <?=$teddyDetail->particular ?> <?=$teddyDetail->idColor ?> <?=$teddyDetail->description ?> <?=$teddyDetail->idMaterial ?></div>
      <div class="card-footer"><?=$teddyDetail->particular ?></div>
      <a href="onceTeddyAnnounce.php" class="btn">Voir l'annonce</a>
    </div>


<?php }?>



      </div>
    </div>

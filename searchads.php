<?php
include_once 'header.php';
include_once 'controller/searchadsCtrl.php';
include_once 'controller/addadsCtrl.php';

?>

<div class="container-fluid">
  <div class="row">
    <div id="formBox" class=" form-group offset-1 col-md-4">
      <form  enctype="multipart/form-data" action="#" method="POST">
          <label for="cities">Ville où le doudou a été perdu:</label>
          <select name="cities" class="custom-select" id="inputGroupSelect">
            <option selected disabled>Veuillez sélectionner une ville</option>
            <?php foreach ($citiesList as $citiesDetail) { ?>
              <option value="<?= $citiesDetail->id ?>"><?= $citiesDetail->name . ' ' . $citiesDetail->code ?></option>
            <?php } ?>
          </select>
        </div>
        <div id="formBox" class=" form-group offset-1 col-md-4 xs-12">
          <select name="type" id="type">
            <option selected disabled>Choisissez le type</option>
            <?php foreach ($typeList as $typeDetail) { ?>
              <option value="<?= $typeDetail->id ?>"><?= $typeDetail->type ?></option>
            <?php } ?>

          </select>
          <select name="color" id="color">
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

        <input type="submit" name="submit" class="btn" id="submitAddAdds" value="Rechercher le doudou "/>
          </div>
      </form>
      <p class="text-danger"><?= isset($formError['submit']) ? $formError['submit'] : '' ?></p>
    </div>
  </div>
  <div class="row">
    <?php foreach ($teddyAnnounce as $teddyDetail){?>

      <div class="card col-md-4 lg-4" id="card" >
        <div class="row">
          <div class="col-md-2"> <img class="photoAdds" src="files/<?= $teddyDetail->photo ?> "/></div>
          <div class="card-body col-md-4 offset-2"> <p><?=$teddyDetail->name ?></p> <p> <?=$teddyDetail->particular ?></p> <p><?=$teddyDetail->type ?></p> <p><?=$teddyDetail->color ?> </p></div>
        <a href="onceTeddyAnnounce.php?id=<?=$teddyDetail->id ?>" class="btn col-xs-11" id="buttonForViewAdd">Voir l'annonce</a>

  </div>
    </div>
    <?php }?>
</div>

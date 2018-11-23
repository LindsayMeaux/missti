<?php
include_once 'header.php';
include_once 'controller/addadsCtrl.php';
?>
<?php


if (isset($_POST['submit']) && (count($formError) === 0)) { ?>
  <p id="ok">Les données ont été enregistrées</p>

<?php } else { ?>
  <div class="container-fluid">
    <div class="row">
      <div id="formBox" class="offset-2 col-8 offset-2">
        <form  enctype="multipart/form-data" action="#" method="POST">
          <div class="form-group">
            <select name="type" id="type">
              <option selected disabled>Choisissez le type</option>
              <?php foreach ($typeList as $typeDetail) { ?>
                <option value="<?= $typeDetail->id ?>"><?= $typeDetail->type ?></option>
              <?php } ?>
            </select>

            <select name="color" >
              <option selected disabled>Choisissez la couleur</option>
              <?php foreach ($colorList as $colorDetail) { ?>
                <option value="<?= $colorDetail->id ?>"><?= $colorDetail->name ?></option>
              <?php } ?>
            </select>

            <select name="material" id="material">
              <option selected disabled>Choisissez la matière</option>
              <?php foreach ($materialList as $materialDetail) { ?>
                <option value="<?= $materialDetail->id ?>"><?= $materialDetail->name ?></option>
              <?php } ?>
            </select>

            <label for="dateApp">Date à laquelle le doudou a été trouvé:</label>
            <input class="form-control" id="dateApp" type="date" name="dateApp"/>
            <?php if (isset($formError['dateApp'])) { ?>
              <p class="text-danger"><?= isset($formError['dateApp']) ? $formError['dateApp'] : '' ?></p>
            <?php } ?>

            <input class="" id="particular" type="text" name="particular" placeholder="Un signe particulier?"/>

            <select name="cities" class="custom-select" id="inputGroupSelect">
              <option selected disabled>veuillez sélectionner une ville---</option>
              <?php foreach ($citiesList as $citiesDetail) { ?>
                <option value="<?= $citiesDetail->id ?>"><?= $citiesDetail->name . ' ' . $citiesDetail->code ?></option>
              <?php } ?>
            </select>

          </div>
          <div>
            <label name="description"></label>
            <textarea name="description"></textarea>
          </div>

          <input type="file" name="file" value="450000" />
          <?php if (isset($formError['file'])) { ?> <p class="text-danger"><?= $formError['file']; ?></p> <?php } ?>

          <input class="col-xs-11" type="submit" name="submit" id="submit" value="Déposer l'annonce"/>
        </form>
        <p class="text-danger"><?= isset($formError['submit']) ? $formError['submit'] : '' ?></p>
      </div>
    </div>
  </div>
<?php } ?>

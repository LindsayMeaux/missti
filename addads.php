<?php
include_once 'header.php';
include_once 'controller/addadsCtrl.php';
?>
<?php

//si les données sont valides , on affiche le message de réussite
if (isset($_POST['submit']) && (count($formError) === 0)) { ?>
  <p id="ok">Votre annonce a bien été postée</p>
  <!-- sinon on affiche le formulaire à compléter
-->
<?php } else { ?>
  <div class="container-fluid">
    <div class="row">
      <div id="formBox" class="offset-1 col-10 offset-1">
        <form  enctype="multipart/form-data" action="#" method="POST">
          <div class="form-group">
            <h1> Informations sur le doudou trouvé</h1>
            <label for="dateApp">Date à laquelle le doudou a été trouvé:</label>
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
          </div>
          <div>
            <label name="description">Description</label>
            <textarea name="description"></textarea>
          </div>
          <input id="particular" type="text" name="particular" placeholder="Un signe particulier?"/>

          <input type="file" name="file" value="450000" />
          <?php if (isset($formError['file'])) { ?> <p class="text-danger"><?= $formError['file']; ?></p> <?php } ?>

          <input class="col-xs-11" type="submit" name="submit" id="submit" value="Déposer l'annonce"/>
        </form>
        <p class="text-danger"><?= isset($formError['submit']) ? $formError['submit'] : '' ?></p>
      </div>
    </div>
  </div>
<?php } ?>
</body>
</html>

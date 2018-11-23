<?php
include_once 'header.php';
include_once 'controller/modifyAddByUserCtrl.php';






if (isset($_POST['modifiedAdd']) && (count($formError) === 0)) { ?>
  <p id="ok">L'annonce a bien été modifié</p>

<?php } else { ?>
  <div class="container-fluid">
    <div class="row">
      <div id="formBox" class="offset-2 col-8 offset-2">
        <form  enctype="multipart/form-data" action="#" method="POST">
          <div class="form-group">
            <select name="type" id="type">

              <?php foreach ($typeList as $typeDetail) { ?>
                <!-- si l'id de la première selection de l'utilisateur est présent dans le select alors il devient "active" sinon il ne faut rien afficher
                -->
                <option value="<?= $typeDetail->id ?>" <?= $typeDetail->id == $onlyAndOnceTeddy->typeId ? 'active' : ''; ?> ><?= $typeDetail->type ?></option>
              <?php } ?>
            </select>

            <label for="color">Veuillez sélectionner une couleur :</label>
            <select name="color" >

              <?php foreach ($colorList as $colorDetail) { ?>
                <option value="<?= $colorDetail->id ?>" <?= $colorDetail->id == $onlyAndOnceTeddy->colorId ? 'active': ''; ?>><?= $colorDetail->name ?></option>
              <?php } ?>
            </select>

            <select name="material" id="material">

              <?php foreach ($materialList as $materialDetail) { ?>
                <option value="<?= $materialDetail->id ?>"<?= $materialDetail->id == $onlyAndOnceTeddy->materialId ? 'active': ''; ?>><?= $materialDetail->name ?></option>
              <?php } ?>
            </select>


            <textarea class="" id="particular" type="text" name="particular"><?=$onlyAndOnceTeddy->particular ?></textarea>

            <select name="cities" class="custom-select" id="cities">

              <?php foreach ($citiesList as $citiesDetail) { ?>
                <option value="<?= $citiesDetail->id ?>" <?= $citiesDetail->id == $onlyAndOnceTeddy->cityId ? 'active': ''; ?> ><?= $citiesDetail->name . ' ' . $citiesDetail->code ?></option>
              <?php } ?>
            </select>
            <label for="dateApp">Date à laquelle le doudou a été trouvé:</label>
            <input class="form-control" id="date" type="text" name="dateApp" value="<?= $onlyAndOnceTeddy->date?>"/>
            <?php if (isset($formError['dateApp'])) { ?>
              <p class="text-danger"><?= isset($formError['dateApp']) ? $formError['dateApp'] : '' ?></p>
            <?php } ?>

          </div>
          <div>
            <label name="description"></label>
            <textarea name="description"><?= $onlyAndOnceTeddy->description ?> </textarea>
          </div>
          <div > <img class="photoByAdd" src="files/<?= $onlyAndOnceTeddy->photo ?> "/></div>

          <?php if (isset($formError['file'])) { ?> <p class="text-danger"><?= $formError['file']; ?></p> <?php } ?>

          <input class="col-xs-11" type="submit" name="modifiedAdd" id="modifiedAdd" value="Modifier l'annonce"/>
        </form>
        <p class="text-danger"><?= isset($formError['modifiedAdd']) ? $formError['modifiedAdd'] : '' ?></p>
      </div>
    </div>
  </div>
<?php } ?>

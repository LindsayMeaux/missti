<?php include_once 'header.php' ?>
  <div class="container">
    <?php if(isset($_GET['messageDelete'])){
      echo $_GET['messageDelete'];
    } ?>
      <div class="row">
        <div class="col-xs-12 col-lg-4 offset-4">
          <div class="presentation">
            <p class="welcomeTitle">
              Bienvenue sur MISSTI!</p>
              <p class="descriptionSite">Ici vous pourrez consulter des annonces de doudous trouvés. Cependant avant de pouvoir les consulter, il faut vous connecter ou vous inscrire. L'équipe MISSTI vous souhaite de retrouver votre doudou!
              </p>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>

<!DOCTYPE html>
<html lang="en">
  <!-- Home Head -->
  <?php
    include('../../templates/home-head.php');
  ?>
  <!-- !Home Head -->
  <body>
    <header id="header">
      <!-- Home Navigation Bar-->
      <?php
        include('../../templates/home-nav.php');
      ?>
      <!-- !Home Navigation Bar-->
    </header>

    <main id="main">
      <!--Top Image-->
      <div
        class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white"
        style="background-image: url('../../../public/img/marble-blue-2.jpg');"
      >
        <img src="../../../public/img/logo-white.png" width="40%">
        <h1 class="mb-3 "><b>Crafting timeless beauty with every marble.</b></h1>
      </div>
        <!--Top Image--> 
          <div class="mx-5 mb-5"> 
          <div class="mx-5">
            <div class="mx-5">
            <div class="mx-5">
              <div class="mx-5">
                <p class="mx-5"><h1 class="font-roboto text-info">Who We Are:</h1></p>
                <div class="mx-3">
                <p class="mx-5"><h3 class="font-roboto" style="font-weight: 100;">We are a family-owned and operated marble factory that has been producing high-quality marble products for over 50 years. We specialize in custom-made marble countertops, tiles, fireplaces, sculptures and more. We use only the finest natural stone from around the world and employ skilled craftsmen who can create any design you can imagine.</h3></p>
                </div>
                <p class="mx-5"><h1 class="font-roboto text-info">Our Mission:</h1></p>
                <div class="mx-3">
                <p class="mx-5"><h3 class="font-roboto" style="font-weight: 100;">Our mission is to provide our customers with exceptional service, quality and value. We take pride in our work and guarantee your satisfaction. Whether you need marble for your home, office, hotel or any other project, we can help you transform your space into a masterpiece.</h3></p>
                </div>
              </div>
            </div>
        </div>
        </div>
      </div>
    </main>

    <!-- Home Footer -->
    <?php
        include('../../templates/home-footer.php');
    ?>
    <!-- !Home Footer -->

    <!-- Home Scripts -->
    <?php
        include('../../templates/home-scripts.php');
    ?>
    <!-- !Home Scripts -->
  </body>
</html>

<header>
  <!-- Intro settings -->
  <style>
    /* Default height for small devices */
    #intro-example {
      height: 400px;
    }

    /* Height for devices larger than 992px */
    @media (min-width: 992px) {
      #intro-example {
        height: 600px;
      }
    }
  </style>

  <!-- Navbar -->
  <?php
    require_once('menu.php');
  ?>
  <!-- Navbar -->

  <!-- Background image -->
  <div
          id="intro-example"
          class="p-5 text-center bg-image"
          style="background-image: url('background.jpg'); max-width: 100%; height: 500px;"
  >
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
      <div class="d-flex justify-content-center align-items-center h-120">
        <div class="text-white" style="padding-top:3%" >
          <h1 class="mb-3" style="font-family: Copperplate">THE PRODUCT IS MADE FROM FABRIC </h1>
          <h5 class="mb-4" style="font-family: Comic Sans MS">It's our pleasure to serve you</h5>
          <a
                  class="btn btn-outline-light btn-lg m-2"
                  href="vegetable/index.php"
                  role="button"
                  rel="nofollow"
                  target="_blank"
          >View Details</a
          >
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
</header>
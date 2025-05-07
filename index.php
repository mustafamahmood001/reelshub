<?php 
include('./includes/header.php');
include('./includes/dbconnection.php');
$query = "SELECT * FROM reelshub";


?>
<section class="hero-section">
  <div class="container" id="hero-container">
  <div class="row">
  <!-- Left Side: Filter + Search -->
  <div class="col-md-4 mb-4">
    <div class="bg-dark p-4 rounded">
      <h5 class="text-white mb-3">Search & Filter</h5>

      <form id="filterForm" method="">
        <!-- Search Box -->
        <input type="text" name="search" class="form-control mb-3" placeholder="Search movies...">

        <!-- Genre Filter -->
        <select name="genre" class="form-select mb-3">
          <option value="">All Genres</option>
          <option value="action">Action</option>
          <option value="comedy">Comedy</option>
          <option value="drama">Drama</option>
        </select>

        <!-- Year Range Filter -->
        <div class="d-flex justify-content-between gap-2 mb-3">
          <input type="number" name="fromYear" class="form-control" placeholder="From Year" min="1900" max="2099">
          <input type="number" name="toYear" class="form-control" placeholder="To Year" min="1900" max="2099">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn bg-light w-100">Search</button>
      </form>
    </div>
  </div>


      <!-- Right Side: Movie Slider -->
<div class="col-md-8">
  <div id="movieCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php
      $stmnt = mysqli_query($conn, $query);
      $activeSet = false; // to set only the first item as active

      if (mysqli_num_rows($stmnt) > 0) {
        while ($row = mysqli_fetch_assoc($stmnt)) {
      ?>
          <div class="carousel-item <?php echo (!$activeSet) ? 'active' : ''; ?>">
            <div class="card bg-dark text-white">
              <div class="row g-0">
                <!-- Image -->
                <div class="col-md-4">
                <img src="/ReelHub/banner_image/<?php echo $row['movie_banner']; ?>" class="img-fluid rounded-start" alt="Movie">
                </div>

                <!-- Details -->
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Movie Title: <?php echo htmlspecialchars($row['movie_title']); ?></h5>
                    <p class="card-text">Year: <?php echo htmlspecialchars($row['movie_year']); ?></p>
                    <p class="card-text">Genre: <?php echo htmlspecialchars($row['movie_genre']); ?></p>
                    <p class="card-text">Description: <?php echo htmlspecialchars($row['movie_description']); ?></p>
                    <a href="view.php?id=<?php echo $row['id']; ?>"><p style="margin-left: 38%;">view</p></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php
          $activeSet = true; // set true after first item
        }
      }
      ?>
    </div>
  </div>
</div>

          <!-- Controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#movieCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#movieCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>
    </div>
  </div>

  
</section>
<div class="under-section" id="searcContent">
  <div class="row g-4">
    <?php
    $stmnt = mysqli_query($conn, $query);
    if (mysqli_num_rows($stmnt) > 0) {
      while ($row = mysqli_fetch_assoc($stmnt)) {
    ?>
      <div class="col-md-4">
        <div class="card bg-dark text-white h-100">
          <img src="/ReelHub/banner_image/<?php echo $row['movie_banner']; ?>" class="card-img-top" alt="Movie" style="height: 380px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['movie_title']; ?></h5>
            <p class="card-text">Year: <?php echo $row['movie_year']; ?></p>
            <p class="card-text">Genre: <?php echo $row['movie_genre']; ?></p>
            <p class="card-text">Description: <?php echo $row['movie_description']; ?></p>
            <a href="view.php?id=<?php echo $row['id']; ?>"><p style="margin-left: 38%;">view</p></a>
            </div>
        </div>
      </div>
    <?php
      }
    }
    ?>
  </div>
</div>

  <?php include('./includes/footer.php');?>
  
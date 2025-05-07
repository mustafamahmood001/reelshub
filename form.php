<?php include('./includes/header.php');
include('./includes/dbconnection.php');

$movie_title_err = $movie_year_err = $movie_description_err = $movie_genre_err = 
$movie_banner_err = $movie_video_err = "";

$movie_title = $movie_year = $movie_description = $movie_genre = 
$movie_banner = $movie_video = "";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $movie_title = $_POST['movie_title'] ?? '';
    $movie_year = $_POST['movie_year'] ?? '';
    $movie_description = $_POST['movie_description'] ?? '';
    $movie_genre = $_POST['movie_genre'] ?? '';

    if(empty($movie_title)) $movie_title_err = "Please write movie title";
    if(empty($movie_year)) $movie_year_err = "Please write movie year";
    if(empty($movie_description)) $movie_description_err = "Please write movie description";
    if(empty($movie_genre)) $movie_genre_err = "Please write movie genre";

    if ($_FILES['movie_banner']['error'] == 0) {
        $banner_name = $_FILES['movie_banner']['name'];
        $banner_temp_name = $_FILES['movie_banner']['tmp_name'];
        $banner_folder = "banner_image/";
        move_uploaded_file($banner_temp_name, $banner_folder . $banner_name);
    } else {
        $movie_banner_err = "Please upload movie banner";
    }

    if ($_FILES['movie_video']['error'] == 0) {
        $video_name = $_FILES['movie_video']['name'];
        $video_temp_name = $_FILES['movie_video']['tmp_name'];
        $video_folder = "banner_video/";
        move_uploaded_file($video_temp_name, $video_folder . $video_name);
    } else {
        $movie_video_err = "Please upload movie";
    }

    if(empty($movie_title_err) && empty($movie_year_err) && empty($movie_description_err) &&
       empty($movie_genre_err) && empty($movie_banner_err) && empty($movie_video_err)){
        
        $query = "INSERT INTO reelshub (`movie_title`, `movie_year`, `movie_description`, `movie_genre`, `movie_banner`, `movie_video`) 
          VALUES ('$movie_title', '$movie_year', '$movie_description', '$movie_genre', '$banner_name', '$video_name')";
        
        $stmnt = mysqli_query($conn, $query);
        
        if($stmnt){
          header('location:index.php');
            echo "Uploaded Successfully!";
        } else {
            echo "Database Insert Error: " . mysqli_error($conn);
        }
    }
}
?>

<section class="hero-section">
  <div class="form-container bg-dark" style="max-width: 600px; margin: auto; padding: 20px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; margin-bottom: 20px;">Upload Movie</h2>
    <form action="" method="POST" id="formSubmit" enctype="multipart/form-data" onsubmit="submitMessage(); return false;">
      <!-- Movie Title -->
      <div class="form-group " style="margin-bottom: 15px;">
        <label>Movie Title</label>
        <input type="text" name="movie_title"  style="width: 100%; padding: 8px;" data-parsley-required	 data-parsley-length="[3, 50]" value="<?php echo $movie_title ?>" />
        <span class="errors" style="color:red"><?php echo $movie_title_err?></span>
      </div>
      
      <!-- Movie Year -->
      <div class="form-group" style="margin-bottom: 15px;">
        <label>Movie Year</label>
        <input type="date" name="movie_year"  style="width: 100%; padding: 8px;" data-parsley-required value="<?php echo $movie_year ?>" />
        <span class="errors" style="color:red"><?php echo $movie_year_err?></span>
      </div>
      
      <!-- Movie Description -->
      <div class="form-group" style="margin-bottom: 15px;">
        <label>Movie Description</label>
        <textarea name="movie_description" rows="4"  style="width: 100%; padding: 8px;" data-parsley-required data-parsley-length="[8, 250]" value="<?php echo $movie_description ?>"></textarea>
        <span class="errors" style="color:red"><?php echo $movie_description_err?></span>
      </div>
      
      <!-- Movie Genre -->
      <div class="form-group " style="margin-bottom: 15px;">
      <label>Movie Genre</label>
      <select name="movie_genre" style="width: 100%; padding: 8px;" required data-parsley-required-message>
         <option value="">-- Select Genre --</option>
        <option value="Action" <?php if($movie_genre == "Action") echo "selected"; ?>>Action</option>
        <option value="Adventure" <?php if($movie_genre == "Adventure") echo "selected"; ?>>Adventure</option>
        <option value="Comedy" <?php if($movie_genre == "Comedy") echo "selected"; ?>>Comedy</option>
        <option value="Drama" <?php if($movie_genre == "Drama") echo "selected"; ?>>Drama</option>
        <option value="Fantasy" <?php if($movie_genre == "Fantasy") echo "selected"; ?>>Fantasy</option>
        <option value="Horror" <?php if($movie_genre == "Horror") echo "selected"; ?>>Horror</option>
        <option value="Romance" <?php if($movie_genre == "Romance") echo "selected"; ?>>Romance</option>
        <option value="Sci-Fi" <?php if($movie_genre == "Sci-Fi") echo "selected"; ?>>Sci-Fi</option>
        <option value="Thriller" <?php if($movie_genre == "Thriller") echo "selected"; ?>>Thriller</option>
        <option value="Mystery" <?php if($movie_genre == "Mystery") echo "selected"; ?>>Mystery</option>
        <option value="Animation" <?php if($movie_genre == "Animation") echo "selected"; ?>>Animation</option>
  <option value="Documentary" <?php if($movie_genre == "Documentary") echo "selected"; ?>>Documentary</option>
</select>

          <span class="errors" style="color:red"><?php echo $movie_genre_err?></span>
      </div>
      
      <!-- Movie Banner -->
      <div class="form-group" style="margin-bottom: 15px;">
        <label>Movie Banner</label>
        <input type="file" name="movie_banner" accept="image/*"  style="width: 100%;" data-parsley-required  data-parsley-filemimetypes="image/jpeg, image/png, image/webp" />
        <span class="errors" style="color:red"><?php echo $movie_banner_err?></span>
      </div>
      
      <!-- Movie Video -->
      <div class="form-group" style="margin-bottom: 20px;">
        <label>Movie Video</label>
        <input type="file" name="movie_video" accept="video/*"  style="width: 100%;" data-parsley-required />
        <span class="errors" style="color:red"><?php echo $movie_video_err?></span>
      </div>
      
      <!-- Submit Button -->
      <div style="text-align: center;">
        <button type="submit" style="padding: 10px 20px; background: #FF6700; color: #fff; border: none; border-radius: 5px;">
          Upload Movie
        </button>
      </div>
    </form>
  </div>
</section>


<?php include('./includes/footer.php');?>

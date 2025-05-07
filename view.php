<?php include('./includes/header.php');
include('./includes/dbconnection.php');
$movie_id=$_GET['id'];
$query="SELECT * FROM reelshub WHERE id={$movie_id}";


?>
<div class="view" style="width: 80%; margin-left:11%; height:40%">
    <!-- Movie Card 1 -->
    
    <div class="card bg-dark text-white h-100">
<?php
$stmnt=mysqli_query($conn, $query);
if(mysqli_num_rows($stmnt)>0){
    while($row=mysqli_fetch_assoc($stmnt)){
?>
    <video class="card-img-top" style="height: 510px; width: 100%; object-fit: cover;" controls muted>
  <source src="/ReelHub/banner_video/<?php echo $row['movie_video']; ?>" type="video/mp4">
  Your browser does not support the video tag.
</video>
        <div class="card-body">
          <h5 class="card-title">Movie Title: <?php echo $row['movie_title']; ?></h5>
          <p class="card-text">Year: <?php echo $row['movie_year']; ?></p>
          <p class="card-text">Genre: <?php echo $row['movie_genre']; ?></p>
          <p class="card-text"><?php echo $row['movie_description']; ?></p>
          <a href="download.php?id=<?php echo $row['id']; ?>">Download</a>

        
        <?php
        }
    }
        ?>
        </div>
     </div>
</section>


<?php include('./includes/footer.php');?>

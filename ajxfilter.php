<?php
include('./includes/dbconnection.php');

$search = mysqli_real_escape_string($conn, $_POST['search'] ?? '');
$genre = mysqli_real_escape_string($conn, $_POST['genre'] ?? '');
$fromYear = mysqli_real_escape_string($conn, $_POST['fromYear'] ?? '');
$toYear = mysqli_real_escape_string($conn, $_POST['toYear'] ?? '');

// Build dynamic SQL
$sql = "SELECT * FROM reelshub WHERE 1";

if (!empty($search)) {
    $sql .= " AND (movie_title LIKE '%$search%' OR movie_description LIKE '%$search%')";
}

if (!empty($genre)) {
    $sql .= " AND movie_genre = '$genre'";
}

if (!empty($fromYear)) {
    $sql .= " AND movie_year >= '$fromYear'";
}

if (!empty($toYear)) {
    $sql .= " AND movie_year <= '$toYear'";
}

$result = mysqli_query($conn, $sql);
$output = '';

if (mysqli_num_rows($result) > 0) {
    $output .= '<div class="row g-4">';
    $count = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '
        <div class="col-md-4">
            <div class="card bg-dark text-white h-100">
                <img src="/ReelHub/banner_image/' . $row['movie_banner'] . '" class="card-img-top" alt="Movie" style="height: 380px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">' . htmlspecialchars($row['movie_title']) . '</h5>
                    <p class="card-text">Year: ' . htmlspecialchars($row['movie_year']) . '</p>
                    <p class="card-text">Genre: ' . htmlspecialchars($row['movie_genre']) . '</p>
                    <p class="card-text">Description: ' . htmlspecialchars($row['movie_description']) . '</p>
                    <a href="view.php?id=' . $row['id'] . '" class="btn btn-outline-light btn-sm mt-2">View</a>
                </div>
            </div>
        </div>';
        $count++;

        // New row every 3 cards
        if ($count % 3 == 0) {
            $output .= '</div><div class="row g-4">';
        }
    }

    $output .= '</div>';
} else {
    $output = '<h3 class="text-danger">No results found.</h3>';
}

echo $output;
?>

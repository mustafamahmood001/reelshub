<?php
include('./includes/dbconnection.php');

if (isset($_GET['id'])) {
    $movie_id = intval($_GET['id']);

    $query = "SELECT movie_video FROM reelshub WHERE id = $movie_id";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $filename = $row['movie_video'];
        $filepath = 'banner_video/' . $filename;

        if (file_exists($filepath)) {
            // Clean buffer to prevent accidental output
            if (ob_get_level()) {
                ob_end_clean();
            }

            header('Content-Description: File Transfer');
            header('Content-Type: video/mp4');
            header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Send headers to client
            readfile($filepath);
            exit;
        } else {
            http_response_code(404);
            echo "❌ File not found.";
        }
    } else {
        echo "No video found for this ID.";
    }
} else {
    echo "No ID provided.";
}
?>

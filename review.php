<?php
session_start();


if (!isset($_SESSION['reviews'])) {
    $_SESSION['reviews'] = [];
}

// If form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $newReview = trim($_POST['review']);
    date_default_timezone_set('Etc/GMT+6');

    if (!empty($name) && !empty($newReview)) {
        $_SESSION['reviews'][] = [
            'name' => htmlspecialchars($name),
            'review' => htmlspecialchars($newReview),
            'datetime' => date("Y-m-d H:i:s") 
        ];

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Review Page</title>
    <link rel="stylesheet" href="./review.css">
  
</head>
<body>

<h1>Leave Your Review</h1>

<form method="POST" action="">
    <input type="text" name="name" placeholder="Your Name" required><br>
    <textarea name="review" placeholder="Write your review here..." required></textarea><br>
    <button type="submit">Submit Review</button>
</form>

<h2>All Reviews:</h2>

<?php if (!empty($_SESSION['reviews'])): ?>
    <?php foreach ($_SESSION['reviews'] as $entry): ?>
        <div class="review-box">
            <div class="review-name"><?php echo $entry['name']; ?></div>
            <div class="review-time"><?php echo $entry['datetime']; ?></div>
            <div class="review-text"><?php echo $entry['review']; ?></div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No reviews yet. Be the first!</p>
<?php endif; ?>

</body>
</html>

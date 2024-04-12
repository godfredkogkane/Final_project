<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="../css/feedback.css">
</head>
<body>
    <header>
        <h1>Submit Feedback</h1>
    </header>

    <section>
        <h1 style="color: rgb(33, 214, 33);">We'd love to hear from you!</h1>
        <form action="../actions/feedback_action.php" method="POST">
            <textarea name="message" rows="4" cols="50" placeholder="Enter your feedback here..." required></textarea><br>
            <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
            <input type="submit" value="Submit Feedback">
        </form>
        <button onclick="window.location.href='../view/home.php';">Back to Home</button>
    </section>
</body>
</html>

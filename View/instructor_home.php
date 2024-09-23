<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Home</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file -->
</head>
<body>
    <h1>Welcome, Instructor!</h1>
    <h2>Your Courses:</h2>
    <ul>
        <?php foreach ($courses as $course): ?>
            <li><?php echo htmlspecialchars($course['title']); ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="logout.php">Logout</a>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Instructor Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Instructor Dashboard</h1>
    <h2>Your Courses</h2>
    <ul>
        <?php foreach ($courses as $course): ?>
            <li>
                <?php echo $course['title']; ?>
                <a href="index.php?action=viewEnrollmentRequests&course_id=<?php echo $course['id']; ?>">View Enrollment Requests</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

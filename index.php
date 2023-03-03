<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Maze Solver</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Maze Solver</h1>
    <?php
    require_once 'maze.php';
    require_once 'search.php';

    if (isset($_POST['maze']) && isset($_POST['start']) && isset($_POST['end'])) {
        // Get the maze, start and end points from the form
        $maze = array_map(function ($row) {
            return array_map('intval', str_split(trim($row)));
        }, explode("\n", $_POST['maze']));
        $start = array_map('intval', explode(',', $_POST['start']));
        $end = array_map('intval', explode(',', $_POST['end']));

        // Call the bfs function to find the shortest path
        require_once('search.php');
        $path = bfs($maze, $start, $end);

        // Display the shortest path, if found
        if ($path === null) {
            echo "<p>No path found from [$start[0],$start[1]] to [$end[0],$end[1]].</p>";
        } else {
            echo "<p>Shortest path from [$start[0],$start[1]] to [$end[0],$end[1]]:</p>";
            echo "<ul>";
            foreach ($path as $cell) {
                echo "<li>[$cell[0],$cell[1]]</li>";
            }
            echo "</ul>";
        }
    }
    ?>
    <form method="post">
        <label for="maze">Enter maze:</label><br>
        <textarea id="maze" name="maze" rows="10" cols="50" placeholder="11000
01000
01000
01000
01111"><?php if (isset($_POST['maze'])) {
    echo $_POST['maze'];
} ?></textarea><br>
        <label for="start">Enter start point (e.g. 0,0):</label><br>
        <input type="text" id="start" name="start" value="<?php if (isset($_POST['start'])) {
            echo $_POST['start'];
        } ?>" placeholder="0,0"><br>
        <label for="end">Enter end point (e.g. 4,4):</label><br>
        <input type="text" id="end" name="end" value="<?php if (isset($_POST['end'])) {
            echo $_POST['end'];
        } ?>" placeholder="4,4"><br>
        <input type="submit" value="Find Shortest Path">
    </form>

</body>

</html>
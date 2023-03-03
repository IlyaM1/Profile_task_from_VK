<?php

/**
 * Returns the neighbors of a cell in a maze.
 *
 * @param array $maze The maze structure.
 * @param array $cell The cell coordinates.
 * @return array The neighboring cells.
 */
function get_neighbors($maze, $cell)
{
    $rows = count($maze);
    $cols = count($maze[0]);
    $r = $cell[0];
    $c = $cell[1];
    $neighbors = [];
    if ($r > 0 && $maze[$r - 1][$c] !== 0) {
        $neighbors[] = [$r - 1, $c];
    }
    if ($r < $rows - 1 && $maze[$r + 1][$c] !== 0) {
        $neighbors[] = [$r + 1, $c];
    }
    if ($c > 0 && $maze[$r][$c - 1] !== 0) {
        $neighbors[] = [$r, $c - 1];
    }
    if ($c < $cols - 1 && $maze[$r][$c + 1] !== 0) {
        $neighbors[] = [$r, $c + 1];
    }
    return $neighbors;
}
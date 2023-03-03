<?php

/**
 * Solves the maze problem using Breadth-First Search (BFS) algorithm.
 *
 * @param array $maze The maze structure.
 * @param array $start The start point coordinates.
 * @param array $end The end point coordinates.
 * @return array|null The shortest path from start to end, or null if no path found.
 */
function bfs($maze, $start, $end)
{
    $queue = new SplQueue();
    $queue->enqueue([$start]);
    $visited = [$start];
    while (!$queue->isEmpty()) {
        $path = $queue->dequeue();
        $cell = end($path);
        if ($cell === $end) {
            return $path;
        }
        $neighbors = get_neighbors($maze, $cell);
        foreach ($neighbors as $neighbor) {
            if (!in_array($neighbor, $visited)) {
                $visited[] = $neighbor;
                $newPath = $path;
                $newPath[] = $neighbor;
                $queue->enqueue($newPath);
            }
        }
    }
    return null;
}
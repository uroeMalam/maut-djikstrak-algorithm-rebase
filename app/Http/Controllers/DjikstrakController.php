<?php

namespace App\Http\Controllers;

use App\Models\penilaian;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PenilaianController extends Controller
{
    public function index()
    {
        $data['penilaian'] = penilaian::all();
        return view('penilaian.index', $data);
    }
}

$INT_MAX = 0x7FFFFFFF;

function MinimumDistance($distance, $shortestPathTreeSet, $verticesCount)
{
	global $INT_MAX;
	$min = $INT_MAX;
	$minIndex = 0;

	for ($v = 0; $v < $verticesCount; ++$v)
	{
		if ($shortestPathTreeSet[$v] == false && $distance[$v] <= $min)
		{
			$min = $distance[$v];
			$minIndex = $v;
		}
	}

	return $minIndex;
}

function PrintResult($distance, $verticesCount)
{
	echo "<pre>" . "Vertex    Distance from source" . "</pre>";

	for ($i = 0; $i < $verticesCount; ++$i)
		echo "<pre>" . $i . "\t  " . $distance[$i] . "</pre>";
}

function Dijkstra($graph, $source, $verticesCount)
{
	global $INT_MAX;
	$distance = array();
	$shortestPathTreeSet = array();

	for ($i = 0; $i < $verticesCount; ++$i)
	{
		$distance[$i] = $INT_MAX;
		$shortestPathTreeSet[$i] = false;
	}

	$distance[$source] = 0;

	for ($count = 0; $count < $verticesCount - 1; ++$count)
	{
		$u = MinimumDistance($distance, $shortestPathTreeSet, $verticesCount);
		$shortestPathTreeSet[$u] = true;

		for ($v = 0; $v < $verticesCount; ++$v)
			if (!$shortestPathTreeSet[$v] && $graph[$u][$v] && $distance[$u] != $INT_MAX && $distance[$u] + $graph[$u][$v] < $distance[$v])
				$distance[$v] = $distance[$u] + $graph[$u][$v];
	}

	PrintResult($distance, $verticesCount);
}



// Example
									
// $graph = array(
// 	array(0, 4, 0, 0, 0, 0, 0, 8, 0),
// 	array(4, 0, 8, 0, 0, 0, 0, 11, 0),
// 	array(0, 8, 0, 7, 0, 4, 0, 0, 2),
// 	array(0, 0, 7, 0, 9, 14, 0, 0, 0),
// 	array(0, 0, 0, 9, 0, 10, 0, 0, 0),
// 	array(0, 0, 4, 0, 10, 0, 2, 0, 0),
// 	array(0, 0, 0, 14, 0, 2, 0, 1, 6),
// 	array(8, 11, 0, 0, 0, 0, 1, 0, 7),
// 	array(0, 0, 2, 0, 0, 0, 6, 7, 0)
// );

// Dijkstra($graph, 0, 9);



// Output
									
// Vertex    Distance from source
// 0         0
// 1         4
// 2         12
// 3         19
// 4         21
// 5         11
// 6         9
// 7         8
// 8         14
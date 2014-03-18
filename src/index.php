<?php

	header('Content-Type: application/json');

	$twine_id = "0000000aa1bbb2cc";
	$access_key = "111111a2222b3ccc333333d444ee";

	$url = "https://twine.cc/" . $twine_id . "/rt?cached=1&access_key=" . $access_key;
	$str = json_decode(file_get_contents($url));

	$update = floor(($str->age)/60);
	$temp_fahrenheit = (double) ($str->values[1][1])/100;
	$temp_celsius = round(($temp_fahrenheit-32)*5/9);

	class board{
		public $graph;
	}

	class graph{
		public $datasequences;
		public $refreshEveryNSeconds;
		public $title;
		public $type;
		public $xAxis;
		public $yAxis;
	}

	class datasequence{
		public $datapoints;
		public $title;
	}

	class datapoint{
		public $title;
		public $value;
	}

	class axis{
		public $units;
		public $hide;
	}

	class unit{
		public $suffix;
	}

	$point = new datapoint();
	$point->title = strval($update);
	$point->value = $temp_celsius;

	$sequence = new datasequence();
	$sequence->title = "temperature";
	$sequence->datapoints[] = $point;

	$tempUnit = new unit();
	$tempUnit->suffix = "C";

	$timeUnit = new unit();
	$timeUnit->suffix = "min";

	$yAxis = new axis();
	$yAxis->units = $tempUnit;
	$yAxis->hide = false;

	$xAxis = new axis();
	$xAxis->units = $timeUnit;
	$xAxis->hide = false;

	$tempGraph = new graph();
	$tempGraph->datasequences[] = $sequence;
	$tempGraph->refreshEveryNSeconds = 300;
	$tempGraph->title = "";
	$tempGraph->yAxis = $yAxis;
	$tempGraph->xAxis = $xAxis;
	$tempGraph->type = "bar";

	$tempBoard = new board();
	$tempBoard->graph = $tempGraph;



	echo json_encode($tempBoard, JSON_PRETTY_PRINT);
?>
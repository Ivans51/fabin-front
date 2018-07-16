<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class SampleChart extends Chart {
	/**
	 * Initializes the chart.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	public function chart() {
		$chart = new SampleChart;

		return view( 'cms.charts.index', compact( [ 'chart' => $chart ] ) );
	}
}

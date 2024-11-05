<?php
namespace App\Actions\StatisticsTabs;
use App\Helper\ImageHelper;
use App\Models\ProjectAboutStatistic;

class UpdateStatisticsTabsAction {
    use ImageHelper;

    public function handle( ProjectAboutStatistic $statistics, $data ) {

        $statistics->update( $data );
        $this->UpdateImage( $data, $statistics, 'statistics' );
        return $statistics;
    }
}
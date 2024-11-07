<?php
namespace App\Actions\StatisticsTabs;
use App\Helper\ImageHelper;
use App\Models\ProjectAboutStatistic;
class StoreStatisticsTabsAction {
    use ImageHelper;

    public function handle( array $data ) {
        $statistics = ProjectAboutStatistic::create( $data );
        $this->StoreImage( $data, $statistics, 'statistics' );
        return $statistics;
    }
}
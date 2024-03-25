<?php
namespace App\Actions\JoinusTabs;
use App\Helper\ImageHelper;
use App\Models\JoinusTabs;

class StoreJoinusTabsAction {
    use ImageHelper;

    public function handle( array $data ) {
        $JoinusTabs = JoinusTabs::create( $data );
        $this->StoreImage( $data, $JoinusTabs, 'JoinusTabs' );
        return $JoinusTabs;
    }
}
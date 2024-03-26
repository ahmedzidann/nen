<?php
namespace App\Actions\ProgramTabs;
use App\Helper\ImageHelper;
use App\Models\ProgramTabs;
use Illuminate\Support\Arr;

class StoreProgramTabsAction {
    use ImageHelper;

    public function handle( array $data ) {
        
        $ProgramTabs = ProgramTabs::create( $data );
        $this->StoreImage( $data, $ProgramTabs, 'firstImage' );
        $this->StoreImage2( $data, $ProgramTabs, 'pdfFile' );
        return $ProgramTabs;
    }
}
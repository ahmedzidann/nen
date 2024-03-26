<?php
namespace App\Actions\ProgramTabs;
use App\Helper\ImageHelper;
use App\Models\ProgramTabs;

class UpdateProgramTabsAction {
    use ImageHelper;

    public function handle( ProgramTabs $ProgramTabs, $data ) {

        $ProgramTabs->update( $data );
        $this->UpdateImage( $data, $ProgramTabs, 'firstImage' );
        $this->UpdateImage2( $data, $ProgramTabs, 'pdfFile' );
        return $ProgramTabs;
    }
}
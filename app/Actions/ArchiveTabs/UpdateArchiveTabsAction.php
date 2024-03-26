<?php
namespace App\Actions\ArchiveTabs;
use App\Helper\ImageHelper;
use App\Models\ProjectArchive;
use data;
use Illuminate\Support\Arr;

class UpdateArchiveTabsAction {
    use ImageHelper;

    public function handle( ProjectArchive $ArchiveTabs, $data ) {
        $ArchiveTabs->update( Arr::except( $data, [ 'image' ] ) );
        $this->UpdateImage( $data, $ArchiveTabs, 'firstFile' );
        return $ArchiveTabs;
    }
}
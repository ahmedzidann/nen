<?php

namespace App\Actions\ArchiveTabs;

use App\Helper\ImageHelper;
use App\Models\ProjectArchive;
use Illuminate\Support\Arr;

class StoreArchiveTabsAction {
    use ImageHelper;

    public function handle( array $data ) {

        foreach($data['body'] as $item){

            $ArchiveTabs = ProjectArchive::create([
                'type' => $item['type'],
                'url' => $item['url'],
                'title' => $item['title'],
                'description' => $item['description'],
                'project_id' =>$data['project_id'] ,
                'tabs_id' => $data['tabs_id'] ,
            ]);
            dd($item);
            if(!empty($item['image'])){
                $this->ArchiveImage( $item['image'], $ArchiveTabs, 'firstFile' );
            }
        }
        return $ArchiveTabs;
    }
}

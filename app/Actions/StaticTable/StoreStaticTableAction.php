<?php
namespace App\Actions\StaticTable;

use App\Helper\ImageHelper;
use App\Models\StaticTable;

class StoreStaticTableAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        $StaticTable = StaticTable::create($data);
        $this->StoreImage($data, $StaticTable, 'StaticTable');
        $this->StoreImage2($data, $StaticTable, 'StaticTable2');
        if (array_key_exists('attributes', $data)) {
            $StaticTable->identityAttributes()->createMany(array_map(fn($item)=>[
                'content'=>$item
            ],$data['attributes']));
        }
        return $StaticTable;
    }
}

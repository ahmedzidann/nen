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
        $this->StoreImage($data,$StaticTable,'StaticTable');
        $this->StoreImage2($data,$StaticTable,'StaticTable2');
        return $StaticTable;
    }
}




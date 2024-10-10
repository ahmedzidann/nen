<?php
namespace App\Actions\StaticTable;

use App\Helper\ImageHelper;
use App\Models\InvestorAttribute;
use App\Models\StaticTable;
use App\Models\Technology ;
class StoreStaticTableAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        $StaticTable = Technology::create($data);
        $this->StoreImage($data, $StaticTable, 'StaticTable');
        $this->StoreImage2($data, $StaticTable, 'StaticTable2');

        return $StaticTable;
    }
}

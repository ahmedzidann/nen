<?php
namespace App\Actions\StaticTable;

use App\Helper\ImageHelper;
use App\Models\Page;
use App\Models\StaticTable;
use Illuminate\Support\Str;

class UpdateStaticTableAction
{
    use ImageHelper;
    public function handle(StaticTable $static_table,$data)
    {
        $static_table->update($data);
        $this->UpdateImage($data,$static_table,'StaticTable');
        $this->UpdateImage2($data,$static_table,'StaticTable2');
        return $static_table;
    }
}

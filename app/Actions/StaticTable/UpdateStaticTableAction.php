<?php
namespace App\Actions\StaticTable;

use App\Helper\ImageHelper;
use App\Models\IdentityAttribute;
use App\Models\StaticTable;
use Illuminate\Support\Arr;
use App\Models\Technology ;

class UpdateStaticTableAction
{
    use ImageHelper;
    public function handle( $static_table, array $data)
    {
        if (isset($data['cat'])) {
            $data['category'] = $data['cat'];
            unset($data['cat']);
        }

        $static_table->update(Arr::except($data, ['keys', 'attributes']));
        $this->UpdateImage($data, $static_table, 'StaticTable');
        $this->UpdateImage2($data, $static_table, 'StaticTable2');
        return $static_table;
    }
}

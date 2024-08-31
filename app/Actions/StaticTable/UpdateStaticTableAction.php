<?php
namespace App\Actions\StaticTable;

use App\Helper\ImageHelper;
use App\Models\IdentityAttribute;
use App\Models\Page;
use App\Models\StaticTable;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UpdateStaticTableAction
{
    use ImageHelper;
    public function handle(StaticTable $static_table,array $data)
    {
        $static_table->update(Arr::except($data, ['keys', 'attributes']));
        $this->UpdateImage($data,$static_table,'StaticTable');
        $this->UpdateImage2($data,$static_table,'StaticTable2');
        if(array_key_exists('attributes', $data)){
            if (array_key_exists('keys', $data)) {
               foreach ($data['keys'] as $key => $value) {
                IdentityAttribute::where('id',$value)->update(['content'=>$data['attributes'][$key]]);
               }
            }
        }
        return $static_table;
    }
}

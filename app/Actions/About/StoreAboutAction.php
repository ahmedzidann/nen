<?php
namespace App\Actions\About;
use App\Models\About;
use App\Helper\ImageHelper;
use Illuminate\Support\Arr;

class StoreAboutAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        // dd($data);
        $about = About::create(Arr::except($data, ['facebook','twitter', 'instagram', 'youtube']));
        $this->storeSocial($data, $about, 'Social');
        return $about;
    }
}




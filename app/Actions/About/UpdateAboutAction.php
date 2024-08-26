<?php
namespace App\Actions\About;
use App\Models\About;
use App\Helper\ImageHelper;
use Illuminate\Support\Arr;

class UpdateAboutAction
{
    use ImageHelper;
    public function handle(About $about,$data)
    {
        $about->update(Arr::except($data, ['facebook','twitter', 'instagram', 'youtube']));
        $this->storeSocial($data, $about, 'Social');
        return $about;
    }
}

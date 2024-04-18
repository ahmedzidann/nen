<?php
namespace App\Actions\Slider;
use App\Helper\Helper;
use App\Helper\ImageHelper;
use App\Models\Slider;
use Illuminate\Support\Arr;

class UpdateSliderAction {
    use ImageHelper;

    public function handle( Slider $slider, $data ) {
        // dd( $data);
        $path ='app/public/slider/';
        $slider->update( array_merge( Arr::except( $data, [ 'image', 'icon' ] )) );

        $this->UpdateImage($data,$slider,'image');
        return $slider;
    }
}


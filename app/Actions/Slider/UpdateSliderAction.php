<?php
namespace App\Actions\Slider;
use App\Helper\Helper;
use App\Models\Slider;
use Illuminate\Support\Arr;

class UpdateSliderAction {
    use Helper;

    public function handle( Slider $slider, $data ) {
        // dd( $data);
        $path ='app/public/slider/';
        $slider->update( array_merge( Arr::except( $data, [ 'image', 'icon' ] ), [
            'image'=>( ( isset( $data[ 'image' ] )?(($this->UpdateImage($slider->image, $data[ 'image' ] ?? '', $path ) )): '' ) ),
            'icon'=>( ( isset( $data[ 'icon' ] )?( ($this->UpdateImage($slider->icon, $data[ 'icon' ] ?? '', $path ) )): '' ) ),
        ] ) );
        return $slider;
    }
}


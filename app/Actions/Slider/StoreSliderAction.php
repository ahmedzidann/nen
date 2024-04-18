<?php
namespace App\Actions\Slider;
use App\Helper\Helper;
use App\Helper\ImageHelper;
use App\Models\Slider;
use Illuminate\Support\Arr;

class StoreSliderAction {
    use ImageHelper;

    public function handle( array $data ) {

        $path ='app/public/slider/';
        $slider = Slider::create( array_merge( Arr::except( $data, [ 'image', 'icon' ] )) );
        /*
, [
            'image'=>( ( isset( $data[ 'image' ] )?( $this->StoreImage( $data[ 'image' ] ?? '', 'image' ) ): '' ) ),
            'icon'=>( ( isset( $data[ 'icon' ] )?( $this->StoreImage( $data[ 'icon' ] ?? '', $path ) ): '' ) ),
        ]
        */
        $this->StoreImage($data,$slider,'image');
        return $slider;
    }
}


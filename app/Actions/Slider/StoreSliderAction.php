<?php
namespace App\Actions\Slider;
use App\Helper\Helper;
use App\Models\Slider;
use Illuminate\Support\Arr;

class StoreSliderAction {
    use Helper;

    public function handle( array $data ) {
        // dd( $data );
        $path ='app/public/slider/';
        $slider = Slider::create( array_merge( Arr::except( $data, [ 'image', 'icon' ] ), [
            'image'=>( ( isset( $data[ 'image' ] )?( $this->StoreImage( $data[ 'image' ] ?? '', $path ) ): '' ) ),
            'icon'=>( ( isset( $data[ 'icon' ] )?( $this->StoreImage( $data[ 'icon' ] ?? '', $path ) ): '' ) ),
        ] ) );
        return $slider;
    }
}


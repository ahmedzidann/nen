<?php
namespace App\Helper;

trait ImageHelper
{

	public function StoreImage($data,$model,$nameImage){
        if (!empty($data['image'])) {
            $model->addMediaFromRequest('image')->toMediaCollection($nameImage);
        }
	}
    public function ArchiveImage( $imageData, $model, $nameImage ) {
        if ( !empty( $imageData ) ) {
            $model->addMedia( $imageData )->toMediaCollection( $nameImage );
        }
    }

	public function UpdateImage($data,$model,$nameImage){
        if (!empty($data['image'])) {
            $model->clearMediaCollection($nameImage);
            $model->addMediaFromRequest('image')->toMediaCollection($nameImage);
        }
	}

	public function StoreImage2($data2,$model2,$nameImage2){
        if (!empty($data2['image2'])) {
            $model2->addMediaFromRequest('image2')->toMediaCollection($nameImage2);
        }
	}
	public function UpdateImage2($data2,$model2,$nameImage2){
        if (!empty($data2['image2'])) {
            $model2->clearMediaCollection($nameImage2);
            $model2->addMediaFromRequest('image2')->toMediaCollection($nameImage2);
        }
	}


}

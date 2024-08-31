<?php
namespace App\Helper;

trait ImageHelper
{

    public function StoreImage($data, $model, $nameImage)
    {
        if (!empty($data['image'])) {
            $model->addMediaFromRequest('image')->toMediaCollection($nameImage);
        }
    }
    public function ArchiveImage($imageData, $model, $nameImage)
    {
        if (!empty($imageData)) {
            $model->addMedia($imageData)->toMediaCollection($nameImage);
        }
    }

    public function UpdateImage($data, $model, $nameImage)
    {
        if (!empty($data['image'])) {
            $model->clearMediaCollection($nameImage);
            $model->addMediaFromRequest('image')->toMediaCollection($nameImage);
        }
    }

    public function StoreImage2($data2, $model2, $nameImage2)
    {
        if (!empty($data2['image2'])) {
            $model2->addMediaFromRequest('image2')->toMediaCollection($nameImage2);
        }
    }
    public function UpdateImage2($data2, $model2, $nameImage2)
    {
        if (!empty($data2['image2'])) {
            $model2->clearMediaCollection($nameImage2);
            $model2->addMediaFromRequest('image2')->toMediaCollection($nameImage2);
        }
    }

    public function handleSocialMedia($data, $model, $nameImage, $isUpdate = false)
    {
        $socialPlatforms = ['facebook', 'twitter', 'instagram', 'youtube'];

        foreach ($socialPlatforms as $platform) {
            if (!empty($data[$platform])) {
                if ($isUpdate) {
                    $model->clearMediaCollection($nameImage);
                }
                $model->addMediaFromRequest($platform)->toMediaCollection($nameImage);
            }
        }
    }

// Usage for storing social media:
    public function storeSocial($data, $model, $nameImage)
    {
        $this->handleSocialMedia($data, $model, $nameImage);
    }

// Usage for updating social media:
    public function updateSocial($data, $model, $nameImage)
    {
        $this->handleSocialMedia($data, $model, $nameImage, true);
    }

}

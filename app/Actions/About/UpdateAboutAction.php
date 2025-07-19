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
        if(isset($data['image_1']))
                {
                    $image = $data['image_1'];
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/footer_iso', $fileName);
                   $data['image_1']=$fileName;  
                }

         if(isset($data['image_2']))
                {
                    $image = $data['image_2'];
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/footer_iso', $fileName);
                   $data['image_2']=$fileName;  
                }  
       if(isset($data['image_3']))
                {
                    $image = $data['image_3'];
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/footer_iso', $fileName);
                   $data['image_3']=$fileName;  
                }   
      if(isset($data['image_4']))
                {
                    $image = $data['image_4'];
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/footer_iso', $fileName);
                   $data['image_4']=$fileName;  
                }       
                
        $about->update(Arr::except($data, []));
        $this->storeSocial($data, $about, 'Social');
        return $about;
    }
}

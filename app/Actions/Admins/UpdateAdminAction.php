<?php
namespace App\Actions\Admins;

use App\Helper\ImageHelper;
use App\Models\Admin;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UpdateAdminAction
{
    use ImageHelper;
    public function handle(Admin $admin,array $data): Admin
    {
        if(!empty($data['password'])){
            $data['password'] = Hash::make($data['password']);
            $admin->update(Arr::except($data+['slug'=>Str::slug($data['name']['en']),'phone'=>$data['key'].$data['phone']], 'image'));
        }else{
            $admin->update(Arr::except($data+['slug'=>Str::slug($data['name']['en']),'phone'=>$data['key'].$data['phone']], 'password','image'));
        }
        DB::table('model_has_roles')->where('model_id',$admin->id)->delete();
        isset($data['roles'])?$admin->assignRole($data['roles']):'';
        $this->UpdateImage($data,$admin,'Admin');
        return $admin;
    }
}

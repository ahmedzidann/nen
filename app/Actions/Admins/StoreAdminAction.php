<?php
namespace App\Actions\Admins;

use App\Helper\ImageHelper;
use App\Models\Admin;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StoreAdminAction
{

    use ImageHelper;
    public function handle(array $data): Admin
    {

        $data['password'] = Hash::make($data['password']);
        $admin = Admin::create((Arr::except($data+['slug'=>Str::slug($data['name']['en']),'phone'=>Str::slug($data['key'].$data['phone'])], 'image')));
        isset($data['roles'])?$admin->assignRole($data['roles']):'';
        $this->StoreImage($data,$admin,'Admin');
        return $admin;
    }
}




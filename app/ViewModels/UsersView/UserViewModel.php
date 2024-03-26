<?php
namespace App\ViewModels\UsersView;
use App\Models\TranslationKey;
use App\Models\User;
use Spatie\ViewModels\ViewModel;

class UserViewModel extends ViewModel
{
    public  $user;
    public  $type;
    public  $roles;
    public  $translation;
// -------name country--------
    public $nameView;
    public $IndexView;
    public $CreateView;
    public $RouteIndex;
    public $RouteCreate;
    public $RouteEdit;
    public $RouteDestroy;
// -------name country--------

    public function __construct($user = null)
    {
        // -------name country--------
        $this->nameView='Users';
        $this->IndexView='Index Users';
        $this->CreateView='Create Users';
        $this->RouteIndex=route('admin.users.index');
        $this->RouteCreate=route('admin.users.create');
        $this->RouteEdit='admin.users.edit';
        $this->RouteDestroy='admin.users.destroy';
        // -------name country--------
        
        $this->user = is_null($user) ? new User(old()) : $user;
        $this->type = is_null($user)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
    }

    public function action(): string
    {
        return is_null($this->user->id)
            ? route('admin.users.store')
            : route('admin.users.update', $this->user->id);
    }

    public function method(): string
    {
        return is_null($this->user->id) ? 'POST' : 'PUT';
    }
}

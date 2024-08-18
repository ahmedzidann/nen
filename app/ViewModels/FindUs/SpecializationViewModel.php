<?php
namespace App\ViewModels\FindUs;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Country;
use App\Models\Level;
use App\Models\Specialization;
use App\Models\TranslationKey;
use Spatie\Permission\Models\Role;
use Spatie\ViewModels\ViewModel;

class SpecializationViewModel extends ViewModel
{
    public  $admin;
    public  $type;
    public  $categories;
    public  $AdminRole;
    public  $translation;
    public  $routeCreate;
    public  $viewTable;
    public  $routeView;

    public function __construct($admin = null)
    {
        $this->admin = is_null($admin) ? new Specialization(old()) : $admin;
        $this->type = is_null($admin)?'Create':'Edit' ;
        $this->categories = Category::all();
        $this->translation = TranslationKey::get();
        // $this->AdminRole = is_null($admin) ? new Country(old()) : $admin->roles->pluck('name','name')->first();
        $this->routeCreate = route('admin.specializations.create');
        $this->routeView = route('admin.specializations.index');
        $this->viewTable = 'specializations';
    }

    public function action(): string
    {
        return is_null($this->admin->id)
            ? route('admin.specializations.store')
            : route('admin.specializations.update', $this->admin->id);
    }

    public function method(): string
    {
        return is_null($this->admin->id) ? 'POST' : 'PUT';
    }
}

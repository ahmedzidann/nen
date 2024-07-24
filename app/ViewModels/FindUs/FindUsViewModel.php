<?php
namespace App\ViewModels\FindUs;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Country;
use App\Models\FindUs;
use App\Models\Level;
use App\Models\Page;
use App\Models\Specialization;
use App\Models\State;
use App\Models\TranslationKey;
use Spatie\Permission\Models\Role;
use Spatie\ViewModels\ViewModel;

class FindUsViewModel extends ViewModel
{
    public  $admin;
    public  $type;
    public  $pages;
    public  $countries;
    public  $states;
    public  $categories;
    public  $levels;
    public  $certificates;
    public  $specs;
    public  $AdminRole;
    public  $translation;
    public  $routeCreate;
    public  $viewTable;
    public  $routeView;

    public function __construct($admin = null)
    {

        $this->admin = is_null($admin) ? new FindUs(old()) : $admin;
        $this->type = is_null($admin)?'Create':'Edit' ;
        $this->countries = Country::get();
        $this->states = State::get();
        $this->pages = Page::where('parent_id',10)->get();
        $this->categories = Category::all();
        $this->levels = Level::all();
        $this->certificates = Certificate::all();
        $this->specs = Specialization::all();
        $this->translation = TranslationKey::get();
        // $this->AdminRole = is_null($admin) ? new Country(old()) : $admin->roles->pluck('name','name')->first();
        $this->routeCreate = route('admin.find-us.create');
        $this->routeView = route('admin.find-us.index');
        $this->viewTable = 'find-us';
    }

    public function action(): string
    {
        return is_null($this->admin->id)
            ? route('admin.find-us.store')
            : route('admin.find-us.update', $this->admin->id);
    }

    public function method(): string
    {
        return is_null($this->admin->id) ? 'POST' : 'PUT';
    }
}

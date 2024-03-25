<?php
namespace App\Http\Controllers\Admin\profile;

use App\Actions\Cars\StoreCarAction;
use App\Actions\Cars\UpdateCarAction;
use App\Actions\Location\City\StoreCityAction;
use App\Actions\Location\City\UpdateCityAction;
use App\Actions\Users\StoreUsersAction;
use App\Actions\Users\UpdateUsersAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\StoreUserRequest;
use App\Http\Requests\Admin\Users\UpdateUserRequest;
use App\Http\Requests\Cars\StoreCarRequest;
use App\Http\Requests\Cars\UpdateCarRequest;
use App\Http\Requests\Location\City\StoreCityRequest;
use App\Http\Requests\Location\City\UpdateCityRequest;
use App\Models\Cars;
use App\Models\City;
use App\Models\User;
use App\ViewModels\CarsView\CarViewModel;
use App\ViewModels\UsersView\UserViewModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class UsersController extends Controller
{
    protected $nameViewCrud;
    protected $messageStore;
    protected $messageUpdate;
    protected $messageDelete;
    protected $route;
    protected $Model;
    protected $StoreAction;
    protected $UpdateAction;

    public function __construct(User $user){
        $this->Model=$user;
        $this->messageStore='Success Add User';
        $this->messageUpdate='Update User';
        $this->messageDelete='Success  Delete User';
        $this->route='admin.users.index';
        $this->nameViewCrud='admin.users';
        $this->StoreAction=StoreUsersAction::class;
        $this->UpdateAction=UpdateUsersAction::class;
    }

    public function ViewModel($data=null): UserViewModel
    {
       $ViewMode = new UserViewModel($data);
       return $ViewMode;
    }

    public function index():View
    {
        $data = $this->Model::Search();
        return view($this->nameViewCrud.'.view',$this->ViewModel(),compact('data'));
    }
    public function create():View
    {
        return view($this->nameViewCrud.'.crud',$this->ViewModel());
    }
    public function store(StoreUserRequest $request):RedirectResponse
    {
        app($this->StoreAction)->handle($request->validated());
        return redirect()->route($this->route)->with('add',$this->messageStore);
    }
    public function edit($slug):View
    {
        $data = $this->Model::where('slug',$slug)->first();
        return view($this->nameViewCrud.'.crud',$this->ViewModel($data));
    }
    public function update(UpdateUserRequest $request, $id):RedirectResponse
    {
        $data = $this->Model::find($id);
        app($this->UpdateAction)->handle($data,$request->validated());
        return redirect()->route($this->route)->with('edit',$this->messageUpdate);
    }
    public function destroy($id):RedirectResponse
    {
        $data = $this->Model::find($id);
        $data->delete();
        return redirect()->route($this->route)->with('delete',$this->messageDelete);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Setting\UpdateSettingAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\UpdateSettingRequest;
use App\Models\Setting;
use App\ViewModels\SettingView\SettingViewModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    
    protected $nameViewCrud;
    protected $messageUpdate;
    protected $messageDelete;
    protected $route;
    protected $Model;
    protected $UpdateAction;

    public function __construct(Setting $Setting){
        $this->Model=$Setting;
        $this->messageUpdate='Update Setting';
        $this->messageDelete='Success  Delete Setting';
        $this->route='admin.settings.index';
        $this->nameViewCrud='admin.setting';
        $this->UpdateAction=UpdateSettingAction::class;
    }

    public function ViewModel($data=null): SettingViewModel
    {
       $ViewMode = new SettingViewModel($data);
       return $ViewMode;
    }

    public function index():View
    {
        $data  = $this->Model::Search();
        $image = Setting::where('key','LogoWhite')->orWhere('key','LogoBlack')->get();
        return view($this->nameViewCrud.'.view',$this->ViewModel(),compact('data','image'));
    }
    
    public function edit($id):View
    {   

        $data = $this->Model::findOrFail($id);
        if($id == '13' || $id == '14'){
            return view($data->key != ('LogoWhite' || 'LogoBlack') ? $this->nameViewCrud.'.crud':$this->nameViewCrud.'.edit-image',$this->ViewModel($data));
        }
        return view($this->nameViewCrud.'.crud',$this->ViewModel($data));
        
        // $data = $this->Model::findOrFail($id);
    }
    public function update(UpdateSettingRequest $request, $id):RedirectResponse
    {
        $data = $this->Model::findOrFail($id);
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

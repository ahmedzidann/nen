<?php
namespace App\ViewModels\ProjectView\Tabs\JoinusTabs;

use App\Models\JoinusTabs;
use App\Models\Tabs;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class JoinusTabsViewModel extends ViewModel
{
    public $StaticTable;
    public $type;
    public $translation;
    public $translationFirst;
    public $routeCreate;
    public $viewTable;
    public $routeView;
    public $allPage;
    public $allTabs;
    public $tabs;
    public $check;
    public $action;
    public $method;

    public function __construct($action = null, $method = null, $StaticTable = null)
    {
        $this->StaticTable = is_null($StaticTable) ? new JoinusTabs(old()) : $StaticTable;
        $this->type = empty($StaticTable) ? 'Create' : 'Edit';
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.tabproject.joinus.create', Request()->query());
        $this->routeView = route('admin.tabproject.joinus.index', Request()->query());
        $this->viewTable = 'joinus';
        $this->allTabs = Tabs::get();
        if (request('tab') == 'join-us') {
            $this->check = JoinusTabs::where('project_id', request('project_id') ?? 0)->exists();
        }
        $this->tabs = Tabs::where('slug', request('tab') ?? '')->first();
        $this->action = $action;
        $this->method = $method;
    }

    public function action(): string|null
    {
        return $this->action;
    }

    public function method(): string|null
    {
        return $this->method;
    }
}

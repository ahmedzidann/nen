<?php
namespace App\Http\Controllers\User\AboutUs;
use App\Actions\StaticTable\StoreStaticTableAction;
use App\Actions\StaticTable\UpdateStaticTableAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\IdentityRequest;
use App\Models\Page;
use App\Models\StaticTable;
use App\ViewModels\AboutView\IdentityTableViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AboutController extends Controller
{
    public function identity():View
    {
        return view('user.about.identity');
    }

    public function award():View
    {
        return view('user.about.award');
    }

    public function certificates():View
    {
        return view('user.about.certificates');
    }

    public function partners():View
    {
        return view('user.about.partners');
    }
}

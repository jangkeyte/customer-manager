<?php

namespace Modules\TreeManager\src\Exports;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Modules\TreeManager\src\Models\User;
use Modules\TreeManager\src\Filters\TreeFilter;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{
    //private $id;
    private $request;

    public function __construct(Request $request=null) {
    	$this->request = $request;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        if(isset($this->request)){
            $users = User::filter(new TreeFilter($this->request))->get();
        } else {
            $users = User::all();
        }

        return view('Authetication::user.export', [
            'users' => $users
        ]);
    }

}

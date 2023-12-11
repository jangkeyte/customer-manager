<?php

namespace Modules\Customer\src\Http\Controllers;

use Modules\Customer\src\Imports\CareLogsImport;
use Modules\Customer\src\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CareLogController extends Controller
{
    public function import() 
    {
        (new UsersImport)->queue('carelogs.xlsx')->chain([
            new NotifyUserOfCompletedImport(request()->carelog()),
        ]);

        return redirect('/')->with('success', 'All good!');
    }

}

<?php

namespace Modules\Carelog\src\Http\Controllers\Carelog;

use Modules\Carelog\src\Imports\CarelogsImport;
use Modules\Carelog\src\Repositories\Carelog\CarelogRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportCarelogController extends Controller
{
    /**
     * @var CarelogRepositoryInterface
     */
    private $carelogRepository;

    /**
     * CarelogController constructor.
     * 
     * @param CarelogRepositoryInterface $carelogRepository
     */
    public function __construct(CarelogRepositoryInterface $carelogRepository)
    {
        $this->carelogRepository = $carelogRepository;
    }

    /**
     * Display the import view.
     */
    public function create(){
        if (view()->exists('Carelog::carelog.carelog-import')) {
            return view('Carelog::carelog.carelog-import');
        }
    }
    
    public function store(Request $request) 
    {
        $result = $this->carelogRepository->import($request);
        //dd($import->errors()[0]);
        return redirect()->back()->with('message', $result);
    }

}

<?php

namespace Modules\Customer\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use Modules\Customer\src\Models\Tree;
use Modules\Customer\src\Repositories\RepositoryInterface;
use Modules\Customer\src\Repositories\Tree\TreeRepositoryInterface;

class BaseController extends Controller
{
    /**
     * @var RepositoryInterface
     */
    protected $repository;
    protected $treeRepository;
    protected $target;
    protected $name;

    /**
     * BaseController constructor.
     *
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository, TreeRepositoryInterface $treeRepository)
    {
        $this->repository = $repository;
        $this->treeRepository = $treeRepository;
    }

    /**
     * Display the dashboard view.
     */
    public function create(): View
    {
        $data = $this->repository->all();
        return view('Customer::common.home', [
            'target' => $this->target,
            'name' => $this->name,
            'data' => $data,
        ]);
    }

    /**
     * Display the detail view.
     */
    public function destroy($id): RedirectResponse
    {
        if($this->repository->delete($id) > 0){
            $this->treeRepository->updateTrees($this->target, $id, $this->target, 0);
            $message = 'Xóa ' . $this->name . ' thành công!!!';
        } else {
            $message = 'Xóa ' . $this->name . ' thất bại.';
        }

        return redirect()->route($this->target . '.index')->with('message', $message);
    }

}

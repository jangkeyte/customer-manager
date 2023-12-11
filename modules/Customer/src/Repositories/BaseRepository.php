<?php

namespace Modules\Customer\src\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 *
 * @package Modules\Customer\src\Repositories
 */
class BaseRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
    
    /**
     * @inheritdoc
     */
    public function findById(int $id)
    {
        return $this->model->where('id', $id)->first();
    }
    
    // Lấy thông tin Khách hàng theo Mã Khách hàng
    public function getCustomerByID($id=0)
    {
        return $this->model->where('ma_khach_hang', $id)->first();
    }

    /**
     * @inheritdoc
     */
    public function getList($col1, $col2)
    {
        return array('0' => 'Tất cả')->push($this->model->pluck($col1, $col2));
    }
    
    /**
     * @inheritdoc
     */
    public function getListWithCount($col1, $col2)
    {
        return array('0' => 'Tất cả')->push($this->model->pluck($col1, $col2));
    }
    
}
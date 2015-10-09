<?php

namespace App\Models\Eloquents;

use App\Models\Repositories\RepositoryInterface;

/**
 * Description of Crud
 *
 * @author Risza
 */
abstract class Crud implements RepositoryInterface
{

    protected $model;

    public function all($columns = array('*'))
    {
        return $this->model->all($columns);
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    public function findBy($attribute, $value, $operand = '=', $columns = array('*'))
    {
        return $this->model->where($attribute, $operand, $value)->first($columns);
    }

    public function create($input)
    {
        return $this->model->create($input);
    }

    public function update($id, $input)
    {
        $model = $this->find($id);
        
        if ($model) {
            return $model->update($input);
        }

        return false;
    }

    public function destroy($id)
    {
        $model = $this->find($id);
        if ($model) {
            return $model->delete();
        }

        return false;
    }
}

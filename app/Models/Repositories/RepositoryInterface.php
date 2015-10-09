<?php
namespace App\Models\Repositories;

/**
 *
 * @author risza
 */
interface RepositoryInterface
{
    /**
     * 
     * @param Request $input
     * @return mixed
     */
    public function create($input);
    
    /**
     * 
     * @param int $id
     * @param Request $input
     * @return mixed
     */
    public function update($id, $input);
    
    /**
     * 
     * @param int $id
     * @return mixed
     */
    public function destroy($id);
    
    /**
     * 
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'));
    
    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*'));
    
    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'));
    
    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $operand = '=', $columns = array('*'));
}

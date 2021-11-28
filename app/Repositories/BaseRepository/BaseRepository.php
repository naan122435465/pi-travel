<?php

namespace App\Repositories\BaseRepository;

use App\Repositories\RepositoryInterfaces\BaseInterface;

use function GuzzleHttp\Promise\all;

abstract class BaseRepository implements BaseInterface {

    protected $model;
     /*   BaseRepository contructor */
    public function __construct()
    {
        $this->setModel();
    }
     /**
     * Returns the current Model instance
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }
    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }
      /**
     * Retrieve all data of repository
     *
     * @return mixed
     */
    public function getAll()
    {
        $result = $this->model->all();
        return $result;
    }
    /**
     * Get a entity in repository by id 
     *
     * @param       $id
     *
     * @return mixed
     */
    public function getById($id)
    {
        $result = $this->model->find($id);
        return $result;
    }
     /**
     * Save a  new entity in repository
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes)->id;
    }
    /**
     * Update a entity in repository by id
     *
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     */
    public function update(array  $attributes ,$id)
    {
        $result = $this->model->find($id);
        if($result){
            $result->update($attributes);
            return $result;
        }
        return false;
    }
     /**
     * Delete a entity in repository by id
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        $result = $this->model->find($id);
        if($result){
            $result->delete();
            return true;
        }
        return false;
    }

    public function findByField($field, $value)
    {
        $result = $this->model->where($field , $value)->get();
        return $result;
    }

}

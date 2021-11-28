<?php

namespace App\Repositories\RepositoryInterfaces;

interface BaseInterface {
     /**
     * Retrieve all data of repository
     *
     * @return mixed
     */
    public function getAll();
    /**
     * Get a entity in repository by id 
     *
     * @param       $id
     *
     * @return mixed
     */
    public function getById($id);
     /**
     * Save a  new entity in repository
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes);
    /**
     * Update a entity in repository by id
     *
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     */
    public function update( array  $attributes, $id );
     /**
     * Delete a entity in repository by id
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id);

     /**
     * Find data by field and value
     *
     * @param       $field
     * @param       $value
     *
     * @return mixed
     */
    public function findByField($field, $value);

}

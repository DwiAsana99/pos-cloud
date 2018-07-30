<?php

namespace App\Repositories;

abstract class Repository
{
    protected $model;
    
    public function all($columns = array('*')) {
        return $this->model->select($columns);
    }
    
    public function create(array $data) {
        return $this->model->create($data);
    }
 
    public function update(array $data, $id, $attribute="id") {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    public function delete($id) {
        return $this->model->destroy($id);
    }
 
    public function find($id, $columns = array('*')) {
        return $this->model->find($id, $columns);
    }

    public function findBy($attribute, $value, $columns = array('*')) {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }
}
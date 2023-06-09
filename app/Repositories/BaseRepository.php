<?php

namespace App\Repositories;
use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;
    protected Application $app;

    /**
     * @param $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract public  function model():string;

    public function  makeModel(): void {
        $model = $this->app->make($this->model());

        if(! $model instanceof  Model) {
            throw new Exception("class {$this->model()} must be instance of eloquent model");
        }
        $this->model = $model;
    }


    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->find($id);

        return $record->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }


}

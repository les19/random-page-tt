<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 *  BaseService
 */
abstract class BaseService
{
    protected Model $model;

    public function __construct(Model $model = null)
    {
        if (is_null($model)) {
            $this->model = app($this->modelName());
        } else {
            $this->model = $model;
        }
    }

    abstract public function modelName(): string;

    public function findOrFail($id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function getByColumn(string $column, mixed $value, array $relations = [], int $paginate = 0): Collection
    {
        $query = $this->model->with($relations)->where($column, $value);

        if ($paginate !== 0) {
            return $query->paginate($paginate);
        }

        return $query->get();
    }
}

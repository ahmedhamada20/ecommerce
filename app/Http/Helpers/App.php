<?php

if (!function_exists('queryModels')) {
    function queryModels($modelName, $conditions = [], $pagination = null, $withRelations = [])
    {
        $modelClass = "App\\Models\\" . $modelName;

        if (!class_exists($modelClass)) {
            throw new Exception("Error: Model class '{$modelName}' not found.");
        }

        $model = new $modelClass;

        if (!method_exists($model, 'newQuery')) {
            throw new Exception("Error: Model '{$modelName}' does not support querying.");
        }

        $queryBuilder = $model->newQuery();

        if (!empty($withRelations)) {
            $queryBuilder->with($withRelations);
        }

        if(!is_null($conditions)){
            foreach ($conditions as $field => $value) {
                if (is_array($value)) {
                    $queryBuilder->where($field, $value[0], $value[1]);
                } else {
                    $queryBuilder->where($field, $value);
                }
            }
        }



        if ($pagination && is_array($pagination)) {
            $perPage = $pagination['perPage'] ?? 15;
            $page = $pagination['page'] ?? 1;
            return $queryBuilder->paginate($perPage, ['*'], 'page', $page);
        }

        return $queryBuilder->get();
    }
}

if (!function_exists('get_models')){
    function get_models($models)
    {
        $modelClass = "App\\Models\\" . $models;
        if (!$modelClass){
            throw new Exception("Error: Model class '{$models}' not found.");
        }
    }
}


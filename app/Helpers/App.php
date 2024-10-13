<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;


if (!function_exists('QueryModelsAll')) {
    function QueryModelsAll($models){

        $data =  "App\\Models\\".$models;
        if(!class_exists($data)){
            throw new ModelNotFoundException("Model \"$models\" not found.");
        }
        return $data::orderByDESC('id')->get();
    }
}

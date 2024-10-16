<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;


if (!function_exists('QueryModelsAll')) {
    function QueryModelsAll($models){

        $data =  "App\\Models\\".$models;
        if(!class_exists($data)){
            throw new ModelNotFoundException("Model \"$models\" not found.");
        }
        return $data::orderByDESC('id');
    }
}

if (!function_exists('alert_quantity')) {
    function alert_quantity($numbers){
        if ($numbers < 1) {
            return '<span class="badge bg-danger">غير متوافر</span>';
        } elseif ($numbers >= 1 && $numbers <=   3) {
            return '<span class="badge bg-warning">لقد قرب المنتج على الانتهاء</span>';
        } else {
            return '<span class="badge bg-success">' . $numbers . ' متوفر</span>';
        }
    }
}


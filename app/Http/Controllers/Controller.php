<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Updates the model based on if the data exists
     * 
     * @param Illuminate\Database\Eloquent\Model $model
     */
    protected function updateModel($model, array $data, array $except = []) {
        foreach ($data as $key => $value) {
            if (!in_array($key, $except) && isset($model->$key)) {
                $model->$key = $value ?? $model->$key;
            }
        }
    }
}

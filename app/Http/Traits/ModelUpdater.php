<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;

trait ModelUpdater 
{
    /**
     * Updates the model based on if the data exists
     */
    public function updateModel(Model $model, array $data, array $except = []) {
        $attributes = array_keys($model->getAttributes());

        foreach ($data as $key => $value) {
            if (!in_array($key, $except) && in_array($key, $attributes) && $model->$key !== $value) {
                $model->$key = $value ?? $model->$key;
            }
        }
    }
}
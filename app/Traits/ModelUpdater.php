<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait ModelUpdater
{
    /**
     * Updates the model based on if the data exists
     * 
     * @param array<string, mixed> $data
     * @param array<string> $except
     * @return void
     */
    public function updateModel(Model $model, array $data, array $except = []): void
    {
        $attributes = array_keys($model->getAttributes());

        foreach ($data as $key => $value) {
            if (! in_array($key, $except) && in_array($key, $attributes) && $value !== $model->$key) {
                $model->$key = $value ?? $model->$key;
            }
        }
    }
}

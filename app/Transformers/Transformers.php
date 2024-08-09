<?php

namespace App\Transformers;

class Transformers
{
    public function transform_diseases($diseases)
    {
        return [
            'id' => $diseases->id,
            'disease' => $diseases->disease_name,
        ];
    }

    public function transform_symptoms($symptoms)
    {
        return [
            'id' => $symptoms->id,
            'disease' => $symptoms->symptom_name,
        ];
    }
}
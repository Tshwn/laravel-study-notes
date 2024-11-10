<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';
    public function getData() {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }
}
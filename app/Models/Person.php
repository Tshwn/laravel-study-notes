<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder; //253ページで追加
use App\Scopes\ScopePerson; //255ページで追加

class Person extends Model
{
    protected $table = 'people';

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150',
    );
    public function getData() {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }

    public function scopeNameEqual($query, $str) {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $n) {
        return $query->where('age','>=', $n);
    }

    public function scopeAgeLessThan($query, $n) {
        return $query->where('age','<=', $n);
    }
}
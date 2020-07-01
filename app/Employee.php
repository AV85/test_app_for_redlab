<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'patronymic', 'sex', 'salary'];

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }
}

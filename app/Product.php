<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // obrigatorio esse padrão tabela no plural, primarykey id, timestamps
    // public $tableName = "products";
    // public $primaryKey = "id";
    // public $timestamps = false;

    public function users(){
        return $this->belongsTo('App\User');
    }
}

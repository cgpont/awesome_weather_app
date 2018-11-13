<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

  protected $table = 'city';

  protected $fillable = ['name', 'temperature', 'created_at', 'updated_at'];

  public function __construct($attributes = array())
  {
    parent::__construct($attributes); // Calls Default Constructor
    $this->name = $attributes['name'];
    $this->temperature = $attributes['temperature'];
  }

}

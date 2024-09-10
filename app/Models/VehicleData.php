<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Define fillable attributes in the model
class VehicleData extends Model
{
  protected $connection = 'sarvisolution_app';
  protected $table = 'vehicle_data';

  protected $fillable = [
      'user_id',
      'user_name',
      'vehicle_name',
      'vehicle_number',
      'updated_at',
      'created_at'
  ];

  public $timestamps = false; // // Disables automatic management of timestamps

    // Manually handle creation and updates
    protected $attributes = [
      'created_at' => 0, // Default value for created_at
      'updated_at' => 0, // Default value for updated_at
  ];

}
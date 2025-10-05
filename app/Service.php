<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $job_no
 * @property string $service_category
 * @property int $customer_id
 * @property int $vehicle_id
 * @property int|null $is_appove
 * @property int $done_status
 * @property string $service_date
 * @property string $kms_run
 * @property string $car_detail
 * @property string $markers
 */

class Service extends Model
{
    //For 
    protected $table = 'tbl_services';
    
    protected $fillable = [
        'job_no', 'service_category', 'customer_id', 'receiver_name', 'vehicle_id', 
        'is_appove', 'done_status', 'service_date', 'kms_run', 'car_detail', 'markers', 'notepad'
    ];

    public function notes()
    {
        return $this->morphMany(Notes::class, 'entity', 'entity_type', 'entity_id');
    }
}

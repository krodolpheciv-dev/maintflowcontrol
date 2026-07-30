<?php

namespace App\Models\Incident;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentSubTypeModel extends Model
{
     use HasFactory;

    protected $table = 'incident_sub_types';
    protected $primaryKey ='id';

    protected $fillable = [
        'incident_type_id',
        'libellesoustype',
        'description',
        'status',
        'created_by'
    ];

    public function incidentType()
    {
        return $this->belongsTo(IncidentType::class);
    }

}

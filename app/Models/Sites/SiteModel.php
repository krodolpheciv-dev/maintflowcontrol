<?php

namespace App\Models\Sites;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Incident\IncidentSubTypeModel;
use App\Models\Incident\IncidentTypeModel;
use App\Models\Project;
use App\Models\requeteCm\CmRequestModel;
use App\Models\User;

class SiteModel extends Model
{
    use HasFactory;

    protected $table = 'sites';

    protected $fillable = [
        'project_id',
        'site_code',
        'site_name',
        'region',
        'ville',
        'commune',
        'typologie',
        'zone',
        'latitude',
        'longitude',
        'status'
    ];

    protected $casts = [
        'status'    => 'boolean',
        'latitude'  => 'float',
        'longitude' => 'float',
    ];

    /*************************************************************
     *
     * RELATIONS
     *
     *************************************************************/

    /**
     * Projet auquel appartient le site
     */
    public function project()
    {
        return $this->belongsTo(
            Project::class,
            'project_id',
            'id'
        );
    }

    /**
     * Requêtes CM du site
     */
    public function cmRequests()
    {
        return $this->hasMany(
            CmRequestModel::class,
            'site_id',
            'id'
        );
    }
}

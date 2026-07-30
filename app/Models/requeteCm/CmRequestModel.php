<?php

namespace App\Models\requeteCm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Incident\IncidentSubTypeModel;
use App\Models\Incident\IncidentTypeModel;
use App\Models\Project;
use App\Models\Sites\SiteModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmRequestModel extends Model
{
     use SoftDeletes;

    protected $table = 'cm_requests';

    protected $fillable = [

        'ticket',

        'project_id',

        'site_id',

        'incident_type_id',

        'incident_sub_type_id',

        'priority',

        'impact',

        'description',

        'attachment',

        'created_by',

        'assigned_to',

        'status',

        'assigned_at',

        'started_at',

        'completed_at'

    ];

    protected $casts = [

        'assigned_at'  => 'datetime',

        'started_at'   => 'datetime',

        'completed_at' => 'datetime'

    ];

    /*************************************************************
     *
     * RELATIONS
     *
     *************************************************************/

    /**
     * Projet
     */
    public function project()
    {
        return $this->belongsTo(
            Project::class,
            'project_id'
        );
    }

    /**
     * Site
     */
    public function site()
    {
        return $this->belongsTo(
            SiteModel::class,
            'site_id'
        );
    }

    /**
     * Type d'incident
     */
    public function incidentType()
    {
        return $this->belongsTo(
            IncidentTypeModel::class,
            'incident_type_id'
        );
    }

    /**
     * Sous-type d'incident
     */
    public function incidentSubType()
    {
        return $this->belongsTo(
            IncidentSubTypeModel::class,
            'incident_sub_type_id'
        );
    }

    /**
     * Créateur de la requête
     */
    public function creator()
    {
        return $this->belongsTo(
            User::class,
            'created_by'
        );
    }

    /**
     * Technicien affecté
     */
    public function assignedTo()
    {
        return $this->belongsTo(
            User::class,
            'assigned_to'
        );
    }
}

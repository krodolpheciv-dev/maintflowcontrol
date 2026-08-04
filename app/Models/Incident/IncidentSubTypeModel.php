<?php

namespace App\Models\Incident;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class IncidentSubTypeModel extends Model
{
    use HasFactory;

    protected $table = 'incident_sub_types';
    protected $primaryKey = 'id';

    protected $fillable = [
        'incident_type_id',
        'libellesoustype',
        'description',
        'status',
        'created_by'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Relation avec le type d'incident
     */
    public function incidentType()
    {
        return $this->belongsTo(IncidentTypeModel::class, 'incident_type_id');
    }

    /**
     * Utilisateur ayant créé le sous-type
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scope pour les sous-types actifs
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
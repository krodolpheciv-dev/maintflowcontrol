<?php

namespace App\Models\Incident;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentTypeModel extends Model
{
   use HasFactory;

    protected $table = 'incident_types';
    protected $primaryKey ='id';

    protected $fillable = [
        'libelletypeincident',
        'description',
        'status',
        'created_by'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Sous-types d'incidents
     */
    public function subTypes()
    {
        return $this->hasMany(IncidentSubType::class, 'incident_type_id');
    }

    /**
     * Utilisateur ayant créé le type
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

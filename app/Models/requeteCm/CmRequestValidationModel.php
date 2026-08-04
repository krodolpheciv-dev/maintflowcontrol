<?php

namespace App\Models\requeteCm;

use App\Models\User;
use App\Models\requeteCm\CmRequestModel;
use Illuminate\Database\Eloquent\Model;

class CmRequestValidationModel extends Model
{
    protected $table = 'cm_request_validations';

    public $timestamps = false;

    protected $fillable = [
        'cm_request_id',

        // Snapshot de la requête
        'ticket',
        'project_id',
        'project_name',
        'site_id',
        'site_code',
        'incident_type_id',
        'incident_type_libelle',
        'incident_sub_type_id',
        'incident_sub_type_libelle',
        'priority',
        'impact',
        'description',
        'attachment',
        'created_by',
        'created_by_name',
        'assigned_to',
        'assigned_to_name',
        'request_status',
        'request_created_at',
        'validation_decision',  
        'comment',

        // Validateur
        'validated_by',
        'validated_by_name',
        'validated_by_email',

        'created_at',
    ];

    protected $casts = [
        'request_created_at' => 'datetime',
        'created_at'          => 'datetime',
    ];

    // Relations
    public function cmRequest()
    {
        return $this->belongsTo(CmRequestModel::class, 'cm_request_id');
    }

    public function validator()
    {
        return $this->belongsTo(User::class, 'validated_by');
    }

    
    public function getValidationDecisionLabelAttribute()
    {
        return $this->validation_decision === 'validee' ? '✅ Validée' : '❌ Refusée';
    }

    public function getValidationDecisionBadgeAttribute()
    {
        if ($this->validation_decision === 'validee') {
            return '<span class="badge bg-success">Validée</span>';
        }
        return '<span class="badge bg-danger">Refusée</span>';
    }

    // Scope pour filtrer
    public function scopeValidee($query)
    {
        return $query->where('validation_decision', 'validee');
    }

    public function scopeRefusee($query)
    {
        return $query->where('validation_decision', 'refusee');
    }
}
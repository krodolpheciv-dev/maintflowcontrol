<?php

namespace App\Models;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Mail\ProjectExpiredMail;
use Carbon\Carbon;
use App\Models\User;

class Project extends Model
{
    use SoftDeletes;
    use HasFactory;

      protected $fillable = [
        'nom_projet',
        'date_debut',
        'date_fin',
        'contrat',
        'is_active'
    ];

    protected static function boot()
    {
        parent::boot();

       static::saving(function ($project) {

        if ($project->date_fin) {

            if (Carbon::parse($project->date_fin)->lt(Carbon::today())) {

                $project->is_active = false;

            } else {
                $project->is_active = true;
            }
        }
    });

    static::updated(function ($project) {

        if (!$project->is_active && $project->wasChanged('is_active')) {

           /* Mail::to('admin@monsite.com')
                ->send(new ProjectExpiredMail($project));*/
        }
    });

    }

    public function users()
{
    return $this->belongsToMany(User::class)
                ->withPivot('role_id')
                ->withTimestamps();
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'intro_text',
        'outro_text',
        'is_template',
        'opened_at',
        'closed_at',
    ];

    protected $casts = [
        'opened_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function organisation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Organisation::class);
    }

    public function contacts(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Contact::class, 'invitations')
            // ->as('invitation')
            ->withPivot('invited_at');
    }

    // public function inviteContacts($contacts, $invitedAt = null): void
    // {
    //     if( ! $invitedAt) {
    //         $invitedAt = now();
        // }
    //     $this->contacts()->attach($contacts);
    // }

    
}

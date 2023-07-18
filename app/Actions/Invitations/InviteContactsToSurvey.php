<?php

namespace App\Actions\Invitations;

use App\Models\Survey;
use Carbon\Carbon;

class InviteContactsToSurvey
{
    public function handle(Survey $survey, mixed $contactIds, ?Carbon $invitedAt = null): void
    {
        $survey->contacts()->syncWithPivotValues(
            is_array($contactIds) ? $contactIds : [$contactIds],
            ['invited_at' => $invitedAt ?: now(),]
        );
    }
}
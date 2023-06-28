<?php

use App\Models\Survey;
use App\Models\Organisation;

test('can create survey', function () {
    $s = Survey::factory()->create([
        'name' => 'My Survey',
        'description' => 'My Survey Description',
        'organisation_id' => Organisation::factory()->create()->id,
    ]);
    $survey = Survey::firstOrFail();
    expect($survey->name)->toBe($s->name);
    expect($survey->description)->toBe($s->description);
});
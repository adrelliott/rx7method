<?php

use App\Actions\Invitations\InviteContactsToSurvey;
use App\Models\Survey;
use App\Models\Contact;
use App\Models\Organisation;

beforeEach(function() {
    $this->organisation = Organisation::factory()
        ->has(Contact::factory(10))
        ->has(Survey::factory(1))
        ->create();
});

test('can invite single contact to a survey', function () {
    app(InviteContactsToSurvey::class)->handle(
        $this->organisation->surveys->first(), 
        $this->organisation->contacts->first()->id
    );

    $survey = Survey::firstOrFail();
    $this->assertCount(1, $survey->contacts);
    $this->expect($survey->contacts->first()->id)
        ->toBe($this->organisation->contacts->first()->id);
});

test('can invite multiple contacts to a survey', function () {
    app(InviteContactsToSurvey::class)->handle(
        $this->organisation->surveys->first(), 
        $this->organisation->contacts->take(5)->pluck('id')->toArray()
    );

    $survey = Survey::firstOrFail();
    $this->assertCount(5, $survey->contacts);
    $this->expect($survey->contacts->first()->id)
        ->toBe($this->organisation->contacts->first()->id);
});

test('can invite contacts to survey but with a future date', function () {
    $inviteDate = now()->addDays(5);
    app(InviteContactsToSurvey::class)->handle(
        $this->organisation->surveys->first(), 
        $this->organisation->contacts->take(5)->pluck('id')->toArray(),
        $inviteDate
    );

    $survey = Survey::firstOrFail();
    $this->assertCount(5, $survey->contacts);
    $this->expect($survey->contacts->first()->id)
        ->toBe($this->organisation->contacts->first()->id);
    $this->expect($survey->contacts->first()->pivot->invited_at)
        ->toBe($inviteDate);
});
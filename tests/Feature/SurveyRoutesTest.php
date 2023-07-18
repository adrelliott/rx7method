<?php

use App\Models\Ask\Survey;
use App\Models\Organisation;

beforeEach(function () {
    $this->url = 'http://ask.' . env('APP_DOMAIN');
    $this->organisation = Organisation::factory()->create();
});

test('subdomain ask.rx7method displays homepage', function () {
    $response = $this->get($this->url);
    $response->assertStatus(200);
});

it('returns 200 if survey is found and open', function () {
    // $survey = Survey::factory()->create([
    //      'opened_at' => now()->subDays(2),
    //      'organisation_id' => $this->organisation->id,
    // ]);
    // $response = $this->get($this->url . '/survey/' . $survey->id);
    // $response->assertStatus(200);
});

// it('returns 404 if survey is not found', function () {
//     $response = $this->get($this->url . '/survey/1');
//     $response->assertStatus(404);
// })->skip();

// it('returns 200 if survey is found and open', function () {
//     // $survey = factory(App\Survey::class)->create([
//     //     'status' => 'open',
//     //      'is_published' => true, or published_at = now()-days(1)
//     // ]);
//     $response = $this->get($this->url . '/survey/' . $survey->id);
//     $response->assertStatus(200);
// });

// it('returns 403 if survey is closed', function () {
//     // $survey = factory(App\Survey::class)->create([
//     //     'status' => 'closed',
//     // ]);
//     $response = $this->get($this->url . '/survey/' . $survey->id);
//     $response->assertStatus(403);
// })->skip();

// it('returns 403 if survey is closed', function () {
//     // $survey = factory(App\Survey::class)->create([
//     //     'status' => 'closed',
//     // ]);
//     $response = $this->get($this->url . '/survey/' . $survey->id);
//     $response->assertStatus(403);
// })->skip();

// it('returns 403 if survey is unpublished', function () {
//     // $survey = factory(App\Survey::class)->create([
//     //     'status' => 'unpublished',
//     // ]);
//     $response = $this->get($this->url . '/survey/' . $survey->id);
//     $response->assertStatus(403);
// })->skip();
<?php

use App\Models\Organisation;

test('can create organisation', function () {
    $o = Organisation::factory()->create([
        'name' => 'My Organisation',
        'description' => 'My Organisation Description',
    ]);
    $organisation = Organisation::firstOrFail();
    expect($organisation->name)->toBe($o->name);
    expect($organisation->description)->toBe($o->description);
});
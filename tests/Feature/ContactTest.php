<?php

use App\Models\Contact;
use App\Models\Organisation;

test('can create contact', function () {
    $c = Contact::factory()->create([
        'first_name' => 'Alfred',
        'email' => 'myemail@email.com',
        'organisation_id' => Organisation::factory()->create()->id,
    ]);
    $contact = Contact::firstOrFail();
    expect($contact->first_name)->toBe($c->first_name);
    expect($contact->email)->toBe($c->email);
});
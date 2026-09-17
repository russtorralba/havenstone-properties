<?php

namespace Tests\Feature;

use Tests\TestCase;

class ViewingRequestTest extends TestCase
{
    public function test_valid_viewing_request_redirects_with_a_demo_confirmation(): void
    {
        $response = $this->from('/')->post('/viewing-request', [
            'full_name' => 'Alex Santos',
            'mobile_number' => '+63 900 000 0000',
            'email' => 'alex@example.com',
            'preferred_property' => 'willow',
            'preferred_viewing_date' => '2027-01-15',
            'message' => 'I would like to learn more.',
        ]);

        $response
            ->assertRedirect(route('home').'#viewing')
            ->assertSessionHas('viewing_success', 'Demo request received. No information was sent or stored, and no real viewing appointment was created.');
    }

    public function test_viewing_request_requires_the_mandatory_fields(): void
    {
        $response = $this->from('/')->post('/viewing-request', []);

        $response
            ->assertRedirect(route('home').'#viewing')
            ->assertSessionHasErrors([
                'full_name' => 'The full name field is required.',
                'mobile_number' => 'The mobile number field is required.',
                'email' => 'The email field is required.',
                'preferred_property' => 'The preferred property field is required.',
                'preferred_viewing_date' => 'The preferred viewing date field is required.',
            ]);
    }

    public function test_invalid_viewing_request_preserves_valid_old_input_at_the_viewing_section(): void
    {
        $response = $this->from('/')->post('/viewing-request', [
            'full_name' => 'Alex Santos',
            'mobile_number' => '+63 900 000 0000',
            'email' => 'alex@example.com',
            'preferred_property' => 'unknown',
            'preferred_viewing_date' => '2027-01-15',
        ]);

        $response
            ->assertRedirect(route('home').'#viewing')
            ->assertSessionHasErrors('preferred_property')
            ->assertSessionHasInput('full_name', 'Alex Santos')
            ->assertSessionHasInput('email', 'alex@example.com');
    }
}

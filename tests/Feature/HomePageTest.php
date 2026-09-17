<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_homepage_displays_the_havenstone_viewing_form(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('name="full_name"', false)
            ->assertSee('name="preferred_property"', false)
            ->assertSee('data-viewing-form', false)
            ->assertSee('name="_token"', false);
    }

    public function test_generation_endpoint_returns_the_dummy_response(): void
    {
        $response = $this->post('/generate', [
            'business_type' => 'Real estate agency',
        ]);

        $response
            ->assertOk()
            ->assertSeeText('Generated successfully');
    }

    public function test_generation_endpoint_requires_a_business_type(): void
    {
        $response = $this->from('/')->post('/generate', []);

        $response
            ->assertRedirect('/')
            ->assertSessionHasErrors([
                'business_type' => 'The business type field is required.',
            ]);
    }

    public function test_generation_endpoint_rejects_a_non_string_business_type(): void
    {
        $response = $this->from('/')->post('/generate', [
            'business_type' => ['Real estate agency'],
        ]);

        $response
            ->assertRedirect('/')
            ->assertSessionHasErrors([
                'business_type' => 'The business type field must be a string.',
            ]);
    }

    public function test_generation_endpoint_rejects_a_business_type_longer_than_255_characters(): void
    {
        $response = $this->from('/')->post('/generate', [
            'business_type' => str_repeat('a', 256),
        ]);

        $response
            ->assertRedirect('/')
            ->assertSessionHasErrors([
                'business_type' => 'The business type field must not be greater than 255 characters.',
            ]);
    }
}

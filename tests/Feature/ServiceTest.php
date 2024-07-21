<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Services\UserFilterService;
use App\Services\OrderFilterService;
use App\Services\BookFilterService;
use App\Services\AuthorFilterService;
use App\Services\GenreFilterService;

class ServiceTest extends TestCase
{
    /**
     * Test whether the user filter service is working
     */
    public function test_user_filter_service(): void
    {
        $filters = [
            "latest",
        ];

        $service = new UserFilterService();
        $results = $service->filter($filters);

        $this->assertNotEmpty($results);
    }

    /**
     * Test whether the order filter service is working
     */
    public function test_order_filter_service(): void
    {
        $filters = [
            "latest",
        ];

        $service = new OrderFilterService();
        $results = $service->filter($filters);

        $this->assertNotEmpty($results);
    }

    /**
     * Test whether the book filter service is working
     */
    public function test_book_filter_service(): void
    {
        $filters = [
            "latest",
        ];

        $service = new BookFilterService();
        $results = $service->filter($filters);

        $this->assertNotEmpty($results);
    }

    /**
     * Test whether the author filter service is working
     */
    public function test_author_filter_service(): void
    {
        $filters = [
            "latest",
        ];

        $service = new AuthorFilterService();
        $results = $service->filter($filters);

        $this->assertNotEmpty($results);
    }

    /**
     * Test whether the genre filter service is working
     */
    public function test_genre_filter_service(): void
    {
        $filters = [
            "latest",
        ];

        $service = new GenreFilterService();
        $results = $service->filter($filters);

        $this->assertNotEmpty($results);
    }
}

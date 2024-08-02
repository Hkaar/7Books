<?php

namespace Tests\Feature;

use App\Services\AuthorFilterService;
use App\Services\BookFilterService;
use App\Services\GenreFilterService;
use App\Services\OrderFilterService;
use App\Services\UserFilterService;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    /**
     * Test whether the user filter service is working
     *
     * @test
     */
    public function user_filter_service(): void
    {
        $filters = [
            'latest',
        ];

        $service = new UserFilterService;
        $results = $service->filter($filters);

        $this->assertNotEmpty($results);
    }

    /**
     * Test whether the order filter service is working
     *
     * @test
     */
    public function order_filter_service(): void
    {
        $filters = [
            'latest',
        ];

        $service = new OrderFilterService;
        $results = $service->filter($filters);

        $this->assertNotEmpty($results);
    }

    /**
     * Test whether the book filter service is working
     *
     * @test
     */
    public function book_filter_service(): void
    {
        $filters = [
            'latest',
        ];

        $service = new BookFilterService;
        $results = $service->filter($filters);

        $this->assertNotEmpty($results);
    }

    /**
     * Test whether the author filter service is working
     *
     * @test
     */
    public function author_filter_service(): void
    {
        $filters = [
            'latest',
        ];

        $service = new AuthorFilterService;
        $results = $service->filter($filters);

        $this->assertNotEmpty($results);
    }

    /**
     * Test whether the genre filter service is working
     *
     * @test
     */
    public function genre_filter_service(): void
    {
        $filters = [
            'latest',
        ];

        $service = new GenreFilterService;
        $results = $service->filter($filters);

        $this->assertNotEmpty($results);
    }
}

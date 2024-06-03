<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    private $classificationService;

    protected function setUp(): void{
        parent::setUp();

        $this->classificationService = $this->app->make(\App\Services\Interfaces\ClassificationService::class);
    }

    /**
     * Test Connection Classification Service Container
     */
    public function test_connection_gateaway_for_classification_service()
    {
        $this->assertTrue($this->classificationService->connectionGateaway());
    }
}

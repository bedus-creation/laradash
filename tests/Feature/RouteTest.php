<?php

namespace Aammui\Tests\Feature;

use Aammui\Laradash\LaradashServiceProvider;
use Aammui\Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class RouteTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            'Aammui\Laradash\LaradashServiceProvider'
        ];
    }

    /** @test */
    public function categories_can_be_added_to_dashboard()
    {
        dd(Artisan::call('route:list'));
        $this->get('admin/posts')
            ->assertStatus(200);
    }
}

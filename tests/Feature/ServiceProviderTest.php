<?php

namespace Spatie\Medialibrary\Tests\Feature;

use Spatie\Medialibrary\MedialibraryServiceProvider;
use Spatie\Medialibrary\Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    /** @test */
    public function it_has_fallback_for_disk_name()
    {
        $app = app();

        $app['config']->set('medialibrary.disk_name', null);
        $app['config']->set('medialibrary.default_filesystem', 'test');

        $provider = new MedialibraryServiceProvider($app);

        $provider->register();

        $this->assertEquals(config('medialibrary.default_filesystem'), config('medialibrary.disk_name'));
    }
}

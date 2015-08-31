<?php

use App\Site;

class SiteTest extends TestCase
{
    public function testRgbAttribute()
    {
        $site = new Site;
        $site->red = 100;
        $site->green = 200;
        $site->blue = 300;
        $this->assertEquals(
            '100,200,300',
            $site->rgb
        );
    }

    public function testRgbCssAttribute()
    {
        $site = new Site;
        $site->red = 100;
        $site->green = 200;
        $site->blue = 300;
        $this->assertEquals(
            'rgb(100,200,300)',
            $site->rgbCss
        );
    }
}

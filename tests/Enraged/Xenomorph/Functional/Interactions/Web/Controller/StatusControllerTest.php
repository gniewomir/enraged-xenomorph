<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Functional\Interactions\Web\Controller;

use Tests\Enraged\Xenomorph\Functional\FunctionalWebTestCase;

class StatusControllerTest extends FunctionalWebTestCase
{
    public function test_index_html()
    {
        $this->assertEquals(
            'OK',
            $this
                ->createClient()
                ->request('GET', '')
                ->text()
        );
    }
}

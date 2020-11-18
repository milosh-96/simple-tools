<?php

namespace Tests\Feature\Converters\Bitcoin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChartViewTest extends TestCase
{
    /** @test */
    public function chartPageIsWorking() {
        $this->withoutExceptionHandling();
        $response = $this->get('/converters/bitcoin/chart');
        $response->assertStatus(200);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */

         /** @test */

    public function containImportantElements()
    {
        $data = ["viewModel"=>new \App\ViewModels\Converters\Bitcoin\BitcoinChartPageViewModel];
        $view = $this->view('converters.bitcoin.chart',$data);
        $view->assertSee("Bitcoin Exchange Rate Table");
        $view->assertSee("USD");
        $view->assertSee("CAD");
        $view->assertSee("EUR");
        $view->assertSee("Buy");
        $view->assertSee("Sell");
        $view->assertSee("Source: Blockchain.info");
    }
}

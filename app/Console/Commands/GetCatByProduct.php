<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class GetCatByProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:category {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Return category slug by product id';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $product = Product::find($this->argument('id'));
        if (!isset($product)) {
            $this->info("No product!");
        } else {
            $this->info('Category slug: ' . $product->category->slug);
        }

    }
}

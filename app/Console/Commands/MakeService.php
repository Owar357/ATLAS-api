<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        if (! preg_match('/^[A-Z][a-zA-Z]*$/', $name)) {
            $this->error('Service name must start with uppercase letter.');

            return;
        }

        $directory = app_path('Services');
        $path = $directory."/{$name}.php";

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        if (file_exists($path)) {
            $this->error('Service name already exists.');

            return;
        }

        $stub = <<<PHP
     <?php 

     namespace App\Services;

     use Illuminate\Database\Eloquent\Model;
     use Illuminate\Support\Collection;
     

     class {$name}
     {
        public function index(): Collection
        {
            return collect([]);;
        }

         public function find(int \$id): ?Model
        {
           return null;
        }

         public function create(array \$data): Model
        {
           return null;
        }

         public function update(int \$id, array \$data): Model 
        {
           return null;
        }

        
         public function delete(Model \$model):void 
        {
           //
        }

     }
    
     PHP;

        file_put_contents($path, $stub);

        $this->info("Service {$name} created sucefully");

    }
}

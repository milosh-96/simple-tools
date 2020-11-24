<?php

namespace App\Console\Commands;

use Faker\Generator;
use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class ViewModelMakeCommand extends GeneratorCommand
{
     /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:viewmodel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new View Model class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'ViewModel';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (parent::handle() === false && ! $this->option('force')) {
            return false;
        }
    }

    /**
     * Create a model factory for the model.
     *
     * @return void
     */

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path().'/stubs'.'/viewmodel.stub';
        //$this->resolveStubPath('/stubs/viewmodel.stub');
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
                        ? $customPath
                        : __DIR__.$stub;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return is_dir(app_path('ViewModels')) ? $rootNamespace.'\\ViewModels' : $rootNamespace;
    }



}

<?php

declare(strict_types=1);

namespace App\Console\Commands\Support;

use Illuminate\Console\GeneratorCommand;

class TraitCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:trait';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new trait for a model';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        $current = dirname(__DIR__, 4);

        return realpath($current . DIRECTORY_SEPARATOR . 'stubs/trait.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Traits';
    }
}

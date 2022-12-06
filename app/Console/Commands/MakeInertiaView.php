<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand as Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

/**
 * Class MakeInertiaView
 *
 * @package App\Console\Commands
 */
class MakeInertiaView extends Command
{
    /**
     * @var string
     */
    protected $signature = 'make:inertia {name} {{--force}}';

    /**
     * @var string
     */
    protected $description = 'Create an inertia view component';

    /**
     * @return int
     * @throws FileNotFoundException
     */
    public function handle(): int
    {
        $name = $this->argument('name');

        $path = resource_path('js/views/' . $name . '.vue');
        if (! $this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }

        if ($this->files->exists($path) && ! $this->option('force')) {
            $this->components->error('View already exists.');
            return Command::FAILURE;
        }

        $this->files->put($path, $this->files->get($this->getStub()));
        $this->components->info(sprintf('View [%s] created successfully.', $path));

        return Command::SUCCESS;
    }

    /**
     * @return string
     */
    protected function getStub(): string
    {
        return base_path('/stubs/view-inertia.stub');
    }
}

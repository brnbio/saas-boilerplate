<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class CrudCommand
 *
 * @package App\Console\Commands
 */
class CrudCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'crud {action : The name of the class } {model : Generate a controller for the given model}';

    /**
     * @var string
     */
    protected $description = 'Generate crud';

    /**
     * @return int
     */
    public function handle(): int
    {
        $action = $this->argument('action');
        $model = $this->argument('model');
        $namespace = str($this->argument('model'))->plural()->toString();

        if (in_array($action, ['all', 'create'])) {
            $this->call('make:request', ['name' => $namespace . '/StoreRequest']);
            $this->call(
                'make:controller',
                ['--model' => $model, '--type' => 'create', 'name' => $namespace . '/CreateController']
            );
            $this->call('make:inertia', ['name' => strtolower($namespace) . '/create']);
            $this->addRoute(
                url: strtolower($namespace) . '/create',
                controller: $namespace . '/CreateController',
                name: strtolower($namespace) . '.create',
            );
            $this->addRoute(
                url: strtolower($namespace) . '/create',
                controller: $namespace . '/CreateController',
                action: 'store',
                method: 'post',
            );
        }

        if (in_array($action, ['all', 'read'])) {
            $this->call(
                'make:controller',
                ['--model' => $model, '--type' => 'read', 'name' => $namespace . '/ReadController']
            );
            $this->call('make:inertia', ['name' => strtolower($namespace) . '/index']);
            $this->call('make:inertia', ['name' => strtolower($namespace) . '/details']);
            $this->addRoute(
                url: strtolower($namespace),
                controller: $namespace . '/ReadController',
                name: strtolower($namespace),
            );
            $this->addRoute(
                url: strtolower($namespace) . '/{' . strtolower($model) . '}',
                controller: $namespace . '/ReadController',
                action: 'details',
                name: strtolower($namespace) . '.show',
            );
        }

        if (in_array($action, ['all', 'update'])) {
            $this->call('make:request', ['name' => $namespace . '/UpdateRequest']);
            $this->call(
                'make:controller',
                ['--model' => $model, '--type' => 'update', 'name' => $namespace . '/UpdateController']
            );
            $this->call('make:inertia', ['name' => strtolower($namespace) . '/update']);
            $this->addRoute(
                url: strtolower($namespace) . '/{' . strtolower($model) . '}/update',
                controller: $namespace . '/UpdateController',
                name: strtolower($namespace) . '.update',
            );
            $this->addRoute(
                url: strtolower($namespace) . '/{' . strtolower($model) . '}/update',
                controller: $namespace . '/UpdateController',
                action: 'store',
                method: 'post',
            );
        }

        if (in_array($action, ['all', 'delete'])) {
            $this->call(
                command: 'make:controller',
                arguments: ['--model' => $model, '--type' => 'delete', 'name' => $namespace . '/DeleteController']
            );
            $this->addRoute(
                url: strtolower($namespace) . '/{' . strtolower($model) . '}/delete',
                controller: $namespace . '/DeleteController',
                method: 'post',
                name: strtolower($namespace) . '.delete',
            );
        }

        return Command::SUCCESS;
    }

    /**
     * @param string $url
     * @param string $controller
     * @param string|null $action
     * @param string $method
     * @param string|null $name
     * @return void
     */
    protected function addRoute(
        string $url,
        string $controller,
        string $action = null,
        string $method = 'get',
        string $name = null
    ): void {
        $controllerAction = 'Controllers\\' . str_replace('/', '\\', $controller) . '::class';
        if ($action) {
            $controllerAction = sprintf("[%s, '%s']", $controllerAction, $action);
        }

        $route = sprintf(
            "\nRoute::%s('/%s', %s)%s;",
            $method === 'get' ? 'get ' : $method,
            $url,
            $controllerAction,
            $name ? "->name('{$name}')" : ''
        );
        file_put_contents(base_path('/routes/web.php'), $route, FILE_APPEND);
    }
}

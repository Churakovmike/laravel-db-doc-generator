<?php

namespace ChurakovMike\DbDocumentor\Commands;

use ChurakovMike\DbDocumentor\Exceptions\GeneratorException;
use ChurakovMike\DbDocumentor\Generators\DefaultGenerator;
use Illuminate\Console\Command;

/**
 * Class GeneratorCommand.
 * @package ChurakovMike\DbDocumentor\Commands
 *
 * @property string $signature
 * @property string $description
 */
class GeneratorCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'db-doc:generate 
                            {--output=} 
                            {--model-path=} 
                            {--excluded-dir=}';

    /**
     * @var string
     */
    protected $description = 'Command for start generate database documentation';

    /**
     * TestCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param DefaultGenerator $generator
     */
    public function handle(DefaultGenerator $generator)
    {
        try {
            $generator->loadConfig([
                'output' => $this->getOption('output') ?? public_path(),
                'modelPath' => $this->getOption('model-path') ?? app_path(),
                'excludedDirectories' => $this->getOption('excluded-dir') ?? [],
            ]);

            $generator->run();
        } catch (GeneratorException $exception) {
            var_dump($exception);
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }
        var_dump(scandir(public_path()));
    }

    /**
     * @param null $key
     * @return array|bool|null|string
     */
    private function getOption($key = null)
    {
        $options = array_keys($this->option());
        if (in_array($key, $options)) {
            return $this->option($key);
        }
    }
}

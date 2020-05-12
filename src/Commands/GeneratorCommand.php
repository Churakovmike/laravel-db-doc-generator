<?php

declare(strict_types=1);

namespace ChurakovMike\DbDocumentor\Commands;

use ChurakovMike\DbDocumentor\Exceptions\GeneratorException;
use ChurakovMike\DbDocumentor\Generators\DefaultGenerator;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * Class GeneratorCommand.
 * @package ChurakovMike\DbDocumentor\Commands
 *
 * @property string $signature
 * @property string $description
 * @property ConsoleOutput $output
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
     * @var ConsoleOutput $output
     */
    protected $output;

    /**
     * @var string
     */
    protected $description = 'Command for start generate database documentation';

    /**
     * TestCommand constructor.
     * @param ConsoleOutput $output
     */
    public function __construct(ConsoleOutput $output)
    {
        $this->output = $output;
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
            $this->output->writeln($exception->getMessage());
        } catch (\Exception $exception) {
            $this->output->writeln($exception->getMessage());
        }

        $this->output->writeln('Database documentation was generated successfully');
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

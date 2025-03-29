<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
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
    protected $description = 'Cria um novo Service no diretório app/Services';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        
        // Verifica se o nome termina com 'Service' (opcional)
        if (!str_ends_with($name, 'Service')) {
            $name .= 'Service';
            $this->info("Adicionado sufixo 'Service' ao nome. Nome final: {$name}");
        }

        $servicePath = app_path("Services/{$name}.php");

        // Verifica se o Service já existe
        if (File::exists($servicePath)) {
            $this->error("O Service {$name} já existe!");
            return;
        }

        // Cria o diretório Services se não existir
        if (!File::isDirectory($directory = app_path('Services'))) {
            File::makeDirectory($directory, 0755, true);
        }

        // Conteúdo padrão do Service
        $content = <<<EOD
<?php

namespace App\Services;

class {$name}
{
    public function index()
    {
        // Implemente sua lógica aqui
    }
}
EOD;

        // Salva o arquivo
        File::put($servicePath, $content);

        $this->info("Service [app/Services/{$name}.php] criado com sucesso!");
    }
}
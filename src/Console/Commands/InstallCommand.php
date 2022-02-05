<?php

namespace Ajaycalicut17\Larastarter\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'larastarter:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install laravel starter';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Publish
        $this->callSilent('vendor:publish', ['--provider' => 'Laravel\Fortify\FortifyServiceProvider', '--force' => true]);

        // Fortify Provider
        $this->replaceInFile('App\Providers\RouteServiceProvider::class,', '        App\Providers\FortifyServiceProvider::class,', config_path('app.php'));

        // call method from the boot method
        $search = "public function boot()" . PHP_EOL . "    {";
        $replace = "        Fortify::loginView(function () {" . PHP_EOL . "            return view('auth.login');" . PHP_EOL . "        });" . 
        PHP_EOL . "        Fortify::twoFactorChallengeView(function () {" . PHP_EOL . "            return view('auth.two-factor-challenge');" . PHP_EOL . "        });" . 
        PHP_EOL . "        Fortify::registerView(function () {" . PHP_EOL . "            return view('auth.register');" . PHP_EOL . "        });" . 
        PHP_EOL . "        Fortify::requestPasswordResetLinkView(function () {" . PHP_EOL . "            return view('auth.forgot-password');" . PHP_EOL . "        });" . 
        PHP_EOL . "        Fortify::resetPasswordView(function (" . '$request' . ") {" . PHP_EOL . "            return view('auth.reset-password', ['request' => " . '$request' . "]);" . PHP_EOL . "        });" . 
        PHP_EOL . "        Fortify::verifyEmailView(function () {" . PHP_EOL . "            return view('auth.verify-email');" . PHP_EOL . "        });" . 
        PHP_EOL . "        Fortify::confirmPasswordView(function () {" . PHP_EOL . "            return view('auth.confirm-password');" . PHP_EOL . "        });";
        $this->replaceInFile($search, $replace, app_path('Providers/FortifyServiceProvider.php'));
    }
    
    protected function replaceInFile(string $search = '', string $replace = '', string $path = ''): bool
    {
        if (file_exists($path)) {
            $fileContents = file_get_contents($path);
            if (!str_contains($fileContents, $replace)) {
                file_put_contents($path, str_replace($search, ($search . PHP_EOL . $replace), $fileContents));
            }
        }

        return true;
    }
}

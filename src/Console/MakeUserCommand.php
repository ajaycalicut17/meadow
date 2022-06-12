<?php

namespace Ajaycalicut17\Meadow\Console;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MakeUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:meadow-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a Meadow user.';

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
        $this->line('Hi, please enter following details for creating new user.');

        $name = $this->validateData('Name', 'name', 'required|string');

        $email = $this->validateData('Email', 'email', 'required|email|unique:users,email');

        $password = $this->validateData('Password', 'password', 'required|min:8');

        $user = $this->createUser($name, $email, $password);

        $this->sendSuccessMessage($user);

        return static::SUCCESS;
    }

    protected function validateData(string $field = '', string $name = '', string $rule = ''): string
    {
        $data = ($name == 'password') ? $this->secret($field) : $this->ask($field);

        $validator = Validator::make([$name => $data], [$name => $rule]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $this->error($errors->first($name));
            return $this->validateData($field, $name, $rule);
        }
        return $data;
    }

    protected function createUser(string $name = '', string $email = '', string $password = ''): User
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
    }

    protected function sendSuccessMessage(User $user): void
    {
        $this->info('Success! ' . ($user->name ?? 'You') . ' may now login at ' . route('login') . '.');

        if ($this->confirm('Would you like to show some love by starring the repo?', true)) {
            if (PHP_OS_FAMILY === 'Darwin') {
                exec('open https://github.com/ajaycalicut17/meadow');
            }
            if (PHP_OS_FAMILY === 'Linux') {
                exec('xdg-open https://github.com/ajaycalicut17/meadow');
            }
            if (PHP_OS_FAMILY === 'Windows') {
                exec('start https://github.com/ajaycalicut17/meadow');
            }

            $this->line('Thank you!');
        }
    }
}

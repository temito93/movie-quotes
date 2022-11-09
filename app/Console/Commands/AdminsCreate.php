<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AdminsCreate extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'admins:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new admin user';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$name = $this->ask('Name');
		$email = $this->ask('Email');
		$password = $this->secret('Password');
		$confirm_password = $this->secret('Confirm password');

		while ($password !== $confirm_password)
		{
			$this->error("Passwords doesn't match, please try again!");

			$password = $this->secret('Password');
			$confirm_password = $this->secret('Confirm_password');
		}

		$validator = Validator([
			'name'     => $name,
			'email'    => $email,
			'password' => $password,
		], [
			'name'     => ['required', 'min:3'],
			'email'    => ['required', 'email', 'unique:users,email'],
			'password' => ['required', 'min:6'],
		]);

		if ($validator->fails())
		{
			$this->info('Something went wrong, See error messages bellow:');
			foreach ($validator->errors()->all() as $error)
			{
				$this->error($error);
			}
			return false;
		}

		$user = new User;
		$user->name = ucwords($name);
		$user->email = $email;
		$user->password = bcrypt($password);

		$user->save();
		$this->info('User: ' . ucwords($name) . ' has been created!');
		return true;
	}
}

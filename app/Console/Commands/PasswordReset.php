<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class PasswordReset extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'creset:password';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Reset user password.';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$email = $this->ask('Enter email of user');

		$user = User::where('email', $email)->first();

		if ($user)
		{
			$password = $this->secret('Please enter new password for this user');
			$confirm_password = $this->secret('Confirm password');
		}
		else
		{
			return $this->info("User with this email doesn't exists");
		}

		while ($password !== $confirm_password)
		{
			$this->error("Passwords doesn't match, please try again!");

			$password = $this->secret('Password');
			$confirm_password = $this->secret('Confirm_password');
		}

		$user->password = bcrypt($password);
		$user->save();
		$this->info('User ' . '(' . $user->name . ')' . ' password has been successfully updated!');
		return true;
	}
}

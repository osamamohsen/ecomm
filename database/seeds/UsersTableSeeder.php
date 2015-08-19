<?php
use Illuminate\Database\Seeder;
// use App\Users as Users;
use App\User;
class UsersTableSeeder extends Seeder{
	public function run(){
		$user=new User;
		$user->firstname="osama";
		$user->lastname="mohsen";
		$user->email="osamamohsen1994@gmail.com";
		$user->password=Hash::make('mypassword');
		$user->telephone="01272013274";
		$user->admin=1;
		$user->save();
	}
}

?>
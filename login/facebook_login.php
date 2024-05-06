composer create-project laravel/laravel your-project-name

composer require laravel/jetstream

php artisan jetstream:install livewire

npm install

npm run build

folder path database/users table


public function up(): void
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('facebook_id')->nullable();
        $table->timestamp('email_verified_at')->nullable();
        $table->text('password');
        $table->rememberToken();
        $table->foreignId('current_team_id')->nullable();
        $table->string('profile_photo_path', 2048)->nullable();
        $table->timestamps();
    });
}

php artisan migrate

folder path config/service file

'facebook' => [
    'client_id' => '959160062487248',
    'client_secret' => '4866717ab94144e547cfd7043c3c18ab',
    'redirect' => 'http://localhost:8000/auth/facebook/callback',
],


chrome 
https://developers.facebook.com/apps
setting/basic

composer require laravel/socialite
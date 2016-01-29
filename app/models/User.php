<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    protected $fillable = ['username', 'email', 'password'];
    public static $rules = array(
        'username' => 'required|between:4,16',
        'email' => 'required|email',
        'password' => 'required|alpha_num|min:8|confirmed',
        'password_confirmation' => 'required|alpha_num|min:8',
    );

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier() {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword() {
        return $this->password;
    }

    /**
     * Automatically Hash the password when setting it
     * @param string $password The password
     */
    public function setPassword($password) {
        $this->password = Hash::make($password);
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail() {
        return $this->email;
    }

    /* public function create() {
      $this::create([
      'username' => 'admin',
      'email' => 'armannadim@msn.com',
      'password' => Hash::make('admin'),
      'role' => "1",
      'name' => "Admin"
      ]);
      } */

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken() {
        return $this->remember_token;
    }

    public function setRememberToken($value) {
        $this->remember_token = $value;
    }

    public function getRememberTokenName() {
        return 'remember_token';
    }

}

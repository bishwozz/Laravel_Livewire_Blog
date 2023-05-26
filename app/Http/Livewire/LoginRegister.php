<?php

namespace App\Http\Livewire;

use Hash;
use App\Models\User;
use Livewire\Component;
use App\Http\Request\ValidationRule;


class LoginRegister extends Component
{
    public  $email, $password, $name, $confirmPassword;
    public $registerForm = false;


    public function render()
    {
        return view('livewire.login-register')->layout('layout.base');
        
    }
    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->confirmPassword = '';
    }

    public function login(){
        
        $this->registerForm = false;
    }
    public function validateLogin(){
        // validate 
        $this->validate(
            ValidationRule::loginRules($this)
        );
        
        if(\Auth::attempt(array('name' => $this->name, 'password' => $this->password))){
            session()->flash('success', "You are Login successful.");
            return  redirect('/blog');  
        }else{
            // dd('asd');
            session()->flash('error', 'username and password are wrong.');
        }
        
    }

    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }

    public function registerStore()
    {
        // validate 
        $this->validate(
            ValidationRule::registrationRules($this)
        );
        $this->password = Hash::make($this->password); 

        try{
            User::create(['name' => $this->name, 'email' => $this->email,'password' => $this->password]);
            session()->flash('success', 'Your register successfully Go to the login page.');
            $this->resetInputFields();
            $this->login();
        }catch (\Exception $e){
            session()->flash('error', 'Something went wrong!!!.');
        }
        
    }
}

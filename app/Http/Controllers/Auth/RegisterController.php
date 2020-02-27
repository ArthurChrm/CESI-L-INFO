<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     
     *protected function create(array $data)
     *{
      *   // dd($data);
      *   try {
          *   return User::create([
      *           'name' => $data['name'],
        *         'first_name' => $data['first_name'],
        *         'email' => $data['email'],
          *       // 'birth_date' => $data['birth_date'],
         *        'birth_date' => Carbon::createFromFormat('Y-m-d H:i:s', '2017-01-04 00:52'),
          *       'address' => $data['address'],
           *      'phone_number' => $data['phone_number'],
            *     'password' => Hash::make($data['password']),
             *    // Default rank is student (1), teacher is 2 and admin is 3
             *    'rang_id' => 1,
         *    ]);
        * } catch (Exception $e){ 
          *   report($e);
 *
           *  return false;
      *   }
 *   }*/
    
 public function create(){
     $user = new User();
     $user->name = request()->name;
     $user->first_name = request()->first_name;
     $user->email = request()->email;
     $user->birth_date = request()->birth_date;
    // $user->DateTime::createFromFormat('Y-m-d H:i:s', '2017-01-04 00:52');
    //  $user->birth_date= date('Y-m-d H:i'); 
     $user->address = request()->address;
     $user->phone_number = request()->phone_number;
     $user->password = Hash::make(request()->password);
     $user->rang_id = 1;
     $user->save();

     return redirect('/');
 }
}

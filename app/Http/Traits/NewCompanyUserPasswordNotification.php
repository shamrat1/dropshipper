<?php
namespace App\Http\Traits;
use App\User;
use Mail;
/**
 * New Company User Password notification through email
 */
trait NewCompanyUserPasswordNotification
{
    protected $user;

    public function passwordMail(User $user,$password)
    {
        $this->user = $user;
        $data = array('name' => $user->name,'email'=> $user->email,'password'=>$password);

        Mail::send('emails.password', $data, function ($message) {
            $message->to($this->user->email, $this->user->name)->subject('New Account Created');
            $message->from('support@pickbazar.com', 'Pickbazar Team');
        });
    }
}

?>
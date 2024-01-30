<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AutorForgotForm extends Component
{
    public $email;

    public function ForgotHandler(){

            //dd('Forgot');
            $this->validate([
                'email'=>'required|email|exists:users,email',
            ],[
                'email.require'=>"O :attibute e obrigatório",
                'email.email'=>'Este email é inválido',
                'email.exists'=>'Este email não está registado'
            ]);

                $token = base64_encode(Str::random(64));
                DB::table('password_resets')->insert([
                    'email'=>$this->email,
                    'token'=>$token,
                    'created_at'=>Carbon::now(),

                ]);
                    $user = User::where('email',$this->email)->first();
                    $link = route('autor.reset-form',['token'=>$token,'email'=>$this->email]);
                    $body_message = "Recebemos uma requisição de redifinição da palavra-passe do sistema deste email:<p></p>".
                    $this->email.".<br> pode redefinir clicando no link abaixo.";
                    $body_message.='<br>';
                    $body_message.='<a href="'.$link.'" target="_blank" style="color:#FFF;boder-color:#22bc66;border-style:solid;
                    border-width:10px 180px; background-color:#22bc66;display:inline-block;text-decoration:none;border-radius:3px;
                    box-shadow:0 2px 3px rgba(0,0,0,0.16);-webkit-text-size-adjust:none;box-sizing:border-box">Resetar Password</a>';
                    $body_message.='<br>';
                    
                    $body_message.='Se não fez esta solicitação ignore este email.';
                    $body_message.='<br>';
                    $body_message.='Atenciosamente, Facturação';

                    $data = array(
                        'name' =>$user->name,
                        'body_message'=>$body_message,
                    );
                        Mail::send('forgot-email-template', $data, function($message) use ($user){
                            $message->from('dtd.teste@inage.gov.mz','Facturacao');
                            $message->to($user->email, $user->name)
                                        ->subject('Redefinir palavra-passe');
                        });
                        $this->email = null;
                        session()->flash('success', 'Enviamos-lhe um email.');




    }


    public function render()
    {
        return view('livewire.autor-forgot-form');
    }
}

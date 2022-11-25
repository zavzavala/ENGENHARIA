<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;


class AutorController extends Controller
{
    public function index(Request $request){

        return view('back.pages.home');
        
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('autor.login');

    }

    public function ResetForm(Request $request, $token = null){

        $data = [
            'pageTitle'=>'Resetar Password'
        ];

        return view('back.pages.auth.reset',$data)->with(['token'=>$token, 'email'=>$request->email]);  
    }

    public function changeProfilePicture(Request $request){
    $user = User::find(auth('web')->id());
    $path = 'back/dist/img/perfil';
    $file = $request->file('file');
    $old_picture = $user->getAttributes()['picture'];
    $file_path = $path.$old_picture;
    $new_picture_name = 'MNet'.$user->id.time().rand(1,100000).'.jpg';

    if($old_picture != null && File::exists(public_path($file_path))){
        File::delete(public_path($file_path));
    }
    $upload = $file->move(public_path($path), $new_picture_name);
    if($upload){
        $user->update([
            'picture'=>$new_picture_name
        ]);
        return response()->json(['status'=>1, 'msg'=>'Imagem Carregada com sucesso!']);
    }else{
        return response()->json(['status'=>0,'msg'=>"ERRO ao tentar carregar imagem de perfil"]);
    }
}
}

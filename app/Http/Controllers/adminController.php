<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\navire;
use App\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    public function create()
    {

        return view('admin/login/index');
    }

    public function createRegister()
    {
        return view('admin/login/register');
    }

    public function cpanel()
    {
        return view('admin/cpanel/index');
    }

    public function auth()
    {
        //dd(request('username'));
        request()->validate([
            'username'      =>      ['required']
            ,
            'password'      =>      ['required']
        ]);

        $rlt = Auth::attempt([
           'name'       =>      request('username'),
           'password'   =>      request('password')
        ]);


        if($rlt)
        {
            $user = Users::leftJoin('personnes','users.personne','=','personnes.personnes')
            ->where('name', request('username'))->first();
            //dd($user);
            Session::put('user', $user);
            return redirect('/master/acceuil');
        }//
        return back()->with('error', 'Identifiants incorrects');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect('/master');
    }

    public function retour($r)
    {
        return view('admin/cpanel/404', [
            'page' => $r
        ]);
    }

    public function addcreate()
    {
        return view('admin/cpanel/addadmin');
    }

    public function addstorage()
    {
        request()->validate([
            'name'      =>      ['required'],
            'prename'   =>      ['required'],
            'email'     =>      ['required', 'email'],
            'user'      =>      ['required'],
            'pass'      =>      ['required', 'min:8'],
            'cftpass'   =>      ['required', 'min:8'],
            'file'      =>      ['image']
        ], [
            'name.required'      =>      'Ce champs est requie',
            'prename.required'   =>      'Ce champs est requie',
            'email.required'     =>      'Ce champs est requie',
            'user.required'      =>      'Ce champs est requie',
            'pass.required'      =>      'Ce champs est requie',
            'cftpass.required'   =>      'Ce champs est requie',
            'email.email'        =>      'veiller saisir un email',
            'pass.min'           =>      'le mot de passe doit depacer :min caracteres',
            'cftpass.min'        =>      'le mot de passe doit depacer :min caracteres',
            'file.image'         =>      'le fichier choisie n\'est pas une image'
        ]);

        if(Personne::where('user', request('user'))->exists()) return back()->withInput()->with('var', 'nom d\'utilisateur deja pris');

        if(request('pass') == request('cftpass'))
        {
            if(request('file') != null)
                Personne::create([
                    'Nom'      =>      request('name'),
                    'Prenom'   =>      request('prename'),
                    //'emailPers'     =>      request('email'),
                    //'user'      =>      request('user'),
                    //'pass'      =>      Hash::make(request('pass')),
                    //'admin'     =>      1,
                    //'avatar'    =>      request('file')->store('avatar', 'public')
                ]);
            else
                Personne::create([
                    'Nom'      =>      request('name'),
                    'Prenom'   =>      request('prename'),
                    // 'emailPers'     =>      request('email'),
                    // 'user'      =>      request('user'),
                    // 'pass'      =>      Hash::make(request('pass')),
                    // 'admin'     =>      1,
                ]);
            return back()->with('reussie', 'Admin Ajouter avec succes');
        }
    }

        public function navires_add_create()
    {

        return view('admin/cpanel/addNavires');
    }

    public function navires_add_storage()
    {
        request()->validate([
            'code'      =>      ['required'],
            'lib'   =>      ['required'],
            'ct'     =>      ['required']
        ], [
            'code.required'      =>      'Ce champs est requis',
            'lib.required'   =>      'Ce champs est requis',
            'ct.required'         =>      'Ce champs est requis'
        ]);

       
            navire::create([
                'code' => request('code'),
                'lib' => request('lib'),
                 'ct' => request('ct')/*,
                 'active' => 1,
                 'idPers' => Session::get('user')->idPers*/
            ]);

        return back()->with([
            'reussie'   =>   'Post ajouter avec succès'
        ]);
    }

    public function personcreate()
    {
        return view('admin/cpanel/persoAdmin');
    }

    public function ajaxupload()
    {
       request()->validate([
            'file'      =>      ['image']
        ],[
            'file.image'         =>      'le fichier choisie n\'est pas une image'
        ]);

       $path = request('file')->store('avatar', 'public');

        Personne::where('idPers', Session::get('user')->idPers)->update([
            'avatar' => $path
        ]);

        Storage::disk('public')->delete(Session::get('user')->avatar);

        Session::get('user')->avatar = $path;

        return $path;
    }
}

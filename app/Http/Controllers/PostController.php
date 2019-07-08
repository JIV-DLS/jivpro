<?php

namespace App\Http\Controllers;

use App\Image;
use App\Personne;
use App\Categorie;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function ajtpostcreate()
    {

        return view('admin/cpanel/ajouterpost',[
            'cat' => Categorie::all()
        ]);
    }

    public function ajtpoststore()
    {
        request()->validate([
            'title'      =>      ['required'],
            'cat'   =>      ['required'],
            'file*'      =>      ['required','image', 'mimes:jpeg,bmp,png,gif'],
            'choix'     =>      ['required']
        ], [
            'title.required'      =>      'Ce champs est requie',
            'cat.required'   =>      'Ce champs est requie',
            'file.required'         =>      'Selectionner des images',
            'choix.required'        =>      'Selectionner des images',
            'file.image'         =>      'les fichiers choisie ne sont pas des images'
        ]);

        if(request('desct'))
            Post::create([
                'title' => request('title'),
                'desct' => request('desct'),
                'idCat' => request('cat'),
                'active' => 1,
                'idPers' => Session::get('user')->idPers
            ]);
        else
            Post::create([
                'title' => request('title'),
                'idCat' => request('cat'),
                'active' => 1,
                'idPers' => Session::get('user')->idPers
            ]);

        $post = Post::all()->last();

        for($i = 0; $i < count(Session::get('files')); $i++ )
        {
            if($i != (int)request('choix'))
                Image::create([
                    'linkImg' => Session::get('files')[$i],
                    'idPst'   => $post->idPst
                ]);
            else
                Image::create([
                    'linkImg' => Session::get('files')[$i],
                    'idPst'   => $post->idPst,
                    'default' => 1
                ]);
        }

        $img = Image::where('default', 1)->where( 'idPst', $post->idPst)->first();


        return back()->with([
            'reussie'   =>   'Post ajouter avec succes',
            'post'  =>   $post,
            'img'   =>   $img
        ]);
    }

    public function postupload()
    {
        request()->validate([
            'file*'      =>      ['image']
        ],[
            'file.image'         =>      'le fichier choisie n\'est pas une image'
        ]);

        $path = [];
        $i = 0;

        foreach (request('file') as $file)
        {
            $path[$i] = $file->store('post', 'public');
            $i++;
        }
        $i=0;

        Session::put('files', $path);

        return view('admin/cpanel/postimage', [
            'total' => count(request('file'))
        ]);
        //return $path[0];
    }

    public function imgsup()
    {
        if(request('nb') == -1)
        {
           foreach (Session::get('files') as $file)
           {
               Storage::disk('public')->delete($file);
           }
           Session::forget('files');
           return null;
        }else{
            $path = [];
            $j = 0;
            for($i = 0; $i < count(Session::get('files')); $i++)
                if($i != (int) request('nb'))
                {
                    $path[$j] = Session::get('files')[$i];
                    $j++;
                }

            Storage::disk('public')->delete(Session::get('files')[(int) request('nb')]);

            Session::put('files', $path);

            return view('admin/cpanel/postimage', [
                'total' => count($path)
            ]);
        }
    }

    public function postaffichage()
    {
        $posts = Post::all();
        $imgs = [];
        $total = count($posts);
        if($posts != null)
            for($i = 0; $i < $total; $i++)
                $imgs[$i] = Image::where('idPst', $posts[$i]->idPst)->where('default', 1)->first()->linkImg;

        return view('admin/cpanel/postaffichage',[
            'posts' => $posts,
            'imgs' => $imgs,
            'total' => $total
        ]);
    }

    public function postaffichagedetaille($r)
    {
        $posts = Post::where('idPst', (int)$r)->first();
        if($posts != null)
        {
            $img = Image::where('idPst', $posts->idPst)->get();
            $imgs = [];
            $k = 0;
            for($i = 0; $i < count($img); $i++)
            {
                if($i == 0)
                {
                    for($j = 0; $j < count($img); $j++)
                    {
                        if($img[$j]->default == 1)
                        {
                            $k=$j;
                            $imgs[$i] = $img[$j];
                        }
                    }
                }
                else
                {
                    if($i > $k)
                    {
                        $imgs[$i] = $img[$i];
                    }else{
                        $imgs[$i] = $img[$i - 1];
                    }
                }
            }

            return view('admin/cpanel/postaffichagedetaille', [
                'post' => $posts,
                'imgs' => $imgs,
                'total' => count($img)
            ]);
        }
        return back();
    }

    public function editaffichagecreate()
    {
        $posts = Post::all();
        $imgs = [];
        $total = count($posts);
        if($posts != null)
            for($i = 0; $i < $total; $i++)
                $imgs[$i] = Image::where('idPst', $posts[$i]->idPst)->where('default', 1)->first()->linkImg;

        return view('admin/cpanel/editaffichage',[
            'posts' => $posts,
            'imgs' => $imgs,
            'total' => $total
        ]);
    }

    public function editing($r)
    {

        $posts = Post::where('idPst', (int)$r)->first();
        if($posts != null)
        {
            $img = Image::where('idPst', $posts->idPst)->get();
            $imgs = [];
            $k = 0;
            for($i = 0; $i < count($img); $i++)
            {
                if($i == 0)
                {
                    for($j = 0; $j < count($img); $j++)
                    {
                        if($img[$j]->default == 1)
                        {
                            $k=$j;
                            $imgs[$i] = $img[$j];
                        }
                    }
                }
                else
                {
                    if($i > $k)
                    {
                        $imgs[$i] = $img[$i];
                    }else{
                        $imgs[$i] = $img[$i - 1];
                    }
                }
            }

                return view('admin/cpanel/editing', [
                    'post' => $posts,
                    'imgs' => $imgs,
                    'total' => count($img),
                    'cat' => Categorie::all()
                ]);
        }
        return back();
    }

    public function editingstore($r)
    {
        request()->validate([
            'title'      =>      ['required'],
            'cat'   =>      ['required'],
        ], [
            'title.required'      =>      'Ce champs est requie',
            'cat.required'   =>      'Ce champs est requie',
        ]);


        $posts = Post::where('idPst', (int)$r);
        if($posts != null)
        {
            if(request('desct'))
                $posts->update([
                    'title' => request('title'),
                    'desct' => request('desct'),
                    'idCat' => request('cat')
                ]);
            else
                $posts->update([
                    'title' => request('title'),
                    'idCat' => request('cat')
                ]);

            /*$img = Image::where('idPst', $r)->get();
            $imgs = [];
            $k = 0;
            for($i = 0; $i < count($img); $i++)
            {
                if($i == 0)
                {
                    for($j = 0; $j < count($img); $j++)
                    {
                        if($img[$j]->default == 1)
                        {
                            $k=$j;
                            $imgs[$i] = $img[$j];
                        }
                    }
                }
                else
                {
                    if($i > $k)
                    {
                        $imgs[$i] = $img[$i];
                    }else{
                        $imgs[$i] = $img[$i - 1];
                    }
                }
            }

            return view('admin/cpanel/editing', [
                'post' => $posts,
                'imgs' => $imgs,
                'total' => count($img),
                'cat' => Categorie::all()
            ]);*/
        }
        return back();
    }

    public function postdeleting()
    {
        request()->validate([
           'id' => ['required']
        ], [
            'id.required' => 'post introuvable'
        ]);
        $id = request('id');
        $imgs = Image::where('idPst', $id)->get();

        foreach ($imgs as $img)
            Storage::disk('public')->delete($img->linkImg);

        Image::where('idPst', $id)->delete();
        Post::where('idPst', $id)->delete();
    }

    public function postdeletingDB()
    {
        request()->validate([
            'id' => ['required'],
            'post' => ['required']
        ], [
            'id.required' => 'post introuvable'
        ]);
        $id = request('id');
        $post = request('post');
        $img = Image::where('idImg', $id)->first();

        Storage::disk('public')->delete($img->linkImg);
        if($img)
        {
            if(isset($img->default) and $img->default == 1)
            {
                Storage::disk('public')->delete($img->linkImg);
                Image::where('idImg', $id)->delete();
                $i = Image::where('idPst', $post)->first();
                Image::where('idImg', $i->idImg)->update(['default' => 1]);
            }else
            {
                Storage::disk('public')->delete($img->linkImg);
                Image::where('idImg', $id)->delete();
            }
        }
    }

    public function postactiving()
    {
        request()->validate([
            'id' => ['required'],
        ], [
            'id.required' => 'post introuvable',
        ]);
        $id = request('id');
        $val = Post::where('idPst', $id)->first()->active;
        $post = Post::where('idPst', $id);

        if((int)$val == 1) $post->update(['active' => 0]);
        else $post->update(['active' => 1]);
    }

    public function postdefaulting()
    {
        request()->validate([
            'id' => ['required'],
            'post' => ['required']
        ], [
            'id.required' => 'post introuvable'
        ]);

        $id = request('id');
        $post = request('post');
        $default = Image::where('idPst', (int)$post)->where('default', 1)->first();
                 Image::where('idImg', (int)$default->idImg)->update(['default' => 0]);
        Image::where('idImg', $id)->update(['default' => 1]);
    }

    public function postsliding()
    {
        request()->validate([
            'id' => ['required'],
        ], [
            'id.required' => 'post introuvable',
        ]);
        $id = request('id');
        $val = Post::where('idPst', $id)->first()->slide;
        $post = Post::where('idPst', $id);

        if((int)$val == 1) $post->update(['slide' => 0]);
        else $post->update(['slide' => 1]);
    }
}

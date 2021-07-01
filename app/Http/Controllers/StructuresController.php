<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StructuresController extends Controller
{
    use FileTrait;

    public function viewFolder($uuid = false){
        $i=0;
        $caminho=[];
        if($uuid===false){
            $folder = Structure::first();
        }else{
            $folder = Structure::where('uuid','=',$uuid)->first();
        }

        do{
            if($i==0){
                $folderRequest =Structure::find($folder->id);
            }else{
                $folderRequest = $folderRequest->parent;

            }
            array_push($caminho,$folderRequest);
            $i++;
        }while(!empty($folderRequest->parent));
        $caminho = array_reverse($caminho);

        return view('folders.folder',compact('folder','caminho'));

    }
    public function createFolder(Request $request,$uuid = false){
        $dataForm = $request->all();
        if ($uuid === false){
            $folder = Structure::first();
        }else{
            $folder = Structure::where('uuid' , '=' , $uuid)->first();
        }
        $dataForm['structure_parent'] = $folder->id;
        Structure::create($dataForm);
        return redirect()->back();

    }
    public function deleteFolder($id){
        $folder = Structure::find($id);
        $folder->delete();
        return redirect()->back();
    }
    public function renameFOlder(){

    }

    public function update(Request $request, $id){
        $dataForm = $request->all();
        $folder = Structure::find($id);
        $folder->update($dataForm);
        return redirect()->back();
    }

}

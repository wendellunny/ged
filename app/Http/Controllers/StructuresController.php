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
        if($uuid===false){
            $folder = Structure::first();
        }else{
            $folder = Structure::where('uuid','=',$uuid)->first();
        }
        return view('folders.folder',compact('folder'));

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

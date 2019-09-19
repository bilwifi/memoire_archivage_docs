<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Admin\ListDocumentDataTable;
use App\DataTables\Admin\ListAgentsDataTable;
use App\Http\Requests\AddDocumentRequest;
use App\Http\Requests\AddAgentRequest;
use App\Models\Document;
use App\Models\User;
use Flashy;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
         
    }

    public function index(){
        return view('admin.index');
    }

    public function showDocument(ListDocumentDataTable $dataTable){
        return $dataTable->render('admin.show_document');
    }
    public function uploadDocument(AddDocumentRequest $request)
    {
        $file = $request->document->getClientOriginalName();
        $filename = time().'.'.$request->file('document')->guessExtension();
        // $file_name = explode('.',$file)[0]; //on recupere le nom sans l'extention

        // On verifie si le bulletin est en format pdf
        if($request->document->guessClientExtension() != 'pdf' ){
            return response()->json(['error'=>'Extension invalide pour le fichier "'.$file.'". Seules les extensions "pdf" sont autorisées.']);
        }
 
        // $path = storage_path('app/public/documents');
        $path_file  =  $request->file('document')->storeAs('documents', $filename);

        // on stoque dans la BD
        $data = request()->except('document');
        $data['file'] = $path_file;
        $doc = Document::UpdateOrCreate([
                                    'titre'=>$request->titre,
                                    
                                ],
                                
                                $data
                            );
        if (request()->ajax()) {
            return response()->json(['uploaded'=>'Document uploader avec succès']);
        }
       
        Flashy::info('Document ajouté avec succès!');
        return redirect()->route('view_document',$doc->iddocuments);
    }

    public function destroyDocument(Document $document){
        $document->delete();
        Flashy::error('Document supprimé!');
        return redirect()->back();
    }

    // AGENTS
    public function showAgents(ListAgentsDataTable $dataTable){
        return $dataTable->render('admin.show_agent');
    }

    public function addAgent(AddAgentRequest $request){
        User::updateOrCreate($request->except('_token'));
        Flashy::message('Agent ajouté avec succès');
        return redirect()->back();
    }

    public function destroyAgent(User $agent){
        $agent->delete();
        Flashy::error('Agent supprimé!');
        return redirect()->back();
    }
}

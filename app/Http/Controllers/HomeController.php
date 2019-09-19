<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\Departement\ListDocumentDataTable;
use App\Models\Document;

class HomeController extends Controller
{
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['viewDocument']);
         
    }
    
    public function index(ListDocumentDataTable $dataTable){
        $iddepartements = auth()->user()->iddepartements;
        return $dataTable->with(["iddepartements"=>$iddepartements])->render('home');
    }

    public function viewDocument(Document $document){
        return view('view_document',compact('document'));
    }
}

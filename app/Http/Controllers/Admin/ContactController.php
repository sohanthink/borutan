<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Contact::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = ('<div class="btn-group" role="group" aria-label="First group">
                    <a href="' . route('admin.contact.show', $row->id) . '" class="btn btn-info btn-sm text-white"><i class="lni lni-eye"></i></a>
                    <a href="' . route('admin.contact.delete', $row->id) . '" class="btn btn-danger btn-sm mx-2"><i class="fadeIn animated bx bx-trash"></i></a>
                </div>');
                    return $actionBtn;
                })
                ->addColumn('created_at', function ($row) {
                    $created_at = $row->created_at->diffForHumans();
                    return $created_at;
                })
                ->addColumn('name', function ($row) {
                    $name = '';
                    if($row->is_read == null)
                    {
                        $name = '<span class="fw-bold">'.$row->name.'</span>';
                    }else{
                        $name = '<span class="">'.$row->name.'</span>';
                    }
                    return $name;
                })
                ->rawColumns(['action','name'])
                ->make(true);
        }
        return view('admin.pages.contact.index');
    }
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update([
            'is_read'=>Carbon::now(),
        ]);

        return view('admin.pages.contact.show',compact('contact'));
    }
    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return back()->with('warning','Radera framgångsrikt!');
    }
}

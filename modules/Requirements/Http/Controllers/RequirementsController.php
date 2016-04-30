<?php namespace Modules\Requirements\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Requirements\Entities\Requirement;
use Pingpong\Admin\Controllers\BaseController;
use Illuminate\Http\Request;
use File;
use Modules\Requirements\Entities\File as FileModel;

class RequirementsController extends BaseController
{

    protected $status = [
        '0' => 'Unstarted',
        '1' => 'Inprocess',
        '2' => 'Ready to test',
        '3' => 'Complete'
    ];

    public function index()
    {
        $requirements = Requirement::where('parent_id', 0)->orderBy('reference_number')->paginate(10);
        return view('requirements::index', compact('requirements'));
    }

    public function show($id)
    {
        $requirement = Requirement::find($id);
        $childrens = Requirement::where('parent_id', $id)->get();
        $status = $this->status;
        $images = FileModel::where('item_id', $id)->where('type', 'requirement_image')->get();
        $files = FileModel::where('item_id', $id)->where('type', 'requirement_file')->get();
        return view('requirements::show', compact('requirement', 'childrens', 'status', 'images', 'files'));
    }

    public function uplodImage(Request $request, $requriment_id)
    {
        if ($request->hasFile('requirement_image')) {
            $image = $request->file('requirement_image');
            $directory = public_path("files/images");
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            //getting file extension
            $extension = $image->getClientOriginalExtension();
            //Creating a new unique filename.
            $filename = uniqid('req_img_') . '.' . $extension;
            //Moving the file to the desired directory
            $image->move($directory . '/', $filename);
            FileModel::create([
                'item_id' => $requriment_id,
                'type' => 'requirement_image',
                'path' => $filename
            ]);
        }
        return back()->with('message', 'Image saved successfully');
    }

    public function uplodFile(Request $request, $requriment_id)
    {
        if ($request->hasFile('requirement_file')) {
            $image = $request->file('requirement_file');
            $directory = public_path("files/files");
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            //getting file extension
            $extension = $image->getClientOriginalExtension();
            //Creating a new unique filename.
            $filename = uniqid('req_fle_') . '.' . $extension;
            //Moving the file to the desired directory
            $image->move($directory . '/', $filename);
            FileModel::create([
                'item_id' => $requriment_id,
                'type' => 'requirement_file',
                'path' => $filename
            ]);
        }
        return back()->with('message', 'File saved successfully');
    }

    public function fileDelete($id)
    {
        $file = FileModel::find($id);
        switch ($file->type) {
            case 'requirement_file':
                if (File::exists(public_path("files/files") . '/' . $file->path)) {
                    File::delete(public_path("files/files") . '/' . $file->path);
                }
                break;
            case 'requirement_image':
                if (File::exists(public_path("files/images") . '/' . $file->path)) {
                    File::delete(public_path("files/images") . '/' . $file->path);
                }
                break;
        }
        $file->delete();
        return back();
    }

    public function store(Request $request)
    {
        if (!empty($request->get('requirement_id'))) {
            $requirement = Requirement::find($request->get('requirement_id'));
        } else {
            $requirement = new Requirement;
        }
        $requirement->fill($request->all());
        $requirement->save();
        return back();
    }
}

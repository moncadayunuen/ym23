<?php

namespace App\Http\Controllers;

use App\Career;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DownloadFileController extends Controller
{
    public function download(Career $career)
    {
        $file = str_replace('storage', 'public', $career->cv_file);
        $name = $career->name;
        return Storage::download($file,$name);
    }
}

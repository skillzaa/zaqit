<?php
namespace App\Http\Controllers;
use App\Models\DisplayHeading;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
public function index()
{
    $data['headings'] = DisplayHeading::all();
    return view('home')->with("data",$data);
}
}

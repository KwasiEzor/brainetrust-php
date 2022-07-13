<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:admin');
        // $this->middleware('role:super-admin');
    }

    public function index()
    {
        $agendas = Agenda::query()
            ->latest()
            ->paginate(10);
        return view('admin.dashboard', compact('agendas'));
    }

    public function getAgendasList()
    {
    }
}

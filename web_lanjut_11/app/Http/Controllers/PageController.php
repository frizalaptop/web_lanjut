<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalProducts = 0;
        return view('dashboard.index', compact(
        'totalCustomers',
        'totalProducts',
        ));
    }

    public function home()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }
    public function portfolio()
    {
        return view('portfolio');
    }
    public function contact()
    {
        return view('contact');
    }
}

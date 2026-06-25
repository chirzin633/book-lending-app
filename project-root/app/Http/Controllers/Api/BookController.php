<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return response()->json(Book::with('category')->get());
    }

    public function show($id)
    {
        return response()->json(Book::with('category')->findOrFail($id));
    }
}

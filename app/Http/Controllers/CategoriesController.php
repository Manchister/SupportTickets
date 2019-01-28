<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Ticket;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::paginate(10);

        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        $categories = Category::all();

        return view('categories.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
                'name'     => 'required',
            ]);

            $category = new Category([
                'name'     => $request->input('name'),
            ]);

            $category->save();

            return redirect()->back()->with("status", "Category $category->name has been created.");
    }

    public function destroy($category_id)
    {
        // $category->delete();
        // $category = Category::find(1)->name;
        Category::where('id', $category_id)->delete();
        return redirect()->back()->with("status", "Category has been deleted.");
    }
    

    public function category_tickets($category_id)
    {
        $tickets = Ticket::where('category_id', $category_id)->paginate(10);
        $category = Category::findOrFail($category_id)->name;

        return view('categories.tickets', compact('category','tickets'));
    }
}

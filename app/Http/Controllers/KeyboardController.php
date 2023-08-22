<?php 
namespace App\Http\Controllers;  

use App\Models\Shelf;
use App\Models\Keyboard;
use App\Models\Container;
use App\Models\Manufacturer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreKeyboardRequest;
use App\Http\Requests\Admin\UpdateKeyboardRequest;

class KeyboardController extends Controller
{ 
    function __construct()
    {
        $this->middleware('can:keyboard list', ['only' => ['index', 'show']]);
        $this->middleware('can:keyboard create', ['only' => ['create', 'store']]);
        $this->middleware('can:keyboard edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:keyboard delete', ['only' => ['destroy']]);
    }

    public function index(Manufacturer $manufacturers)
    {
        $keyboards = (new Keyboard)->newQuery();

        if (request()->has('search')) {
            $keyboards->where('model', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $keyboards->orderBy($attribute, $sort_order);
        } else {
            $keyboards->latest();
        }

        $keyboards = $keyboards->paginate(5);

        return view('items.keyboard.index', compact('keyboards', 'manufacturers'));
    }   
    
    public function create(Manufacturer $manufacturers, Container $containers, Shelf $shelves)
    {
        $position = ['Shelf', 'Container'];
        return view('items.keyboard.create', compact('position', 'manufacturers', 'containers', 'shelves'));
    }
   
    public function store(StoreKeyboardRequest $request)
    {
        $input = $request->all();

        if ($icon = $request->file('icon')) {
            $destinationPath = 'photo/';
            $productImage = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destinationPath, $productImage);
            $input['icon'] = "photo/$productImage";
        } 

        Keyboard::create($input);

        return redirect()->route('keyboard.index')
                        ->with('message', 'Keyboard created successfully.');
    }   

    public function show(Keyboard $keyboard)
    {
        return view('items.keyboard.show',compact('keyboard'));
    }

    public function edit(Keyboard $keyboard, Manufacturer $manufacturers, Container $containers, Shelf $shelves)
    {
        return view('items.keyboard.edit',compact('keyboard', 'manufacturers', 'containers', 'shelves'));
    }  

    public function update(UpdateKeyboardRequest $request, Keyboard $keyboard)
    {
        $input = $request->all();  

        if ($icon = $request->file('icon')) {
            $destinationPath = 'photo/';
            $productImage = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destinationPath, $productImage);
            $input['icon'] = "photo/$productImage";
        }else{
            unset($input['image']);
        } 

        $keyboard->update($input);

        return redirect()->route('keyboard.index')
                        ->with('message', 'Keyboard updated successfully.');
    }   

    public function destroy(Keyboard $keyboard)
    {
        $keyboard->delete();
        return redirect()->route('keyboard.index')
                        ->with('message', __('Keyboard deleted successfully'));
    }
}
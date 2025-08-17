<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Menampilkan semua menu
        $menus = Menu::with('category')->get();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        // Menampilkan form tambah menu
        $categories = Category::all();
        return view('menus.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi dan simpan menu baru
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'slug' => 'required|unique:menus',
            'price' => 'required|numeric',
            'status' => 'required',
        ]);
        Menu::create($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function show(Menu $menu)
    {
        // Menampilkan detail satu menu
        return view('menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        // Menampilkan form edit menu
        $categories = Category::all();
        return view('menus.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, Menu $menu)
    {
        // Validasi dan update menu
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'slug' => 'required|unique:menus,slug,' . $menu->id,
            'price' => 'required|numeric',
            'status' => 'required',
        ]);
        $menu->update($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu berhasil diupdate.');
    }

    public function destroy(Menu $menu)
    {
        // Hapus menu
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}
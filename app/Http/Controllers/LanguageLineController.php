<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LanguageLine;
use Illuminate\Http\Request;

class LanguageLineController extends Controller
{
    public function index()
    {
        $lines = LanguageLine::orderBy('group')->get();
        return view('backend.language-lines.index', compact('lines'));
    }

    public function create()
    {
        return view('backend.language-lines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'group' => 'required',
            'key' => 'required',
            'text.tr' => 'required',
            'text.en' => 'required',
            'text.sa' => 'required'
        ]);

        LanguageLine::create([
            'group' => $request->group,
            'key' => $request->key,
            'text' => [
                'tr' => $request->text['tr'],
                'en' => $request->text['en'],
                'sa' => $request->text['sa']
            ]
        ]);

        return redirect()->route('language-lines.index')->with('success', 'Çeviri başarıyla eklendi.');
    }

    public function edit(LanguageLine $languageLine)
    {
        return view('backend.language-lines.edit', compact('languageLine'));
    }

    public function update(Request $request, LanguageLine $languageLine)
    {
        $request->validate([
            'group' => 'required',
            'key' => 'required',
            'text.tr' => 'required',
            'text.en' => 'required',
            'text.sa' => 'required'
        ]);

        $languageLine->update([
            'group' => $request->group,
            'key' => $request->key,
            'text' => [
                'tr' => $request->text['tr'],
                'en' => $request->text['en'],
                'sa' => $request->text['sa']
            ]
        ]);

        return redirect()->route('language-lines.index')->with('success', 'Çeviri başarıyla güncellendi.');
    }

    public function destroy(LanguageLine $languageLine)
    {
        $languageLine->delete();
        return redirect()->route('language-lines.index')->with('success', 'Çeviri başarıyla silindi.');
    }
} 
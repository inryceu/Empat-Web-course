<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\PublisherRequest;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::withCount('games')->get();
        return view('publishers.index', compact('publishers'));
    }

    public function create()
    {
        return view('publishers.create');
    }

    public function store(PublisherRequest $request)
    {
        Publisher::create($request->validated());

        return redirect()->route('publishers.index')->with('success', 'Видавця успішно додано!');
    }

    public function show(Publisher $publisher)
    {
        $publisher->load('games.categories');
        return view('publishers.show', compact('publisher'));
    }

    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    public function update(PublisherRequest $request, Publisher $publisher)
    {
        $publisher->update($request->validated());

        return redirect()->route('publishers.index')->with('success', 'Дані видавця оновлено!');
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect()->route('publishers.index')->with('success', 'Видавця видалено!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Publisher;
use App\Models\Category;
use App\Http\Requests\GameRequest;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with(['publisher', 'categories'])
            ->withCount('categories')
            ->get();

        $totalGames = Game::count();
        $averagePrice = Game::avg('price');

        return view('games.index', compact('games', 'totalGames', 'averagePrice'));
    }

    public function create()
    {
        $publishers = Publisher::all();
        $categories = Category::all();

        return view('games.create', compact('publishers', 'categories'));
    }

    public function store(GameRequest $request)
    {
        $validated = $request->validated();

        $game = Game::create($validated);

        $game->categories()->attach($request->categories);

        return redirect()->route('games.index')->with('success', 'Гру успішно додано!');
    }

    public function show(Game $game)
    {
        $game->load(['publisher', 'categories']);
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('games.edit', compact('game', 'publishers', 'categories'));
    }

    public function update(GameRequest $request, Game $game)
    {
        $validated = $request->validated();

        $game->update($validated);

        $game->categories()->sync($request->categories);

        return redirect()->route('games.index')->with('success', 'Гру оновлено!');
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Гру видалено!');
    }
}

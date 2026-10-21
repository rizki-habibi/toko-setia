<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $query = Service::query()->where('is_active', true);

        if ($search = trim((string) $request->query('q', ''))) {
            $query->where(function ($builder) use ($search) {
                $builder->where('title', 'like', "%{$search}%")
                    ->orWhere('summary', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($category = trim((string) $request->query('kategori', ''))) {
            $query->where('category', $category);
        }

        $services = (clone $query)->orderByDesc('is_featured')->orderByDesc('orders_count')->paginate(8)->withQueryString();
        $categories = Service::query()->where('is_active', true)->distinct()->orderBy('category')->pluck('category');

        return view('home', compact('services', 'categories'));
    }
}

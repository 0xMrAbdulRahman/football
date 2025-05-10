<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\news\newsrequest;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function storeNews(newsrequest $request)
    {
        $new = $request->validated();
        $path = $request->image->store('news');
        $application['image'] = $path;
    
        $newupload = News::create($new);
        $success['title'] = $newupload->title;
        $success['success'] = true;
    
        return response()->json($success, 201);

      
    }

   
    public function adminIndex()
    {
        $news = News::where('status', 'pending')->get();

        return $news->map(function ($item) {
            $item->image_url = asset('storage/' . $item->image_path);
            return $item;
        });
    }

    
    public function publishNews($id)
    {
        $news = News::findOrFail($id);
        $news->status = 'published';
        $news->save();

        return response()->json(['message' => 'News published']);
    }

    public function rejectNews($id)
    {
        $news = News::findOrFail($id);
        if ($news->image_path) {
            \Storage::disk('public')->delete($news->image_path);
        }
        $news->delete();

        return response()->json(['message' => 'News rejected and deleted']);
    }

    
    public function home()
    {
        $news = News::where('status', 'published')->latest()->get();

        return $news->map(function ($item) {
            $item->image_url = asset('storage/' . $item->image_path);
            return $item;
        });
    }
}

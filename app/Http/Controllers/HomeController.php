<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\PublicationsType;
use App\Models\Publication;

class HomeController extends Controller
{
    public function types_index($slug){
        $type = PublicationsType::where('slug', $slug)->where('deleted_at', NULL)->first();
        $last_item = Publication::where('publications_type_id', $type->id)->first();
        if($type){
            return view('types-browse', compact('type', 'last_item'));
        }else{
            return redirect('/');
        }
    }

    public function types_list($type_id){
        $search = request('search') ?? null;
        $query_search = $search ? '(title like "%'.$search.'%" or tags like "%'.$search.'%" or description like "%'.$search.'%")' : 1;
        $list = Publication::where('publications_type_id', $type_id)
                    ->whereRaw($query_search)
                    ->orderBy('id', 'DESC')
                    ->paginate(10);
        return view('types-list', compact('list'));
    }
}

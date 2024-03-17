<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Culture;
use App\Models\Item;
use App\Models\Listing;
use App\Models\Location;
use App\Models\Post;
use App\Models\Specie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            // 'uno' => Post::all()
            'uno'=> Post::latest()->filter(request(['tag', 'search', 'affiliation', 'category']))->simplePaginate(9),
            'authors'=>User::all(),
       ]);
    }
    
    public function show(Post $theseVariablesMatch) {
        return view('posts.show', [
            'theseVariablesMatch' => $theseVariablesMatch,
            'author'=>Post::find($theseVariablesMatch->id)->user,
            'chInfo'=>Post::find($theseVariablesMatch->id)->characterInfo,
            'lInfo'=>Post::find($theseVariablesMatch->id)->locationInfo,
            'iInfo'=>Post::find($theseVariablesMatch->id)->itemInfo,
            'cuInfo'=>Post::find($theseVariablesMatch->id)->cultureInfo,
            'sInfo'=>Post::find($theseVariablesMatch->id)->specieInfo,
            'admins'=>User::all(),
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name'=>'required',
            'affiliation' =>'required',
            'category' =>'required',
            'universe' =>'required',
            'summary' =>'required',
            'tags'=>'required',
        ]);

        // remember Model->protected!!
        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }
        if($request->has('physicalDescription')) {
            $formFields['physicalDescription'] = $request->physicalDescription;
        }
        if($request->has('history')) {
            $formFields['history'] = $request->history;
        }

        if($request->category == 1) {
            if($request->has('age')) {
                $formFieldsMore['age'] = $request->age;
            }
            if($request->has('class')) {
                $formFieldsMore['class'] = $request->class;
            }
            if($request->has('subclass')) {
                $formFieldsMore['subclass'] = $request->subclass;
            }
            if($request->has('species')) {
                $formFieldsMore['species'] = $request->species;
            }

            $formFields['user_id'] = auth()->id();
            Post::create($formFields);
            $formFieldsMore['post_id'] = Post::latest()->first()->id;
            Character::create($formFieldsMore);
        }
        elseif($request->category == 2) {
            if($request->has('climate')) {
                $formFieldsMore['climate'] = $request->climate;
            }
            if($request->has('owner')) {
                $formFieldsMore['owner'] = $request->owner;
            }

            $formFields['user_id'] = auth()->id();
            Post::create($formFields);
            $formFieldsMore['post_id'] = Post::latest()->first()->id;
            Location::create($formFieldsMore);
        }
        elseif($request->category == 3) {
            if($request->has('owner')) {
                $formFieldsMore['owner'] = $request->owner;
            }

            $formFields['user_id'] = auth()->id();
            Post::create($formFields);
            $formFieldsMore['post_id'] = Post::latest()->first()->id;
            Item::create($formFieldsMore);
        }
        elseif($request->category == 4) {
            if($request->has('aspect')) {
                $formFieldsMore['climate'] = $request->climate;
            }
            if($request->has('region')) {
                $formFieldsMore['region'] = $request->region;
            }

            $formFields['user_id'] = auth()->id();
            Post::create($formFields);
            $formFieldsMore['post_id'] = Post::latest()->first()->id;
            Culture::create($formFieldsMore);
        }
        else {
            if($request->has('region')) {
                $formFieldsMore['region'] = $request->region;
            }

            $formFields['user_id'] = auth()->id();
            Post::create($formFields);
            $formFieldsMore['post_id'] = Post::latest()->first()->id;
            Specie::create($formFieldsMore);
        }
        return redirect('/')->with('message', 'It is posted!');
    }

    public function edit(Post $postO) {
        return view('posts.edit', [
            'postP' => $postO, 
            'oldC'=>Post::find($postO->id)->characterInfo,
            'oldL'=>Post::find($postO->id)->locationInfo,
            'oldI'=>Post::find($postO->id)->itemInfo,
            'oldCu'=>Post::find($postO->id)->cultureInfo,
            'oldS'=>Post::find($postO->id)->specieInfo,
        ]);
    }

    public function update(Request $request, Post $postO) {

        if($postO->user_id == auth()->id() || auth()->user()->admin) {
            $formFields = $request->validate([
                'name'=>'required',
                'affiliation' =>'required',
                'category' =>'required',
                'summary' =>'required',
                'tags'=>'required'
            ]);
    
            // remember Model->protected!!
            if($request->hasFile('image')) {
                $formFields['image'] = $request->file('image')->store('images', 'public');
            }
            if($request->has('physicalDescription')) {
                $formFields['physicalDescription'] = $request->physicalDescription;
            }
            if($request->has('history')) {
                $formFields['history'] = $request->history;
            }

            if($request->category == 1) {
                if($request->has('age')) {
                    $formFieldsMore['age'] = $request->age;
                }
                if($request->has('class')) {
                    $formFieldsMore['class'] = $request->class;
                }
                if($request->has('subclass')) {
                    $formFieldsMore['subclass'] = $request->subclass;
                }
                if($request->has('species')) {
                    $formFieldsMore['species'] = $request->species;
                }
    
                $postO->update($formFields);
                Post::find($postO->id)->characterInfo->update($formFieldsMore);
            }
            elseif($request->category == 2) {
                if($request->has('climate')) {
                    $formFieldsMore['climate'] = $request->climate;
                }
                if($request->has('owner')) {
                    $formFieldsMore['owner'] = $request->owner;
                }
    
                $postO->update($formFields);
                Post::find($postO->id)->locationInfo->update($formFieldsMore);
            }
            elseif($request->category == 3) {
                if($request->has('owner')) {
                    $formFieldsMore['owner'] = $request->owner;
                }
    
                $postO->update($formFields);
                Post::find($postO->id)->itemInfo->update($formFieldsMore);
            }
            elseif($request->category == 4) {
                if($request->has('aspect')) {
                    $formFieldsMore['climate'] = $request->climate;
                }
                if($request->has('region')) {
                    $formFieldsMore['region'] = $request->region;
                }
    
                $postO->update($formFields);
                Post::find($postO->id)->cultureInfo->update($formFieldsMore);
            }
            else {
                if($request->has('region')) {
                    $formFieldsMore['region'] = $request->region;
                }
    
                $postO->update($formFields);
                Post::find($postO->id)->specieInfo->update($formFieldsMore);
            }
    
            return back()->with('message', 'It is posted!');
        }

        // make sure logged in user is author
        else {
            abort(403, 'Unauthorized Action');
        }

    }

    public function destroy(Post $postO) {
        if($postO->user_id == auth()->id() || auth()->user()->admin) {
            $postO->delete();
            return redirect('/');
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    public function manage() {
        return view('users.profile', [
            'posts' => auth()->user()->posts()->get(),
            'users' =>User::all(),
        ]);
    }

    public function purge(User $goner) {

        if(! auth()->user()->admin) {
            abort(403, 'Unauthorized Action');
        }
        if(auth()->user()->id==$goner->id) {
            abort(403, 'It is tempting but NO');
        }

        $goner->delete();
        return redirect('/profile');
    }


}

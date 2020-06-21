<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{


    public function index()
    {
        $users = Auth::user();
        $wishlists = Wishlist::where("user_id", "=", $users->id)->orderby('id', 'desc')->paginate(10);
        return view('frontend.wishlist', compact('users', 'wishlists'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, array(
            'user_id' => 'required',
            'product_id' => 'required',
        ));


        $status = Wishlist::where('user_id', Auth::user()->id)
            ->where('product_id', $request->product_id)
            ->first();

        if (isset($status->user_id) and isset($request->product_id)) {
            return redirect()->route('wishlist.index')->with('success', 'This item is already in your wishlist!');
        } else {
            $wishlist = new Wishlist();

            $wishlist->user_id = $request->user_id;
            $wishlist->product_id = $request->product_id;
            $wishlist->save();
//            dd($wishlist);

            return redirect()->route('wishlist.index')->with('flash_message',
                'Item, ' . $wishlist->product->name . ' Added to your wishlist.');
        }

    }


    public function show(Wishlist $wishlist)
    {
        //
    }

    public function edit(Wishlist $wishlist)
    {
        //
    }


    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }


    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->route('wishlist.index')
            ->with('anshu', 'Item successfully deleted');

    }

}

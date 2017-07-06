<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Auth;

class UserFollowsController extends Controller
{
    protected $user;

    /**
     * UserFollowsController constructor.
     *
     * @param $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    //判断用户是否被关注
    public function index($id)
    {
        $user = $this->user->find($id);
        $followers = $user->followers()->pluck('follower_id')->toArray();
        if (in_array(Auth::guard('api')->id(), $followers)) {
            return response()->json(['followed' => true]);
        }
        return response()->json(['followed' => false]);
    }

    //关注用户
    public function follow(Request $request)
    {
        $user = $this->user->find($request->get('user'));

        $followed = Auth::guard('api')->user()->followThisUser($user);

        if (count($followed['attached']) > 0) {
            $user->increment('followers_count');
            Auth::guard('id')->user()->increment('followings_count');
            return response()->json(['followed' => true]);
        }

        $user->decrement('followers_count');
        Auth::guard('id')->user()->decrement('followings_count');
        return response()->json(['followed' => false]);
    }
}

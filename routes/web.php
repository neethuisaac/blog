<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NewsletterController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Services\Newsletter;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('ping',function(){
    //dd(time());
    //dd(date('d m Y g:i:s a'));
    //require_once '/path/to/MailchimpMarketing/vendor/autoload.php';

    //dd(config('services.mailchimp.key'));
    $client = new MailchimpMarketing\ApiClient();
    $client->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us6',
    ]);

    //$response = $client->ping->get();
    //$response = $client->lists->getAllLists();
    //dd(config('services.mailchimp.list_id'));
    $response = $client->lists->addListMember(config('services.mailchimp.list_id'), [
        "email_address" => "neethuisaac.feb5@gmail.com",
        "status" => "subscribed",
        "timestamp_signup" => '',
    ]);
    ddd($response);

});
Route::post('newsletter',NewsletterController::class);
Route::get('playground',function(){
    return view('playground');
});
Route::get('/', [PostController::class,'index'])->name('home'); // A named route
Route::get('home', function () {
    return view('home');
});
Route::get('posts/{post}',[PostController::class,'show'])->where('post','[A-z\-]+');
/*Route::get('posts/{post}',function(Post $post){
    return view('posts.show',[
        'post' => $post,
    ]);
});*/
Route::get('authors/{author:username}',function(User $author){
    return view('posts.index',[
        'posts' => $author->posts->load(['author','category']),
        'categories' => Category::all(),

    ]);
});
Route::get('categories/{category:slug}',function(Category $category){
    //dd($category);
    return view('posts.index',[
        'posts' => $category->posts,
        'categories' => Category::all(),
        'currentCategory' => $category
    ]);
});

Route::post('posts/{post:slug}/comments',[PostCommentsController::class,'store']);
Route::post('comments/store',[CommentController::class,'store']);
Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('login',[SessionsController::class,'store'])->middleware('guest');
Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');

Route::get('admin/posts/create',[PostController::class,'create'])->middleware('admin');
Route::get('admin/posts/',[AdminPostController::class,'index'])->middleware('admin');
Route::post('admin/posts/',[PostController::class,'store'])->middleware('admin');
Route::get('json',function(){
    return json_encode(['name'=>'neethu','age'=>23]);
});

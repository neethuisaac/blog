<?php
namespace app\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post{
    public function __construct(public $title,public $slug,public $excerpt,public $date,public $body){
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }
    public static function all(){
        $posts = cache()->rememberForever("posts.all",function(){
            return collect(File::files(resource_path("posts/")))
                ->map(function($file){
                    //return (string)$path;
                    return YamlFrontMatter::parseFile($file);
                })
                ->map(function($document){
                    //$document = YamlFrontMatter::parseFile($file);
                    return new Post(
                        $document->title,
                        $document->slug,
                        $document->excerpt,
                        $document->date,
                        $document->body()
                    );
                })->sortByDesc('date');
        });
        //ddd($posts);
        return $posts;
    }
    public static function find($slug){
        //of all the blog posts, find the one with the requested slug
        return static::all()->firstWhere('slug',$slug);
    }
    public static function findOrFail($slug){
        $post = static::find($slug);
        if(!$post){
            throw new ModelNotFoundException;
        }
    }
}
?>

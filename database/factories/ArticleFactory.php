<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Article;
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
        protected $model = Article::class;

    public function definition()
    {
          return [
            'title'=>$this->faker->sentence,
            'content'=>$this->faker->paragraph,
            'user_id' => User::pluck('id')->random()
        ];
    }
    //  public function configure()
    // {
    //     return $this->afterCreating(function (Article $newArticle) { 
    //         $Image = \App\Models\Image::create([ 'article_id' => $newArticle->id, 'url' => 'article-image/'.$this->faker->image('public/article-image',640,480, null, false)]); 
    //     }); 

        
    // } 
     public function configure()
    {
        return $this->afterMaking(function (Article $article) {
            //
        })->afterCreating(function (Article $article) {
              $Image = \App\Models\Image::create([ 'article_id' => $article->id, 'url' =>$this->faker->image('public/article-image',640,480, null, false)]); 
  
        });
    }
   
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Article;
use App\Models\Category;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_all_articles()
    {
        $response = $this->get('/articles');
        $response->assertStatus(200);
        $response->assertViewIs('articles.index');
    }

    public function test_can_create_an_article()
    {
        $category = Category::factory()->create();

        $data = [
            'title' => 'Test Article',
            'content' => 'This is a test article',
            'category_id' => $category->id,
        ];

        $response = $this->post('/articles', $data);
        $response->assertStatus(302);
        $response->assertRedirect('/articles');

        $this->assertDatabaseHas('articles', $data);
    }

    public function test_can_view_single_article()
    {
        $article = Article::factory()->create();

        $response = $this->get("/articles/{$article->id}");
        $response->assertStatus(200);
        $response->assertViewIs('articles.show');
        $response->assertViewHas('article', $article);
    }

    public function test_can_update_an_article()
    {
        $article = Article::factory()->create();
        $category = Category::factory()->create();

        $data = [
            'title' => 'Updated Article',
            'content' => 'This is an updated article',
            'category_id' => $category->id,
        ];

        $response = $this->put("/articles/{$article->id}", $data);
        $response->assertStatus(302);
        $response->assertRedirect('/articles');

        $this->assertDatabaseHas('articles', $data);
    }

    public function test_can_delete_an_article()
    {
        $article = Article::factory()->create();

        // Delete the article
        $response = $this->delete(route('articles.destroy', $article->id));

        // Assert the response status code
        $response->assertStatus(302);

        // Assert that the article has been deleted from the database
        $this->assertDatabaseMissing('articles', [
            'id' => $article->id,
        ]);
    }
}

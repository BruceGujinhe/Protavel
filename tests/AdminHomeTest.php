<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminHomeTest extends TestCase
{
    /**
     * 测试文章点击
     *
     * @return void
     */
    public function testClickArticle()
    {
        $this->visit('/admin/')// 访问 "/admin/"
             ->seeLink('文章', '/admin/article')//验证是否有 "文章" 链接
             ->click('文章')// 点击 "文章" 链接
             ->seePageIs('/admin/article')// 验证是否为 "/admin/article"
             ->assertResponseOk();// 验证状态码是否为 "200"
    }

    /**
     * 测试文章创建
     *
     * @return void
     */
    public function testCreateArticle()
    {
        $user = App\Admin::find(1);// 寻找第一个Admin用户

        /* 创建 Faker 实例 */
        $faker         = Faker\Factory::create();
        $faker_title   = $faker->title;
        $faker_content = implode('', $faker->paragraphs(random_int(1, 5)));

        $this->actingAs($user)// 认证测试用户
             ->visit('admin/article/create')// 访问 文章创建 页
             ->type($faker_title, 'title')// title 输入测试数据
             ->press('提交')// 模拟点击 提交
             ->dontSee('The title field is required.')// 验证是否输入成功
             ->assertResponseOk();// 验证状态码是否为 "200"

        $this->actingAs($user)// 认证测试用户
             ->visit('admin/article/create')// 访问 文章创建 页
             ->type($faker_content, 'content')// content 输入测试数据
             ->press('提交')// 模拟点击 提交
             ->dontSee('The content field is required.')// 验证是否输入成功
             ->assertResponseOk();// 验证状态码是否为 "200"

        $this->actingAs($user)// 认证测试用户
             ->visit('admin/article/create')// 访问 文章创建 页
             ->type($faker_title, 'title')// title 输入测试数据
             ->type($faker_content, 'content')// content 输入测试数据
             ->press('提交')// 模拟点击 提交
             ->dontSee('The title field is required.')// 验证是否输入成功
             ->dontSee('The content field is required.')// 验证是否输入成功
             ->assertResponseOk();// 验证状态码是否为 "200"
    }

    /**
     * 测试Admin账户创建
     *
     * @return void
     */
    public function testCreateAdmin()
    {
        /* 创建3个Admin实例 */
        $admins = factory(App\Admin::class, 3)->make();

        /* 测试是否为3个实例 */
        $this->assertEquals(3, count($admins));
    }

    /**
     * 测试用户认证
     *
     * @return void
     */
    public function testAdmin()
    {
        $user = App\Admin::find(1);// 寻找第一个Admin用户

        $this->actingAs($user)// 认证测试用户
             ->visit('/admin/')// 访问 "Admin" 页
             ->see($user->nickname)// 测试是否包含 用户昵称
             ->assertResponseOk();// 验证状态码是否为 "200"
    }

    /**
     * 测试文章查看
     *
     * @return void
     */
    public function testSeeArticle()
    {
        $article = App\Article::all()->random(1);// 随机寻找一个文章

        $this->visit('/admin/article/' . $article->id)// 访问 文章查看 页
             ->see($article->title)// 测试是否包含 文章标题
             ->assertResponseOk();// 验证状态码是否为 "200"
    }

    /**
     * 测试文章修改
     *
     * @return void
     */
    public function testEditArticle()
    {
        /* 创建 Faker 实例 */
        $faker         = Faker\Factory::create();
        $faker_title   = $faker->title;
        $faker_content = implode('', $faker->paragraphs(random_int(1, 5)));

        $article = App\Article::all()->random(1);// 随机寻找一个文章

        $this->visit('/admin/article/' . $article->id . '/edit')// 访问 文章编辑 页
             ->see($article->title)
             ->type($faker_title, 'title')// title 输入测试数据
             ->type($faker_content, 'content')// content 输入测试数据
             ->press('提交')// 模拟点击 提交
             ->seePageIs('/admin/article/' . $article->id)// 测试是否提交成功
             ->assertResponseOk();// 验证状态码是否为 "200"

        /* 获取刚修改的文章实例 */
        $test_article = \App\Article::find($article->id);

        /* 对比修改的标题 */
        $this->assertEquals($faker_title, $test_article->title);
    }

    /**
     * 测试文章删除
     *
     * @return void
     */
    public function testDeleteArticle()
    {
        /* 停用中间件，忽略认证 */
        $this->withoutMiddleware();

        $article = App\Article::all()->random(1);// 随机寻找一个文章
        $this->call('DELETE', '/admin/article/' . $article->id)// 提交删除请求
             ->isRedirection();// 验证是否重定向

        /* 获取刚删除的文章实例 */
        $test_article = \App\Article::find($article->id);

        $this->assertNull($test_article);// 验证是否被删除
    }
}

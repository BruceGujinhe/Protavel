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
        /* 停用中间件，忽略认证 */
        $this->withoutMiddleware();

        $this->visit('/admin/')// 访问 "/admin/"
             ->seeLink('文章', '/admin/article')//验证是否有 "文章" 链接
             ->click('文章')// 点击 "文章" 链接
             ->seePageIs('/admin/article')// 验证是否为 "/admin/article"
             ->assertResponseStatus(200);// 验证状态码是否为 "200"
    }

    public function testCreateArticle()
    {
        /* 创建 Faker 实例 */
        $faker = Faker\Factory::create();

        $this->visit('admin/article/create')// 访问 文章创建 页
             ->type($faker->title, 'title')// title 输入测试数据
             ->press('提交')// 模拟点击 提交
             ->dontSee('The title field is required.');// 验证是否输入成功
    }

    public function testCreateAdmin()
    {
        /* 创建3个Admin实例 */
        $admins = factory(App\Admin::class, 3)->create();

        /* 测试是否为3个实例 */
        $this->assertEquals(3, count($admins));
    }
}

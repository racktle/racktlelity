<?php

namespace Tests\Feature;

use Tests\TestCase;

class CoursePagesTest extends TestCase
{
    public function test_landing_page_links_have_standalone_page_files(): void
    {
        $pages = [
            'login/index.html',
            'register/index.html',
            'dashboard/index.html',
            'kelas/video-editing/index.html',
            'kelas/3d-modeling/index.html',
            'kelas/pixel-art/index.html',
            'kelas/game-programming/index.html',
        ];

        foreach ($pages as $page) {
            $this->assertFileExists(base_path($page));
        }
    }

    public function test_landing_page_authentication_links_open_real_pages(): void
    {
        $this->get('/login')->assertOk()->assertSee('Masuk ke akunmu');
        $this->get('/register')->assertOk()->assertSee('Mulai perjalananmu');
    }

    public function test_each_landing_page_course_has_a_detail_page(): void
    {
        $courses = [
            '/kelas/video-editing' => 'Video Editing',
            '/kelas/3d-modeling' => '3D Modeling',
            '/kelas/pixel-art' => 'Pixel Art',
            '/kelas/game-programming' => 'Game Programming',
        ];

        foreach ($courses as $url => $title) {
            $this->get($url)
                ->assertOk()
                ->assertSee($title)
                ->assertSee('Yang akan kamu pelajari')
                ->assertSee('/register');
        }
    }

    public function test_unknown_course_slug_returns_not_found(): void
    {
        $this->get('/kelas/kelas-tidak-ada')->assertNotFound();
    }
}

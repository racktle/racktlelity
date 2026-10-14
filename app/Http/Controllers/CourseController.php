<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CourseController extends Controller
{
    private const COURSES = [
        'video-editing' => [
            'title' => 'Video Editing',
            'category' => 'Visual storytelling',
            'icon' => 'bi-camera-reels',
            'summary' => 'Rangkai footage, warna, dan suara menjadi cerita yang menarik.',
            'description' => 'Pelajari proses editing video dari menata bahan hingga mengekspor hasil akhir. Bangun alur cerita yang kuat dan buat video yang terasa utuh.',
            'level' => 'Pemula',
            'duration' => '4 modul',
            'modules' => [
                'Mengenal alur kerja dan menyiapkan footage',
                'Memotong klip dan menyusun cerita',
                'Mengolah warna, audio, dan transisi',
                'Mengekspor video untuk berbagai platform',
            ],
            'outcomes' => [
                'Menyusun footage menjadi cerita yang runtut',
                'Menggunakan potongan, transisi, dan audio secara tepat',
                'Menyelesaikan video pendek siap dibagikan',
            ],
        ],
        '3d-modeling' => [
            'title' => '3D Modeling',
            'category' => 'Bentuk & ruang',
            'icon' => 'bi-box',
            'summary' => 'Ubah sketsa dan imajinasi menjadi objek tiga dimensi.',
            'description' => 'Kenali dasar ruang 3D dan cara membentuk objek digital. Mulai dari bentuk sederhana hingga model yang siap ditampilkan.',
            'level' => 'Pemula',
            'duration' => '4 modul',
            'modules' => [
                'Mengenal workspace dan navigasi 3D',
                'Membangun bentuk dengan objek dasar',
                'Menambahkan material dan pencahayaan',
                'Merender model menjadi gambar akhir',
            ],
            'outcomes' => [
                'Memahami sumbu, perspektif, dan navigasi 3D',
                'Membentuk dan mengatur objek digital sederhana',
                'Membuat render dasar dengan material dan cahaya',
            ],
        ],
        'pixel-art' => [
            'title' => 'Pixel Art',
            'category' => 'Seni berpiksel',
            'icon' => 'bi-grid-3x3-gap',
            'summary' => 'Kenali warna, bentuk, dan karakter lewat seni piksel.',
            'description' => 'Latih kepekaan visual dengan batasan grid dan palet warna. Buat aset pixel art yang ekspresif, rapi, dan konsisten.',
            'level' => 'Pemula',
            'duration' => '4 modul',
            'modules' => [
                'Mengenal kanvas, grid, dan ukuran sprite',
                'Membentuk siluet dan proporsi karakter',
                'Memilih palet dan menambahkan shading',
                'Membuat sprite sheet sederhana',
            ],
            'outcomes' => [
                'Membuat siluet yang mudah dikenali',
                'Menggunakan palet warna dan shading sederhana',
                'Menghasilkan sprite karakter atau objek',
            ],
        ],
        'game-programming' => [
            'title' => 'Game Programming',
            'category' => 'Logika & bermain',
            'icon' => 'bi-controller',
            'summary' => 'Pelajari logika pemrograman dengan membuat game sendiri.',
            'description' => 'Mulai memahami cara game bekerja lewat konsep pemrograman yang mudah diikuti. Susun aturan, kendali, dan tantangan menjadi permainan sederhana.',
            'level' => 'Pemula',
            'duration' => '4 modul',
            'modules' => [
                'Mengenal logika dan komponen dasar game',
                'Membuat input pemain dan gerakan karakter',
                'Menambahkan aturan, skor, dan kondisi menang',
                'Menguji dan menyelesaikan game mini',
            ],
            'outcomes' => [
                'Memahami urutan logika dalam permainan',
                'Membuat karakter bergerak berdasarkan input',
                'Membangun game mini dengan aturan dan skor',
            ],
        ],
    ];

    public static function catalog(): array
    {
        return self::COURSES;
    }

    public function show(string $slug): View
    {
        $courses = self::catalog();
        abort_unless(isset($courses[$slug]), 404);

        $course = $courses[$slug];
        $course['slug'] = $slug;

        $relatedCourses = collect($courses)
            ->except($slug)
            ->map(fn (array $relatedCourse, string $relatedSlug): array => [
                ...$relatedCourse,
                'slug' => $relatedSlug,
            ]);

        return view('courses.show', [
            'course' => $course,
            'relatedCourses' => $relatedCourses,
        ]);
    }
}

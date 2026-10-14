<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class WebsiteContentSeeder extends Seeder
{
    /**
     * Demo banners, gallery, and testimonials. Safe to re-run.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'display_name' => 'Rahima Akter (Demo)',
                'display_role' => 'Fictional patient, Dhaka',
                'quote' => 'The demo website made it easy to see departments and request a sample appointment. This quote is fictional.',
                'rating' => 5,
            ],
            [
                'display_name' => 'Mahmud Hasan (Demo)',
                'display_role' => 'Fictional visitor',
                'quote' => 'I used the demo cardiology page to review doctor profiles. Not a real patient experience.',
                'rating' => 5,
            ],
            [
                'display_name' => 'Nusrat Jahan (Demo)',
                'display_role' => 'Fictional parent',
                'quote' => 'The pediatrics section on this prototype was clear and calm. Demo testimonial only.',
                'rating' => 4,
            ],
            [
                'display_name' => 'Sajid Khan (Demo)',
                'display_role' => 'Fictional outpatient',
                'quote' => 'Booking slots in the demo appointment flow felt straightforward. Fictional review.',
                'rating' => 5,
            ],
            [
                'display_name' => 'Lamia Chowdhury (Demo)',
                'display_role' => 'Fictional package guest',
                'quote' => 'Health package cards helped me compare demo prices. Not an actual checkup review.',
                'rating' => 4,
            ],
            [
                'display_name' => 'Tareq Islam (Demo)',
                'display_role' => 'Fictional emergency visitor',
                'quote' => 'The emergency phone in the top bar stood out. This is sample copy for the hospital website.',
                'rating' => 5,
            ],
        ];

        foreach ($testimonials as $index => $testimonial) {
            Testimonial::query()->updateOrCreate(
                ['display_name' => $testimonial['display_name']],
                [
                    'display_role' => $testimonial['display_role'],
                    'quote' => $testimonial['quote'],
                    'rating' => $testimonial['rating'],
                    'photo' => DemoContent::image($testimonial['display_name'], 200, 200),
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ],
            );
        }

        $gallery = [
            ['title' => 'Main lobby (demo)', 'album' => 'Facilities', 'caption' => 'Placeholder lobby image for the gallery grid.'],
            ['title' => 'OPD corridor (demo)', 'album' => 'Facilities', 'caption' => 'Fictional outpatient corridor.'],
            ['title' => 'Consultation room (demo)', 'album' => 'Facilities', 'caption' => 'Sample consultation-room placeholder.'],
            ['title' => 'Laboratory desk (demo)', 'album' => 'Diagnostics', 'caption' => 'Demo laboratory photo placeholder.'],
            ['title' => 'Community health day (demo)', 'album' => 'Events', 'caption' => 'Fictional event photo for the Events album.'],
            ['title' => 'Nursing station (demo)', 'album' => 'Facilities', 'caption' => 'Placeholder used for masonry layout testing.'],
        ];

        foreach ($gallery as $index => $item) {
            Gallery::query()->updateOrCreate(
                ['title' => $item['title']],
                [
                    'image' => DemoContent::image($item['title']),
                    'caption' => $item['caption'],
                    'album' => $item['album'],
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ],
            );
        }

        $banners = [
            [
                'title' => 'Trusted Care for Every Family',
                'subtitle' => 'Lakeside General Hospital (Demo) — a prototype website, not a real clinic.',
                'cta_label' => 'Book Appointment',
                'cta_url' => '/appointments',
                'placement' => 'hero',
            ],
            [
                'title' => '24/7 Emergency Desk',
                'subtitle' => 'Demo emergency number: +880 1700-911911 (fictional).',
                'cta_label' => 'Emergency Info',
                'cta_url' => '/emergency',
                'placement' => 'emergency',
            ],
            [
                'title' => 'Executive Health Checkup',
                'subtitle' => 'Explore fictional packages built for the homepage cards.',
                'cta_label' => 'View Packages',
                'cta_url' => '/health-packages',
                'placement' => 'promo',
            ],
            [
                'title' => 'Meet Our Demo Consultants',
                'subtitle' => 'Fifteen fictional doctor profiles for directory and appointment tests.',
                'cta_label' => 'Find a Doctor',
                'cta_url' => '/doctors',
                'placement' => 'hero',
            ],
        ];

        foreach ($banners as $index => $banner) {
            Banner::query()->updateOrCreate(
                ['title' => $banner['title']],
                [
                    'subtitle' => $banner['subtitle'],
                    'image' => DemoContent::image($banner['title'], 1600, 700),
                    'cta_label' => $banner['cta_label'],
                    'cta_url' => $banner['cta_url'],
                    'placement' => $banner['placement'],
                    'is_active' => true,
                    'sort_order' => $index + 1,
                    'starts_at' => null,
                    'ends_at' => null,
                ],
            );
        }
    }
}

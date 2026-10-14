<?php

namespace Database\Seeders;

use App\Models\HealthPackage;
use App\Models\HealthPackageItem;
use Illuminate\Database\Seeder;

class HealthPackageSeeder extends Seeder
{
    /**
     * Development/demo packages. Safe to re-run by slug.
     */
    public function run(): void
    {
        $packages = [
            [
                'title' => 'Basic Health Checkup',
                'slug' => 'basic-health-checkup',
                'price' => 3500,
                'duration_label' => 'Same day',
                'featured' => true,
                'description' => 'Entry-level screening package for the demo website. Prices are fictional.',
                'items' => ['Doctor consultation (demo)', 'CBC', 'Blood sugar (fasting)', 'Urine R/E', 'Blood pressure check'],
            ],
            [
                'title' => 'Executive Health Checkup',
                'slug' => 'executive-health-checkup',
                'price' => 12500,
                'duration_label' => 'Half day',
                'featured' => true,
                'description' => 'Broader demo package used on the homepage cards. Not a real clinical offer.',
                'items' => ['Consultant review', 'CBC & lipid profile', 'Liver function tests', 'Kidney function tests', 'ECG', 'Chest X-ray', 'Ultrasound whole abdomen'],
            ],
            [
                'title' => 'Diabetes Screening',
                'slug' => 'diabetes-screening',
                'price' => 4500,
                'duration_label' => '2 hours',
                'featured' => false,
                'description' => 'Demo diabetes-focused labs and counselling listing.',
                'items' => ['HbA1c', 'Fasting blood sugar', '2-hour after meal sugar', 'Urine microalbumin', 'Diet counselling session (demo)'],
            ],
            [
                'title' => 'Cardiac Health Checkup',
                'slug' => 'cardiac-health-checkup',
                'price' => 8900,
                'duration_label' => 'Half day',
                'featured' => true,
                'description' => 'Cardiology-oriented demo package linked from the Cardiology department page.',
                'items' => ['Cardiology consultation (demo)', 'ECG', 'Echo (demo listing)', 'Lipid profile', 'Blood pressure monitoring'],
            ],
            [
                'title' => "Women's Health Checkup",
                'slug' => 'womens-health-checkup',
                'price' => 7500,
                'duration_label' => 'Half day',
                'featured' => false,
                'description' => 'Fictional women’s health package for Gynecology page testing.',
                'items' => ['Gynecology consultation (demo)', 'CBC', 'TSH', 'Ultrasound pelvis', 'Pap smear counselling (demo)'],
            ],
        ];

        foreach ($packages as $index => $package) {
            $record = HealthPackage::query()->updateOrCreate(
                ['slug' => $package['slug']],
                [
                    'title' => $package['title'],
                    'price' => $package['price'],
                    'duration_label' => $package['duration_label'],
                    'description' => $package['description'].' '.DemoContent::DISCLAIMER,
                    'image' => DemoContent::image($package['title']),
                    'is_featured' => $package['featured'],
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ],
            );

            foreach ($package['items'] as $itemIndex => $title) {
                HealthPackageItem::query()->updateOrCreate(
                    [
                        'health_package_id' => $record->id,
                        'title' => $title,
                    ],
                    ['sort_order' => $itemIndex + 1],
                );
            }
        }
    }
}

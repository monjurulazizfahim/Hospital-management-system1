<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Development/demo services. Safe to re-run by slug.
     */
    public function run(): void
    {
        $services = [
            ['title' => 'Emergency Care', 'slug' => 'emergency-care', 'department' => null, 'featured' => true, 'summary' => '24/7 emergency desk for urgent assessment (demo listing).'],
            ['title' => 'ICU', 'slug' => 'icu', 'department' => 'general-medicine', 'featured' => true, 'summary' => 'Intensive care unit information page for the demo hospital.'],
            ['title' => 'CCU', 'slug' => 'ccu', 'department' => 'cardiology', 'featured' => true, 'summary' => 'Cardiac care unit overview used in the demo services grid.'],
            ['title' => 'NICU', 'slug' => 'nicu', 'department' => 'pediatrics', 'featured' => true, 'summary' => 'Neonatal intensive care information for the demo website.'],
            ['title' => 'Ambulance', 'slug' => 'ambulance', 'department' => null, 'featured' => true, 'summary' => 'Ambulance request contact block for the demo homepage.'],
            ['title' => 'Laboratory', 'slug' => 'laboratory', 'department' => 'general-medicine', 'featured' => false, 'summary' => 'Pathology and sample collection listing (fictional).'],
            ['title' => 'ECG', 'slug' => 'ecg', 'department' => 'cardiology', 'featured' => false, 'summary' => 'Electrocardiogram service card for cardiology pages.'],
            ['title' => 'X-Ray', 'slug' => 'x-ray', 'department' => 'orthopedics', 'featured' => false, 'summary' => 'Digital X-ray listing for the demo radiology group.'],
            ['title' => 'Ultrasound', 'slug' => 'ultrasound', 'department' => 'gynecology-obstetrics', 'featured' => false, 'summary' => 'Ultrasound appointment information for the demo site.'],
            ['title' => 'CT Scan', 'slug' => 'ct-scan', 'department' => 'neurology', 'featured' => false, 'summary' => 'CT imaging page used to test service-department links.'],
            ['title' => 'MRI', 'slug' => 'mri', 'department' => 'neurology', 'featured' => false, 'summary' => 'MRI service copy for the demo diagnostics section.'],
            ['title' => 'Physiotherapy', 'slug' => 'physiotherapy', 'department' => 'orthopedics', 'featured' => false, 'summary' => 'Rehabilitation clinic listing for the demo hospital.'],
            ['title' => 'Pharmacy', 'slug' => 'pharmacy', 'department' => null, 'featured' => false, 'summary' => 'In-house pharmacy hours for the fictional facility.'],
            ['title' => 'Blood Bank', 'slug' => 'blood-bank', 'department' => null, 'featured' => false, 'summary' => 'Blood bank contact block for emergency CTA testing.'],
            ['title' => 'Health Checkup', 'slug' => 'health-checkup', 'department' => 'general-medicine', 'featured' => true, 'summary' => 'Entry point to demo health packages from services.'],
        ];

        foreach ($services as $index => $service) {
            $departmentId = null;

            if ($service['department']) {
                $departmentId = Department::query()->where('slug', $service['department'])->value('id');
            }

            Service::query()->updateOrCreate(
                ['slug' => $service['slug']],
                [
                    'department_id' => $departmentId,
                    'title' => $service['title'],
                    'summary' => $service['summary'],
                    'body' => '<p>'.$service['summary'].'</p><p>'.DemoContent::DISCLAIMER.'</p>',
                    'icon' => $service['slug'],
                    'image' => DemoContent::image($service['title']),
                    'is_featured' => $service['featured'],
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ],
            );
        }
    }
}

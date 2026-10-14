<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Development/demo departments. Safe to re-run by slug.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Cardiology',
                'slug' => 'cardiology',
                'icon' => 'heart',
                'is_featured' => true,
                'description' => 'Heart and blood-vessel care, including clinics for chest pain, hypertension, and follow-up after cardiac events. Full demo description: the Cardiology department of Lakeside General Hospital (Demo) showcases outpatient consultation, ECG, and coordinated referrals. This is fictional content for the website prototype.',
            ],
            [
                'name' => 'Neurology',
                'slug' => 'neurology',
                'icon' => 'brain',
                'is_featured' => true,
                'description' => 'Assessment of headache, stroke risk, seizure, and nerve-related symptoms. Full demo description: Neurology at this fictional hospital supports consultant clinics and education content for the public website. Not a real clinical service.',
            ],
            [
                'name' => 'Orthopedics',
                'slug' => 'orthopedics',
                'icon' => 'bone',
                'is_featured' => false,
                'description' => 'Bone, joint, and sports-injury clinics, including fracture follow-up. Full demo description: Orthopedics pages demonstrate department cards, doctor listings, and appointment routing in the demo system.',
            ],
            [
                'name' => 'Gynecology & Obstetrics',
                'slug' => 'gynecology-obstetrics',
                'icon' => 'person',
                'is_featured' => true,
                'description' => 'Women’s health, antenatal visits, and gynecology consultations. Full demo description: this fictional department is used to test package pages and specialist profiles. Seek real obstetric care from licensed providers.',
            ],
            [
                'name' => 'Pediatrics',
                'slug' => 'pediatrics',
                'icon' => 'baby',
                'is_featured' => true,
                'description' => 'Child health clinics for growth, vaccination counselling, and common childhood illness follow-up. Full demo description: Pediatrics content on this demo site is educational website copy only.',
            ],
            [
                'name' => 'General Medicine',
                'slug' => 'general-medicine',
                'icon' => 'stethoscope',
                'is_featured' => false,
                'description' => 'First-point consultant care for fever, diabetes review, and general adult medicine. Full demo description: used as a default department for mixed demo appointments.',
            ],
            [
                'name' => 'General Surgery',
                'slug' => 'general-surgery',
                'icon' => 'scalpel',
                'is_featured' => false,
                'description' => 'Surgical consultation and pre-operative assessment (demo listing). Full demo description: no real operations are scheduled in this development database.',
            ],
            [
                'name' => 'Dermatology',
                'slug' => 'dermatology',
                'icon' => 'sparkles',
                'is_featured' => false,
                'description' => 'Skin, hair, and allergy-related outpatient clinics. Full demo description: fictional dermatology service used for directory and appointment filters.',
            ],
            [
                'name' => 'ENT',
                'slug' => 'ent',
                'icon' => 'ear',
                'is_featured' => false,
                'description' => 'Ear, nose, and throat consultations, including sinus and hearing-related visits. Full demo description: ENT is included so the public departments grid has a complete demo set.',
            ],
            [
                'name' => 'Urology',
                'slug' => 'urology',
                'icon' => 'activity',
                'is_featured' => false,
                'description' => 'Urinary and men’s health consultant clinics. Full demo description: fictional urology department for website navigation and doctor assignment tests.',
            ],
        ];

        foreach ($departments as $index => $department) {
            Department::query()->updateOrCreate(
                ['slug' => $department['slug']],
                [
                    'name' => $department['name'],
                    'description' => $department['description'].' '.DemoContent::DISCLAIMER,
                    'icon' => $department['icon'],
                    'image' => DemoContent::image($department['name']),
                    'is_featured' => $department['is_featured'],
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ],
            );
        }
    }
}

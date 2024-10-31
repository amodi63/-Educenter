<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ability;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class RolesDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $ability = [
        'all_categories' => 'All Categories',
        'single_category' => 'Show Single Category',
        'add_category' => 'Add new category',
        'delete_category' => 'Delete Category',
        'edit_category' => 'Edit Category',

        'all_courses' => 'All courses',
        'single_course' => 'Show Single course',
        'add_course' => 'Add new course',
        'delete_course' => 'Delete course',
        'edit_course' => 'Edit course',

        'all_teachers' => 'All Teachers',
        'single_teacher' => 'Show Single Teacher',
        'add_teacher' => 'Add new Teacher',
        'delete_teacher' => 'Delete Teacher',
        'edit_teacher' => 'Edit Teacher',

        'all_abouts' => 'All Abouts',
        'single_about' => 'Show Single About',
        'add_about' => 'Add new About',
        'delete_about' => 'Delete About',
        'edit_about' => 'Edit About',

        'all_events' => 'All Events',
        'single_event' => 'Show Single Event',
        'add_event' => 'Add new Event',
        'delete_event' => 'Delete Event',
        'edit_event' => 'Edit Event',

        'all_newss' => 'All Newss',
        'single_news' => 'Show Single News',
        'add_news' => 'Add new News',
        'delete_news' => 'Delete News',
        'edit_news' => 'Edit News',
    ];
    public function run()  //role
    {
        $data = [
            ['name' => 'Super Admin'],
            ['name' => 'Category Manager'],
            ['name' => 'Course Manager'],
            ['name' => 'Teacher Manager'],
            ['name' => 'About Manager'],
            ['name' => 'Event Manager'],
            ['name' => 'News Manager'],
        ];
        Role::insert($data);

        foreach($this->ability as $code => $name) {
            Ability::create([
                'name' => $name,
                'code' => $code
            ]);
        }
    }
}

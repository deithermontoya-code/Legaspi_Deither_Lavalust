
    <?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {

        $_SESSION['student_access'] = true;

        $student = [
            'student_id'     => '2026-0001',
            'name'           => 'Deither Legaspi',
            'course'         => 'BS Information Technology',
            'year'           => '3rd Year',
            'section'        => '3f3',
            'email'          => 'deithermontoya@gmail.com',
            'contact_number' => '09454867344'
        ];

        $this->call->view('student/index', ['student' => $student]);
    }

    public function profile()
    {

        $data = [
            'student_id'     => '2026-0001',
            'name'           => 'Deither Legaspi',
            'course'         => 'BS Information Technology',
            'year'           => '3rd Year',
            'section'        => '3f3',
            'email'          => 'deithermontoya@gmail.com',
            'address'        => 'Calapan City, Oriental Mindoro',
            'contact_number' => '09454867344',
            'skills'         => 'Web Development',
            'hobbies'        => 'Computer Gaming, Watching Movies'
        ];

        $this->call->view('student/profile', $data);
    }
}
    
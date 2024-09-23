<?php
require_once 'models/Database.php';
require_once 'models/Instructor.php';

class InstructorController {
    private $instructorModel;

    public function __construct() {
        $database = new Database();
        $this->instructorModel = new Instructor($database);
    }

    public function dashboard($instructorId) {
        $courses = $this->instructorModel->getCourses($instructorId);
        include 'views/instructor/dashboard.php';
    }

    public function viewEnrollmentRequests($courseId) {
        $requests = $this->instructorModel->getEnrollmentRequests($courseId);
        include 'views/instructor/enrollment_requests.php';
    }

    public function acceptEnrollment() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $enrollmentId = $_POST['enrollment_id'];
            if ($this->instructorModel->acceptEnrollment($enrollmentId)) {
                header("Location: index.php?action=dashboard&instructor_id=" . $_POST['instructor_id']);
            }
        }
    }

    public function rejectEnrollment() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $enrollmentId = $_POST['enrollment_id'];
            $reason = $_POST['reason'];
            if ($this->instructorModel->rejectEnrollment($enrollmentId, $reason)) {
                header("Location: index.php?action=dashboard&instructor_id=" . $_POST['instructor_id']);
            }
        }
    }

    public static function route() {
        $action = $_GET['action'] ?? 'dashboard';
        $instructorId = $_GET['instructor_id'] ?? 1; // Default instructor ID for testing

        $controller = new self();

        switch ($action) {
            case 'dashboard':
                $controller->dashboard($instructorId);
                break;
            case 'viewEnrollmentRequests':
                $courseId = $_GET['course_id'];
                $controller->viewEnrollmentRequests($courseId);
                break;
            case 'acceptEnrollment':
                $controller->acceptEnrollment();
                break;
            case 'rejectEnrollment':
                $controller->rejectEnrollment();
                break;
            default:
                $controller->dashboard($instructorId);
                break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    InstructorController::route();
}
?>

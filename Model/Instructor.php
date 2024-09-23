<?php

class Instructor {
    private $db;

    public function __construct($database) {
        $this->db = $database->connection;
    }

    public function getCourses($instructorId) {
        $stmt = $this->db->prepare("SELECT * FROM courses WHERE instructor_id = :instructor_id");
        $stmt->execute(['instructor_id' => $instructorId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEnrollmentRequests($courseId) {
        $stmt = $this->db->prepare("SELECT * FROM enrollments WHERE course_id = :course_id AND status = 'pending'");
        $stmt->execute(['course_id' => $courseId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function acceptEnrollment($enrollmentId) {
        $stmt = $this->db->prepare("UPDATE enrollments SET status = 'accepted' WHERE id = :enrollment_id");
        return $stmt->execute(['enrollment_id' => $enrollmentId]);
    }

    public function rejectEnrollment($enrollmentId, $reason) {
        $stmt = $this->db->prepare("UPDATE enrollments SET status = 'rejected', rejection_reason = :reason WHERE id = :enrollment_id");
        return $stmt->execute(['enrollment_id' => $enrollmentId, 'reason' => $reason]);
    }
}
?>

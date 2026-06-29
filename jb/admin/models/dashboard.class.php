<?php
class Dashboard {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function getStats() {
        $stats = [];
        $stats['total_users']    = $this->db->query("SELECT COUNT(*) c FROM users")->fetch_assoc()['c'];
        $stats['total_jobs']     = $this->db->query("SELECT COUNT(*) c FROM jobs")->fetch_assoc()['c'];
        $stats['total_companies']= $this->db->query("SELECT COUNT(*) c FROM companies")->fetch_assoc()['c'];
        $stats['total_apps']     = $this->db->query("SELECT COUNT(*) c FROM applications")->fetch_assoc()['c'];
        $stats['active_jobs']    = $this->db->query("SELECT COUNT(*) c FROM jobs WHERE status='active'")->fetch_assoc()['c'];
        $stats['pending_apps']   = $this->db->query("SELECT COUNT(*) c FROM applications WHERE status='pending'")->fetch_assoc()['c'];
        return $stats;
    }

    public function getRecentUsers($limit = 5) {
        return $this->db->query(
            "SELECT u.user_id, u.full_name, u.email, u.user_type, u.status, u.created_at, r.role_name
             FROM users u LEFT JOIN roles r ON u.role_id=r.role_id
             ORDER BY u.created_at DESC LIMIT $limit"
        )->fetch_all(MYSQLI_ASSOC);
    }

    public function getRecentJobs($limit = 5) {
        return $this->db->query(
            "SELECT j.job_id, j.job_title, j.job_type, j.status, j.created_at, c.company_name
             FROM jobs j LEFT JOIN companies c ON j.company_id=c.company_id
             ORDER BY j.created_at DESC LIMIT $limit"
        )->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserTypeStats() {
        return $this->db->query(
            "SELECT user_type, COUNT(*) as count FROM users GROUP BY user_type"
        )->fetch_all(MYSQLI_ASSOC);
    }

    public function getMonthlyUsers() {
        return $this->db->query(
            "SELECT DATE_FORMAT(created_at,'%b') as month, COUNT(*) as count
             FROM users
             WHERE created_at >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
             GROUP BY MONTH(created_at), DATE_FORMAT(created_at,'%b')
             ORDER BY MONTH(created_at)"
        )->fetch_all(MYSQLI_ASSOC);
    }
}

?>

<?php
class DashboardController extends Controller {
    public function index() {
        if (!isset($_SESSION['username'])) {
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }
        
        $this->view('dashboard/dashboard');
    }

    
}
?>

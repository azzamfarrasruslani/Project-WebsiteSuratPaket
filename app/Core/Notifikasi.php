<?php
class Notifikasi
{
    public static function setPesan($text, $icon)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['pesan'] = $text;
        $_SESSION['icon'] = $icon;
    }
    

    public static function tampilPesan()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['pesan'])) {
            echo '<script>
                Swal.fire({
                    title: "Notification",
                    text: "' . $_SESSION['pesan'] . '",
                    icon: "' . $_SESSION['icon'] . '"
                });
                </script>';

            unset($_SESSION['pesan']);
            unset($_SESSION['icon']);
        }
    }
}
?>
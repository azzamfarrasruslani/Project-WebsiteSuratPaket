<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
class Notifikasi
{
    public static function setPesan($text)
    {
        $_SESSION['pesan'] = $text;
    }


    public static function tampilPesan()
    {
                echo '<script>Swal.fire({
  title: "Good job!",
  text: "' . $_SESSION['pesan'] . '",
  icon: "success"
});</script>';
        

    }
}

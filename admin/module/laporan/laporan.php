<?php
class Laporan{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }
    public function deleteLaporan()
    {
        $sql = 'DELETE FROM nota';
        $row = $this->config->prepare($sql);
        $row->execute();
        echo '<script>window.location="../../index.php?page=laporan&remove=hapus"</script>';
    }
}
require '../../config.php';
?>
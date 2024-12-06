<?php
class ClientDanhmucController
{
     public $modelDanhMuc;

     public function __construct()
     {
          $this->modelDanhMuc = new ClientDanhMucModel();
     }
}
?>
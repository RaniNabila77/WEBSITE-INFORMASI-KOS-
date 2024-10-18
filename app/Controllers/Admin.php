<?php

namespace App\Controllers;
use App\Models\M_Admin;  //inisiasi model yg digunakan dalam controller
class Admin extends BaseController
{
    public function index()
    {
       return view('backend/login/login');
    }

    public function cek_login_admin() 
    {
       $modelAdmin = new M_Admin; //deklarasi alias model admin

       $username = $this->request->getPost('username');
       $cekUsername = $modelAdmin->getDataAdmin(['username_admin' => $username])->getNumRows();
       if($cekUsername == 0){
        ?>
        <script>
            alert("Username Tidak Ditemukan!");
            history.go(-1);
        </script>
        <?php
       }
       else{
        $dataUser = $modelAdmin->getDataAdmin(['username_admin' => $username])->getRowArray();
        $password = $this->request->getPost('password');

        $verifyPassword = password_verify($password, $dataUser['password_admin']);
            if(!$verifyPassword){
                ?>
                <script>
                    alert("Username Atau Password Salah!");
                    history.go(-1);
                </script>
                <?php
            }
            else {
                $datasession = [
                    'ses_id' => $dataUser['id_admin']
                ];
                ?>
                <script>
                    document.location ="<?= base_url('admin/dashboard-admin');?>";
                </script>
                <?php
               }
        }
    }
    public function dashboard()
    {
        echo view('backend/template/header');
        echo view('backend/template/sidebar');
        echo view('backend/template/footer');
        echo view('backend/login/dashboard');
    }

}

<?php

    class Test{

        use Controller;
        
        public function index(){

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $users = new Users;
          

                if (isset($_POST['loginsubmit'])) {

                    $emailOrPhone = $_POST['email'];

                    // Check if the input matches an email pattern
                    if (filter_var($emailOrPhone, FILTER_VALIDATE_EMAIL)) {
                        $arr['email'] = $_POST['email'];

                    } else {
                        if (preg_match("/^[0-9]{11}$/", $emailOrPhone)) {
                            $arr['phone'] = $_POST['email'];
                        }
                    }

                    $row = $users->first($arr);
                    // show($row);

                    if($row){
                        if($row->password === $_POST['password']){
                            $_SESSION['USERS'] = $row;
                            redirect('aboutus');
                        }
                    }//ADD LOGIC IF  NOT FOUND ACCOUNT AND ALSO INCORRECT PASSWORD


                } elseif (isset($_POST['forgotsubmit'])) {

                    $emailOrPhone = $_POST['femail'];

                    // Check if the input matches an email pattern
                    if (filter_var($emailOrPhone, FILTER_VALIDATE_EMAIL)) {
                        $arr['email'] = $_POST['femail'];
                        $tablerow = 'email';     

                    } else {
                        if (preg_match("/^[0-9]{11}$/", $emailOrPhone)) {
                            $arr['phone'] = $_POST['femail'];
                            $tablerow = 'phone';     
                        }
                    }

                    $row = $users->first($arr);
                    // show($row);

                    if($row){
                        if($_POST['newpassword'] === $_POST['retypepassword']){
                            $arr['password'] = $_POST['retypepassword'];
                            $users->update($emailOrPhone, $arr, $tablerow);
                            redirect('test');
                        }
                    }
                    // redirect('test');

                } elseif (isset($_POST['registersubmit'])) {
                    $arr['fname'] = $_POST['fname'];
                    $arr['lname'] = $_POST['lname'];
                    $arr['email'] = $_POST['remail'];
                    $arr['phone'] = $_POST['rmobile'];
                    $arr['password'] = $_POST['rpassword'];

                    $users->insert($arr);

                    redirect('test');
                    // echo '<script>alert("Register Successful!");</script>';
                }

            }
            

            // $data['errors'] = $users->errors;

            $this->view('test');
        }
    }

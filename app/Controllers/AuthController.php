<?php

namespace App\Controllers;

use App\Libraries\HashPass;
date_default_timezone_set('Asia/Kolkata');
class AuthController extends BaseController
{
    public function register()
    {
        if ($_POST) {
            $validation = $this->validate([
                // validation rules
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username is required',
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[5]|max_length[10]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Password must have atleast 6 characters in length',
                        'max_length' => 'Password must not have more that 10 characters in length',
                    ]
                ],
                'cpassword' => [
                    'rules' => 'required|min_length[5]|max_length[10]|matches[password]',
                    'errors' => [
                        'required' => 'Confirm Password is required',
                        'min_length' => 'Password must have atleast 6 characters in length',
                        'max_length' => 'Password must not have more that 10 characters in length',
                        'matches' => 'Your password should be match with entered Password'
                    ]
                ],
            ]);
            if (!$validation) {
                $validation = \Config\Services::validation();
                $errors = $validation->getErrors();
                $message = ['status' => 'error', 'data' => 'Validate form', 'errors' => $errors];
                return $this->response->setJSON($message);
            } else {
                // echo "form submit";
                $un = trim($this->request->getPost('username'));
                $ps = trim($this->request->getPost('password'));

                $data = [
                    'username' => $un,
                    'password' => HashPass::pass_enc($ps),
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $athMdl = new \App\Models\AdminModel();
                try {
                    $query = $athMdl->insert($data);

                    if ($query) {
                        $response = ['status' => 'success', 'message' => 'SuperAdmin Register Successfully!'];
                    } else {
                        $response = ['status' => 'error', 'message' => 'Something went wrong!'];
                    }
                    return $this->response->setJSON($response);
                } catch (\Exception $e) {
                    $response = ['status' => 'false', 'message' => 'An unexpected error occurred. Please try again later.'];
                    return $this->response->setStatusCode(500)->setJSON($response);
                }
            }
        } else {
            return view('admin/register');
        }
    }

    public function adminLogin()
    {
        if ($_POST) {
            $un = trim($this->request->getPost('username'));
            $ps = trim($this->request->getPost('password'));

            if (empty($un) || empty($ps)) {
                $response = ['status' => 'error', 'message' => 'All Fields are Required!'];
                return $this->response->setJSON($response);
            }

            $adminModel = new \App\Models\AdminModel();

            $userData = $adminModel->where('username', esc($un))->first();

            if (is_null($userData)) {
                $response = ['status' => 'error', 'message' => 'Username Not Found!'];
                return $this->response->setJSON($response);
            }

            $verifyPass = HashPass::pass_dec($ps, $userData['password']);
            if (!$verifyPass) {
                $response = ['status' => 'error', 'message' => 'You Entered wrong Password!'];
            } else {
                if (!is_null($userData)) {
                    $sessionData = [
                        'username' => $userData['username'],
                        'loggedin' => 'adminloggedin'
                    ];
                    session()->set($sessionData);
                }
                $response = ['status' => 'success', 'message' => 'Logged-In Succesfully!'];
            }
            return $this->response->setJSON($response);
        } else {
            return view('admin/login');
        }
    }

    public function Adminlogout()
    {
        session_unset();
        session()->destroy();
        return redirect()->to(base_url('admin/login'));
    }
    public function superadminregister()
    {
        if ($this->request->getMethod() == 'GET') {
            return view('superadmin/register');
        } else if ($this->request->getMethod() == 'POST') {
            $validation = $this->validate([
                // validation rules
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username is required',
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[5]|max_length[10]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Password must have atleast 6 characters in length',
                        'max_length' => 'Password must not have more that 10 characters in length',
                    ]
                ],
                'cpassword' => [
                    'rules' => 'required|min_length[5]|max_length[10]|matches[password]',
                    'errors' => [
                        'required' => 'Confirm Password is required',
                        'min_length' => 'Password must have atleast 6 characters in length',
                        'max_length' => 'Password must not have more that 10 characters in length',
                        'matches' => 'Your password should be match with entered Password'
                    ]
                ],
            ]);

            if (!$validation) {
                $validation = \Config\Services::validation();
                $errors = $validation->getErrors();
                $message = ['status' => 'error', 'data' => 'Validate form', 'errors' => $errors];
                return $this->response->setJSON($message);
            } else {
                // echo "form submit";
                $un = trim($this->request->getPost('username'));
                $ps = trim($this->request->getPost('password'));

                $data = [
                    'username' => $un,
                    'password' => HashPass::pass_enc($ps)
                ];
                $athMdl = new \App\Models\SuperAdminModel();
                try {
                    $query = $athMdl->insert($data);

                    if ($query) {
                        $response = ['status' => 'success', 'message' => 'SuperAdmin Register Successfully!'];
                    } else {
                        $response = ['status' => 'error', 'message' => 'Something went wrong!'];
                    }
                    return $this->response->setJSON($response);
                } catch (\Exception $e) {
                    $response = ['status' => 'false', 'message' => 'An unexpected error occurred. Please try again later.'];
                    return $this->response->setStatusCode(500)->setJSON($response);
                }
            }
        }
    }
    public function superadminlogin()
    {
        if ($this->request->getMethod() == 'GET') {
            return view('superadmin/login');
        } elseif ($this->request->getMethod() == 'POST') {
            $un = trim($this->request->getPost('username'));
            $ps = trim($this->request->getPost('password'));

            if (empty($un) || empty($ps)) {
                $response = ['status' => 'error', 'message' => 'All Fields are Required!'];
                return $this->response->setJSON($response);
            }

            $adminModel = new \App\Models\SuperAdminModel();

            $userData = $adminModel->where('username', esc($un))->first();

            if (is_null($userData)) {
                $response = ['status' => 'error', 'message' => 'Username Not Found!'];
                return $this->response->setJSON($response);
            }

            $verifyPass = HashPass::pass_dec($ps, $userData['password']);
            if (!$verifyPass) {
                $response = ['status' => 'error', 'message' => 'You Entered wrong Password!'];
            } else {
                if (!is_null($userData)) {
                    $sessionData = [
                        'username' => $userData['username'],
                        'loggedin' => 'loggedin'
                    ];
                    session()->set($sessionData);
                }
                $response = ['status' => 'success', 'message' => 'Logged-In Succesfully!'];
            }
            return $this->response->setJSON($response);
        }
    }

    public function superAdminlogout()
    {
        session_unset();
        session()->destroy();
        return redirect()->to(base_url('superadmin/login'));
    }

}
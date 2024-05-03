<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Kolkata');
class Home extends BaseController
{
    public function index()
    {
        if ($this->request->getMethod() == 'GET') {
            return view('welcome_message');
        } elseif ($this->request->getMethod() == 'POST') {
            $validation = $this->validate([
                'name' => [
                    'rules' => 'required|regex_match[/^[a-zA-Z\s]+$/]',
                    'errors' => [
                        'required' => 'Name Field is Required',
                        'regex_match' => 'Only alphabet characters are allowed in the Name Field',
                    ],
                ],
                'emp_id' => [
                    'rules' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                    'errors' => [
                        'required' => 'Name Field is Required',
                        'regex_match' => 'Only alphaNumeric characters are allowed in the Employee Id Field',
                    ],
                ],
                'gender' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Gender Field is Required',
                    ],
                ],
                'dob' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Date of Birth Field is Required',
                    ],
                ],
                'phone' => [
                    'rules' => 'required|regex_match[/^\d{10}$/]',
                    'errors' => [
                        'required' => 'Contact Number Field is Required',
                        'regex_match' => 'Please enter a 10-digit numeric phone number',
                    ],
                ],
                'service' => [
                    'rules' => 'required|regex_match[/^[0-9\s]+$/]',
                    'errors' => [
                        'required' => 'Service Duration Field is Required',
                        'regex_match' => 'Only Numeric characters are allowed in the Service Duration Field',
                    ],
                ],
                'dept' => [
                    'rules' => 'required|regex_match[/^[A-Za-z\s]+$/]',
                    'errors' => [
                        'required' => 'Department Field is Required',
                        'regex_match' => 'Only Alphabets characters are allowed in the Department Field',
                    ],
                ],
                // 'upload-img' => [
                //     'rules' => 'uploaded[upload-img]|max_size[upload-img,1024]|mime_in[image,image/png,image/jpg,image/jpeg]',
                //     'errors' => [
                //         'uploaded' => 'Image is required.',
                //         'max_size' => 'Maximum file size allowed is 1 MB.',
                //         'mime_in' => 'Only png, jpg, jpeg formats are allowed for the Image.',
                //     ]
                // ],
                'height' => [
                    'rules' => 'required|regex_match[/^[0-9\s]+$/]',
                    'errors' => [
                        'required' => 'Height Field is Required',
                        'regex_match' => 'Only Numeric characters are allowed in the Height Field',
                    ],
                ],
                'weight' => [
                    'rules' => 'required|regex_match[/^[0-9\s]+$/]',
                    'errors' => [
                        'required' => 'Weight Field is Required',
                        'regex_match' => 'Only Numeric characters are allowed in the Weight Field',
                    ],
                ],
                'blood_group' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Blood Group Field is Required',
                    ],
                ],
                'diet' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Diet Field is Required',
                    ],
                ],
                // 'diet_name' => [
                //     'rules' => 'regex_match[/^[A-Za-z0-9,.()\s]+$/]',
                //     'errors' => [
                //         'regex_match' => 'Only Alphabets, Numeric characters and [,.()] are allowed in the Weight Field',
                //     ],
                // ],
                'smoke' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please Choose Smoking Field',
                    ],
                ],
                'alcohol' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please Choose Alcohol Field',
                    ],
                ],
                'snuff' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please Choose Snuff Field',
                    ],
                ],
                'allergy' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please Choose Allergy Field',
                    ],
                ],
                // 'allergy_name' => [
                //     'rules' => 'regex_match[/^[A-Za-z0-9,.()\s]+$/]',
                //     'errors' => [
                //         'regex_match' => 'Only Alphabets, Numeric characters and [,.()] are allowed in the Weight Field',
                //     ],
                // ],
                'diabetes' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please Choose Diabetes Field',
                    ],
                ],
                'bp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please Choose Hypertension (BP- blood pressure issues) Field',
                    ],
                ],
                'heart' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please Choose Heart Disease Field',
                    ],
                ],
                'kidney' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please Choose Kidney Disease Field',
                    ],
                ],
                'asthma' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please Choose Asthma Disease Field',
                    ],
                ],
                'otherdisease' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please Choose Other Disease Field',
                    ],
                ],
                // 'other_diseasename' => [
                //     'rules' => 'regex_match[/^[A-Za-z0-9,.()\s]+$/]',
                //     'errors' => [
                //         'regex_match' => 'Only Alphabets, Numeric characters and [,.()] are allowed in the Weight Field',
                //     ],
                // ],

            ]);
            if (!$validation) {
                $validation = \Config\Services::validation();
                $errors = $validation->getErrors();
                $message = ['status' => 'error', 'data' => 'Validated Form', 'errors' => $errors];
                return $this->response->setJSON($message);
            } else {
                $nm = ucwords(trim($this->request->getPost('name')));
                $eid = trim(strtoupper($this->request->getPost('emp_id')));
                $gn = ucwords(trim($this->request->getPost('gender')));
                $dob = trim($this->request->getPost('dob'));
                $phn = trim($this->request->getPost('phone'));
                $srvc = trim($this->request->getPost('service'));
                $dept = ucwords(trim($this->request->getPost('dept')));
                $img = $this->request->getFile('upload-img');
                $hght = trim($this->request->getPost('height'));
                $wght = trim($this->request->getPost('weight'));
                $bg = trim($this->request->getPost('blood_group'));
                $dt = trim($this->request->getPost('diet'));
                $smk = ucwords(trim($this->request->getPost('smoke')));
                $alchl = ucwords(trim($this->request->getPost('alcohol')));
                $snf = ucwords(trim($this->request->getPost('snuff')));
                $algr = ucwords(trim($this->request->getPost('allergy')));
                $dbt = ucwords(trim($this->request->getPost('diabetes')));
                $bp = ucwords(trim($this->request->getPost('bp')));
                $hrt = ucwords(trim($this->request->getPost('heart')));
                $kdny = ucwords(trim($this->request->getPost('kidney')));
                $asthm = ucwords(trim($this->request->getPost('asthma')));
                $otrd = ucwords(trim($this->request->getPost('otherdisease')));
                $othrdnm = $this->request->getPost('other_diseasename') ? trim($this->request->getPost('other_diseasename')) : '';
                $algrnm = $this->request->getPost('allergy_name') ? ucwords(trim($this->request->getPost('allergy_name'))) : '';
                $dtnm = $this->request->getPost('diet_name') ? ucwords(trim($this->request->getPost('diet_name'))) : "";
                $gndr = $this->request->getPost('other_gender') ? ucwords(trim($this->request->getPost('other_gender'))) : "";

                if ($img->isValid() && !$img->hasMoved()) {
                    $newImageName = $img->getRandomName();
                    $img->move("../public/assets/images/uploads/", $newImageName);

                    $data = [
                        'emp_id' => esc($eid),
                        'name' => ucwords(esc($nm)),
                        'gender' => esc($gn),
                        'other_gender' => esc($gndr),
                        'dob' => esc($dob),
                        'age' => esc(''),
                        'phone' => esc($phn),
                        'service_dur' => esc($srvc),
                        'dept' => esc($dept),
                        'photo' => esc($newImageName),
                        'height' => esc($hght),
                        'weight' => esc($wght),
                        'blood' => esc($bg),
                        'diet' => esc($dt),
                        'diet_name' => esc($dtnm),
                        'smoking' => esc($smk),
                        'alcohol' => esc($alchl),
                        'snuff' => esc($snf),
                        'allergy' => esc($algr),
                        'allergy_name' => esc($algrnm),
                        'diabetes' => esc($dbt),
                        'bp' => esc($bp),
                        'heart_disease' => esc($hrt),
                        'kidney_disease' => esc($kdny),
                        'asthma' => esc($asthm),
                        'other_disease' => esc($otrd),
                        'other_diseasename' => esc($othrdnm)
                    ];

                    $hmdl = new \App\Models\HealthModel();
                    try {
                        $query = $hmdl->insert($data);

                        if ($query) {
                            $response = ['status' => 'success', 'message' => 'Your Data has been Added Successfully!'];
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
    }

    function validate_EmpId()
    {
        $eid = trim($this->request->getGet("emp_id"));
        $prdModel = new \App\Models\HealthModel();
        $isExist = $prdModel->where('emp_id', esc($eid))->first();
        $retVal = $isExist ? false : true;

        return $this->response->setJSON(['valid' => $retVal]);
    }

   

}

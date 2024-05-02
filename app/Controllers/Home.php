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

    public function superadminDashboard()
    {
        return view('superadmin/dashboard');
    }

    public function SuperAdminfetchData()
    {
        try {
            $fd = new \App\Models\HealthModel();

            $draw = $_GET['draw'];
            $start = $_GET['start'];
            $length = $_GET['length'];
            $searchValue = $_GET['search']['value'];
            $orderColumnIndex = $_GET['order'][0]['column'];
            $orderColumnName = $_GET['columns'][$orderColumnIndex]['data'];
            $orderDir = $_GET['order'][0]['dir'];

            $fd->orderBy($orderColumnName, $orderDir);

            if (!empty($searchValue)) {
                $fd->groupStart();
                $fd->orLike('emp_id', $searchValue);
                $fd->orLike('uhid', $searchValue);
                $fd->groupEnd();
            }

            $data['data'] = $fd->findAll($length, $start);
            $totalRecords = $fd->countAll();
            $totalFilterRecords = (!empty($searchValue)) ? $fd->where('emp_id', $searchValue)->orWhere('uhid', $searchValue)->countAllResults() : $totalRecords;
            $associativeArray = [];


            foreach ($data['data'] as $row) {

                $associativeArray[] = array(
                    0 => $row['id'],
                    1 => $row['emp_id'],
                    2 => ucfirst($row['name']),
                    3 => $row['uhid'] ?? '',
                    4 => $row['phone'],
                    5 => '<button class="btn btn-outline-warning"><i class="fas fa-eye"></i></button>
                    <a href="' . base_url('superadmin/editForm?i=') . $row['id'] . '" class="btn btn-outline-primary" id="eform"><i class="far fa-edit"></i></a>
                    <button class="btn btn-outline-success"><i class="fas fa-file-pdf"></i></button>',

                );
            }


            if (empty($data['data'])) {
                $output = array(
                    'draw' => intval($draw),
                    'recordsTotal' => 0,
                    'recordsFiltered' => 0,
                    'data' => []
                );
            } else {
                $output = array(
                    'draw' => intval($draw),
                    'recordsTotal' => $totalRecords,
                    'recordsFiltered' => $totalFilterRecords,
                    'data' => $associativeArray
                );
            }
            return $this->response->setJSON($output);
        } catch (\Exception $e) {
            // Log the caught exception
            log_message('error', 'Error in fetch_data: ' . $e->getMessage());
            // Return an error response
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
    }

    public function SuperAdminEdit()
    {
        $md = new \App\Models\HealthModel();
        $data['messages'] = $md->findAll();
        return view('superadmin/editForm', $data);
    }

    public function SuperAdminEditData()
    {
        $id = trim($this->request->getGet('id'));
        $mdl = new \App\Models\HealthModel();

        $ft = $mdl->find($id);
        if ($ft) {
            $response = ['status' => 'success', 'message' => $ft];
        } else {
            $response = ['status' => 'error', 'message' => 'Data not found'];
        }
        return $this->response->setJSON($response);
    }

    public function SuperAdminEditformdata()
    {
        if ($this->request->getMethod() == 'POST') {
            $validation = $this->validate([
                'uhid' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'mentrual' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'pr_comp' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'past' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'fam_his' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'defect' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'pulse' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'bp_rprt' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'd_left' => 'required|regex_match[/^[0-9\/\s]+$/]',
                'd_right' => 'required|regex_match[/^[0-9\/\s]+$/]',
                'n_left' => 'required|regex_match[/^[0-9\/\s]+$/]',
                'n_right' => 'required|regex_match[/^[0-9\/\s]+$/]',
                'c_left' => 'required|regex_match[/^[0-9\/\s]+$/]',
                'c_right' => 'required|regex_match[/^[0-9\/\s]+$/]',
                'cr_left' => 'required|regex_match[/^[0-9\/\s]+$/]',
                'cr_right' => 'required|regex_match[/^[0-9\/\s]+$/]',
                'respiratory' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'cardio' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'nervous' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'abdomen' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'skin' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'audiometry' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'ecg' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'xray' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'thyphoid' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'upload-lungpdf' => 'uploaded[upload-lungpdf]|mime_in[upload-lungpdf,application/pdf]|max_size[upload-lungpdf,2048]',
                'upload-labpdf' => 'uploaded[upload-labpdf]|mime_in[upload-labpdf,application/pdf]|max_size[upload-labpdf,2048]',
                'advice' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]'

            ]);
            if (!$validation) {
                $validation = \Config\Services::validation();
                $errors = $validation->getErrors();
                $message = ['status' => 'error', 'data' => 'Validated Form', 'errors' => $errors];
                return $this->response->setJSON($message);
            } else {
                // echo 'submit';
                $id = trim($this->request->getPost('id'));
                $uhid = trim($this->request->getPost('uhid'));
                $mnt = trim($this->request->getPost('mentrual'));
                $pcmp = trim($this->request->getPost('pr_comp'));
                $pst = trim($this->request->getPost('past'));
                $fhs = trim($this->request->getPost('fam_his'));
                $oth = trim($this->request->getPost('other'));
                $dft = trim($this->request->getPost('defect'));
                $pls = trim($this->request->getPost('pulse'));
                $bprt = trim($this->request->getPost('bp_rprt'));
                $dl = trim($this->request->getPost('d_left'));
                $dr = trim($this->request->getPost('d_right'));
                $nl = trim($this->request->getPost('n_left'));
                $nr = trim($this->request->getPost('n_right'));
                $cl = trim($this->request->getPost('c_left'));
                $cr = trim($this->request->getPost('c_right'));
                $crl = trim($this->request->getPost('cr_left'));
                $crr = trim($this->request->getPost('cr_right'));
                $rsp = trim($this->request->getPost('respiratory'));
                $crd = trim($this->request->getPost('cardio'));
                $nrv = trim($this->request->getPost('nervous'));
                $abd = trim($this->request->getPost('abdomen'));
                $skn = trim($this->request->getPost('skin'));
                $adm = trim($this->request->getPost('audiometry'));
                $ecg = trim($this->request->getPost('ecg'));
                $xry = trim($this->request->getPost('xray'));
                $thp = trim($this->request->getPost('thyphoid'));
                $lng = $this->request->getFile('upload-lungpdf');
                $lb = $this->request->getFile('upload-labpdf');
                $advc = trim($this->request->getPost('advice'));

                if ($lng->isValid() && !$lng->hasMoved() && $lb->isValid() && !$lb->hasMoved()) {
                    $newlngFileName = $lng->getRandomName();
                    $newpdfName = $lb->getRandomName();
                    $lng->move("../public/assets/uploads/lung_report/", $newlngFileName);
                    $lb->move("../public/assets/uploads/lab_report/", $newpdfName);

                    $lngpth = "public/assets/uploads/lung_report/" . $lng->getName();
                    $lbpth = "public/assets/uploads/lung_report/" . $lb->getName();

                    $data = [
                        'uhid' => esc($uhid),
                        'obstetric' => esc($mnt),
                        'complaints' => esc($pcmp),
                        'past_history' => esc($pst),
                        'fam_history' => esc($fhs),
                        'other' => esc($oth),
                        'disability' => esc($dft),
                        'pulse' => esc($pls),
                        'bp_rprt' => esc($bprt),
                        'd_vision_left' => esc($dl),
                        'd_vision_right' => esc($dr),
                        'n_vision_left' => esc($nl),
                        'n_vision_right' => esc($nr),
                        'clr_vision_left' => esc($cl),
                        'clr_vision_right' => esc($cr),
                        'crrc_vision_left' => esc($crl),
                        'crrc_vision_right' => esc($crr),
                        'respiratory' => esc($rsp),
                        'cardio' => esc($crd),
                        'nervous' => esc($nrv),
                        'abdomen' => esc($abd),
                        'skin' => esc($skn),
                        'audiometry' => esc($adm),
                        'ecg' => esc($ecg),
                        'chest' => esc($xry),
                        'thyphoid' => esc($thp),
                        'lung' => $lngpth,
                        'lab' => $lbpth,
                        'advice' => esc($advc),
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                    // print_r($data); exit;
                    $hmdl = new \App\Models\HealthModel();
                    try {
                        $query = $hmdl->updateData(esc($id), $data);
                        // print_r($query); exit;
                        if ($query) {
                            $response = ['status' => 'success', 'message' => 'Thank you for your cooperation.'];
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


}

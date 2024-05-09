<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Kolkata');
class SuperAdminController extends BaseController
{
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

            $fd->where('is_admin', 0);

            if (!empty($searchValue)) {
                $fd->groupStart();
                $fd->orLike('emp_id', $searchValue);
                $fd->orLike('uhid', $searchValue);
                $fd->groupEnd();
            }

            $data['data'] = $fd->findAll($length, $start);
            // $totalRecords = $fd->countAll();
            $totalRecords = count($data['data']);
            $totalFilterRecords = (!empty($searchValue)) ? $fd->where('emp_id', $searchValue)->orWhere('uhid', $searchValue)->countAllResults() : $totalRecords;
            $associativeArray = [];


            foreach ($data['data'] as $row) {

                $associativeArray[] = array(
                    0 => $row['id'],
                    1 => $row['emp_id'],
                    2 => ucfirst($row['name']),
                    3 => $row['uhid'] ?? '',
                    4 => $row['phone'],
                    5 => '<a href="' . base_url('superadmin/viewUserData?i=') . $row['id'] . '" target="_blank"><button class="btn btn-outline-warning" id="view"><i class="fas fa-eye"></i></button></a>
                    <a href="' . base_url('superadmin/editForm?i=') . $row['id'] . '" class="btn btn-outline-primary" id="eform"><i class="far fa-edit"></i></a>
                    <button class="btn btn-outline-success"><i class="fas fa-file-pdf"></i></button>
                    <a href="' . base_url('superadmin/editProfile?i=') . $row['id'] . '"><button class="btn btn-outline-info"><i class="fas fa-image"></i></button></a>',

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
        if ($_POST) {
            // print_r($_FILES); exit;
            $validRule = [
                'uhid' => 'permit_empty|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'mentrual' => 'permit_empty|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'height' => 'required|regex_match[/^[0-9\s]+$/]',
                'weight' => 'required|regex_match[/^[0-9\s]+$/]',
                'pr_comp' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'past' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'fam_his' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'defect' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'pulse' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'bp_rprt' => 'required|regex_match[/^[a-zA-Z0-9\/\s]+$/]',
                'd_left' => 'permit_empty|regex_match[/^[a-zA-Z-:,0-9\/\s]+$/]',
                'd_right' => 'permit_empty|regex_match[/^[a-zA-Z-:,0-9\/\s]+$/]',
                'n_left' => 'permit_empty|regex_match[/^[a-zA-Z-:,0-9\/\s]+$/]',
                'n_right' => 'permit_empty|regex_match[/^[a-zA-Z-:,0-9\/\s]+$/]',
                'c_left' => 'permit_empty|regex_match[/^[a-zA-Z-:,0-9\/\s]+$/]',
                'c_right' => 'permit_empty|regex_match[/^[a-zA-Z-:,0-9\/\s]+$/]',
                'cr_left' => 'permit_empty|regex_match[/^[a-zA-Z-:,0-9\/\s]+$/]',
                'cr_right' => 'permit_empty|regex_match[/^[a-zA-Z-:,0-9\/\s]+$/]',
                'respiratory' => 'required',
                'cardio' => 'required',
                'nervous' => 'required',
                'abdomen' => 'required',
                'skin' => 'required',
                'xray' => 'required',
                'thyphoid' => 'required',
                'upload-lungpdf' => 'mime_in[upload-lungpdf,application/pdf]|max_size[upload-lungpdf,2048]',
                'upload-labpdf' => 'mime_in[upload-labpdf,application/pdf]|max_size[upload-labpdf,2048]',
                'audiometry' => 'mime_in[audiometry,application/pdf]|max_size[audiometry,2048]',
                'ecg' => 'mime_in[ecg,application/pdf]|max_size[ecg,2048]',
                'advice' => 'required|regex_match[/^[a-zA-Z0-9.,\s]+$/]',
                // 'profileimage' => 'max_size[profileimage,20480]|mime_in[profileimage,image/png,image/jpg,image/jpeg]',
            ];

            if ($this->request->getFile('profileimage')) {
                $validRule['profileimage'] = 'max_size[profileimage,10485760]|mime_in[profileimage,image/png,image/jpg,image/jpeg]';
            }

            $validation = $this->validate($validRule);


            if (!$validation) {
                $validation = \Config\Services::validation();
                $errors = $validation->getErrors();
                $message = ['status' => 'error', 'data' => 'Validated Form', 'errors' => $errors];
                return $this->response->setJSON($message);
            } else {
                // echo 'submit';
                $id = trim($this->request->getPost('id'));
                $uhid = $this->request->getPost('uhid') ? strtoupper(trim($this->request->getPost('uhid'))) : "";
                $mnt = trim($this->request->getPost('mentrual'));
                $pcmp = trim($this->request->getPost('pr_comp'));
                $hgt = trim($this->request->getPost('height'));
                $wght = trim($this->request->getPost('weight'));
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
                $adm = $this->request->getFile('audiometry');
                $ecg = $this->request->getFile('ecg');
                $xry = trim($this->request->getPost('xray'));
                $thp = trim($this->request->getPost('thyphoid'));
                $lng = $this->request->getFile('upload-lungpdf');
                $lb = $this->request->getFile('upload-labpdf');
                $advc = trim($this->request->getPost('advice'));
                $img = $this->request->getFile('profileimage');
                $ischeck = trim($this->request->getPost('fittowork'));


                $data = [];
                if ($lng->isValid() && $lb->isValid() && $adm->isValid() && $ecg->isValid()) {
                    $newlngFileName = $lng->getRandomName();
                    $newpdfName = $lb->getRandomName();
                    $newEcgPdf = $ecg->getRandomName();
                    $newAdmPdf = $adm->getRandomName();

                    $lng->move("public/assets/uploads/lung_report/", $newlngFileName);
                    $lb->move("public/assets/uploads/lab_report/", $newpdfName);
                    $adm->move("public/assets/uploads/audiometry_report/", $newAdmPdf);
                    $ecg->move("public/assets/uploads/ecg_report/", $newEcgPdf);

                    $lngpth = "public/assets/uploads/lung_report/" . $lng->getName();
                    $lbpth = "public/assets/uploads/lab_report/" . $lb->getName();
                    $admpth = "public/assets/uploads/audiometry_report/" . $adm->getName();
                    $ecgpth = "public/assets/uploads/ecg_report/" . $ecg->getName();

                } else {
                    $lngpth = '';
                    $lbpth = '';
                }
                $data = [
                    'uhid' => esc($uhid),
                    'obstetric' => esc($mnt),
                    'complaints' => esc($pcmp),
                    'weight' => esc($wght),
                    'height' => esc($hgt),
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
                    'audiometry' => esc($admpth),
                    'ecg' => esc($ecgpth),
                    'chest' => esc($xry),
                    'thyphoid' => esc($thp),
                    'lung' => $lngpth,
                    'lab' => $lbpth,
                    'is_checked' => esc($ischeck),
                    'advice' => esc($advc),
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                if ($img !== null && $img->isValid() && !$img->hasMoved()) {
                    $imgNewName = $img->getRandomName();
                    $img->move("public/uploads/images/", $imgNewName);

                    $photo = esc('public/uploads/images' . $imgNewName);

                    $data = array_merge($data, ['photo' => $photo]);
                }

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

    function validateUHID()
    {
        $uid = $this->request->getGet('uhid');
        $md = new \App\Models\HealthModel();
        $isExist = $md->where('uhid', esc($uid))->first();
        $retVal = $isExist ? false : true;

        return $this->response->setJSON(['valid' => $retVal]);
    }

    public function newDashboard()
    {
        return view('superadmin/newDashboard');
    }

    public function AddNewMember()
    {
        if ($_POST) {
            $validation = $this->validate([
                'uhid' => 'permit_empty|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'mentrual' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'pr_comp' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'past' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'fam_his' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'defect' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'pulse' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'bp_rprt' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'd_left' => 'permit_empty|regex_match[/^[0-9\/\s]+$/]',
                'd_right' => 'permit_empty|regex_match[/^[0-9\/\s]+$/]',
                'n_left' => 'permit_empty|regex_match[/^[0-9\/\s]+$/]',
                'n_right' => 'permit_empty|regex_match[/^[0-9\/\s]+$/]',
                'c_left' => 'permit_empty|regex_match[/^[0-9\/\s]+$/]',
                'c_right' => 'permit_empty|regex_match[/^[0-9\/\s]+$/]',
                'cr_left' => 'permit_empty|regex_match[/^[0-9\/\s]+$/]',
                'cr_right' => 'permit_empty|regex_match[/^[0-9\/\s]+$/]',
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
                'advice' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'upload-img' => 'uploaded[upload-img]|max_size[upload-img,10485760]|mime_in[upload-img,image/png,image/jpg,image/jpeg]',
                'name' => 'required|regex_match[/^[a-zA-Z\s]+$/]',
                'emp_id' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'gender' => 'required',
                'dob' => 'required',
                'phone' => 'required|regex_match[/^\d{10}$/]',
                'service' => 'required|regex_match[/^[0-9\s]+$/]',
                'dept' => 'required|regex_match[/^[A-Za-z\s]+$/]',
                'height' => 'required|regex_match[/^[0-9\s]+$/]',
                'weight' => 'required|regex_match[/^[0-9\s]+$/]',
                'blood_group' => 'required',
                'diet' => 'required',
                'smoke' => 'required',
                'alcohol' => 'required',
                'snuff' => 'required',
                'allergy' => 'required',
                'diabetes' => 'required',
                'bp' => 'required',
                'heart' => 'required',
                'kidney' => 'required',
                'asthma' => 'required',
                'otherdisease' => 'required',
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
                $pimg = $this->request->getFile('upload-img');
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
                $othrdnm = $this->request->getPost('other_disease') ? trim($this->request->getPost('other_disease')) : '';
                $algrnm = $this->request->getPost('allergy_name') ? ucwords(trim($this->request->getPost('allergy_name'))) : '';
                $dtnm = $this->request->getPost('diet_name') ? ucwords(trim($this->request->getPost('diet_name'))) : "";
                $gndr = $this->request->getPost('other_gender') ? ucwords(trim($this->request->getPost('other_gender'))) : "";
                $uhid = $this->request->getPost('uhid') ? strtoupper(trim($this->request->getPost('uhid'))) : '';
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
                $lngpdf = $this->request->getFile('upload-lungpdf');
                $lbpdf = $this->request->getFile('upload-labpdf');
                $advc = trim($this->request->getPost('advice'));

                if ($pimg->isValid() && $lngpdf->isValid() && $lbpdf->isValid()) {
                    $imgNewName = $pimg->getRandomName();
                    $lngNewName = $lngpdf->getRandomName();
                    $lbNewName = $lbpdf->getRandomName();

                    $pimg->move('../public/assets/images', $imgNewName);
                    $lngpdf->move("../public/assets/uploads/lung_report/", $lngNewName);
                    $lbpdf->move("../public/assets/uploads/lab_report/", $lbNewName);

                    $img_pth = $imgNewName;
                    $lng_ph = "public/assets/uploads/lung_report/" . $lngpdf->getName();
                    $lb_path = "public/assets/uploads/lab_report/" . $lbpdf->getName();
                } else {
                    $img_pth = "";
                    $lng_ph = "";
                    $lb_path = "";
                }

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
                    'photo' => esc($img_pth),
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
                    'other_diseasename' => esc($othrdnm),
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
                    'lung' => $lng_ph,
                    'lab' => $lb_path,
                    'advice' => esc($advc),
                    'is_admin' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => ''
                ];

                $hmdl = new \App\Models\HealthModel();
                try {
                    $query = $hmdl->insert($data);

                    if ($query) {
                        $response = ['status' => 'success', 'message' => 'Thank you for your cooperation!'];
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
            return view('superadmin/addnew');
        }
    }

    public function newRegisterRecords()
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

            $fd->where('is_admin', 1);

            if (!empty($searchValue)) {
                $fd->groupStart();
                $fd->orLike('emp_id', $searchValue);
                $fd->orLike('uhid', $searchValue);
                $fd->groupEnd();
            }

            $data['data'] = $fd->findAll($length, $start);
            $totalRecords = count($data['data']);
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

    public function editImage()
    {
        return view('superadmin/editImage');
    }

    public function editProfileImage()
    {
        if ($_POST) {
            // print_r($_FILES); exit;

            if ($this->request->getFile('profileimage')) {
                $validRule['profileimage'] = 'uploaded[profileimage]|max_size[profileimage,10485760]|mime_in[profileimage,image/png,image/jpg,image/jpeg]';
            }

            $validation = $this->validate($validRule);


            if (!$validation) {
                $validation = \Config\Services::validation();
                $errors = $validation->getErrors();
                $message = ['status' => 'error', 'data' => 'Validated Form', 'errors' => $errors];
                return $this->response->setJSON($message);
            } else {
                // echo 'submit';
                $id = trim($this->request->getPost('id'));

                $img = $this->request->getFile('profileimage');


                $data = [];

                if ($img !== null && $img->isValid() && !$img->hasMoved()) {
                    $imgNewName = $img->getRandomName();
                    $img->move("../public/assets/images/", $imgNewName);

                    // $photo = esc('public/uploads/images/' . $imgNewName);

                    $data['photo'] = $imgNewName;
                }

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

    public function viewUserData()
    {

        $id = service('request')->getGet('i');
        $md = new \App\Models\HealthModel();
        $data['hospital'] = $md->where('id', esc($id))->find();

        return view('superadmin/ViewData', $data);
    }

}
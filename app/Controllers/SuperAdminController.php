<?php

namespace App\Controllers;

use App\Libraries\EncUrl;

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
            // $totalRecords = count($data['data']);

            // Counting total records without limit and offset
            $totalRecords = $fd->countData();
            // $totalFilterRecords = (!empty($searchValue)) ? $fd->where('emp_id', $searchValue)->orWhere('uhid', $searchValue)->countAllResults() : $totalRecords;
            // Counting filtered records
            $totalFilterRecords = $fd->countFilteredData($searchValue);

            $associativeArray = [];


            foreach ($data['data'] as $row) {
                $encryptedId = EncUrl::encUrl($row['id']);
                $associativeArray[] = array(
                    0 => $row['id'],
                    1 => $row['emp_id'],
                    2 => ucfirst($row['name']),
                    3 => $row['uhid'] ?? '',
                    4 => $row['phone'],
                    5 => '<a href="' . base_url('superadmin/viewUserData?i=') . $encryptedId . '" target="_blank"><button class="btn btn-outline-warning" id="view"><i class="fas fa-eye"></i></button></a>
                    <a href="' . base_url('superadmin/editForm?i=') . $encryptedId . '" class="btn btn-outline-primary" id="eform"><i class="far fa-edit"></i></a>
                    <a href="' . base_url('superadmin/generatePdf?i=') . $encryptedId . '" target="_blank"><button class="btn btn-outline-success"><i class="fas fa-file-pdf"></i></button></a>
                    <a href="' . base_url('superadmin/editProfile?i=') . $encryptedId . '"><button class="btn btn-outline-info"><i class="fas fa-image"></i></button></a>
                    <a href="' . base_url('superadmin/zip?i=') . $encryptedId . '"><button class="btn btn-outline-dark"><i class="fas fa-file-archive"></i></button></a>',
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
        $eid = trim($this->request->getGet('id'));

        try {
            $id = EncUrl::decUrl($eid);
            $mdl = new \App\Models\HealthModel();

            $ft = $mdl->find($id);
            if ($ft) {
                $response = ['status' => 'success', 'message' => $ft];
            } else {
                $response = ['status' => 'error', 'message' => 'Data not found'];
            }
            return $this->response->setJSON($response);

        } catch (\Exception $e) {
            log_message('error', 'Decryption failed: ' . $e->getMessage());
            echo 'Decryption failed: ' . $e->getMessage();
        }

    }

    public function SuperAdminEditformdata()
    {
        if ($_POST) {
            // print_r($_FILES); exit;
            // print_r($_POST); exit;
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
                'advice' => 'permit_empty|regex_match[/^[a-zA-Z0-9.,\s]+$/]',
                'remarks' => 'permit_empty|regex_match[/^[a-zA-Z0-9.,\s]+$/]',
                'dctrName' => 'required'
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
                $eid = trim($this->request->getPost('id'));

                try {
                    $id = EncUrl::decUrl($eid);
                } catch (\Exception $e) {
                    log_message('error', 'Decryption failed: ' . $e->getMessage());
                    echo 'Decryption failed: ' . $e->getMessage();
                }
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
                $rmks = trim($this->request->getPost('remarks'));
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
                $lb1 = $this->request->getFile('upload-labpdf1');
                $lb2 = $this->request->getFile('upload-labpdf2');
                $lb3 = $this->request->getFile('upload-labpdf3');
                $lb4 = $this->request->getFile('upload-labpdf4');
                $advc = trim($this->request->getPost('advice'));
                $img = $this->request->getFile('profileimage');
                $ischeck = trim($this->request->getPost('fittowork'));
                $workfitischeck = trim($this->request->getPost('workfit'));
                $dctr = trim($this->request->getPost('dctrName'));

                $data = [];

                $hmdl = new \App\Models\HealthModel();
                $currentData = $hmdl->getDataById($id);

                $lngpth = $currentData['lung'] ?? '';
                $lbpth = $currentData['lab'] ?? '';
                $lbpth1 = $currentData['lab1'] ?? '';
                $lbpth2 = $currentData['lab2'] ?? '';
                $lbpth3 = $currentData['lab3'] ?? '';
                $lbpth4 = $currentData['lab4'] ?? '';
                $admpth = $currentData['audiometry'] ?? '';
                $ecgpth = $currentData['ecg'] ?? '';


                if ($lng->isValid()) {
                    $newlngFileName = $lng->getRandomName();
                    $lng->move("../public/uploads/lung_report/", $newlngFileName);
                    $lngpth = "public/uploads/lung_report/" . $newlngFileName;
                }

                if ($lb->isValid()) {
                    $newpdfName = $lb->getRandomName();
                    $lb->move("../public/uploads/lab_report/", $newpdfName);
                    $lbpth = "public/uploads/lab_report/" . $newpdfName;
                }

                if ($lb1->isValid()) {
                    $lb1pdfName = $lb1->getRandomName();
                    $lb1->move("../public/uploads/lab_report/", $lb1pdfName);
                    $lbpth1 = "public/uploads/lab_report/" . $lb1pdfName;
                }

                if ($lb2->isValid()) {
                    $lb2pdfName = $lb2->getRandomName();
                    $lb2->move("../public/uploads/lab_report/", $lb2pdfName);
                    $lbpth2 = "public/uploads/lab_report/" . $lb2pdfName;
                }

                if ($lb3->isValid()) {
                    $lb3pdfName = $lb3->getRandomName();
                    $lb3->move("../public/uploads/lab_report/", $lb3pdfName);
                    $lbpth3 = "public/uploads/lab_report/" . $lb3pdfName;
                }

                if ($lb4->isValid()) {
                    $lb4pdfName = $lb4->getRandomName();
                    $lb4->move("../public/uploads/lab_report/", $lb4pdfName);
                    $lbpth4 = "public/uploads/lab_report/" . $lb4pdfName;
                }

                if ($adm->isValid()) {
                    $newAdmPdf = $adm->getRandomName();
                    $adm->move("../public/uploads/audiometry_report/", $newAdmPdf);
                    $admpth = "public/uploads/audiometry_report/" . $newAdmPdf;
                }

                if ($ecg->isValid()) {
                    $newEcgPdf = $ecg->getRandomName();
                    $ecg->move("../public/uploads/ecg_report/", $newEcgPdf);
                    $ecgpth = "public/uploads/ecg_report/" . $newEcgPdf;
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
                    'remarks' => esc($rmks),
                    'respiratory' => esc($rsp),
                    'cardio' => esc($crd),
                    'nervous' => esc($nrv),
                    'abdomen' => esc($abd),
                    'skin' => esc($skn),
                    'audiometry' => $admpth,
                    'ecg' => $ecgpth,
                    'chest' => esc($xry),
                    'thyphoid' => esc($thp),
                    'lung' => $lngpth,
                    'lab' => $lbpth,
                    'lab1' => $lbpth1,
                    'lab2' => $lbpth2,
                    'lab3' => $lbpth3,
                    'lab4' => $lbpth4,
                    'is_checked' => esc($ischeck),
                    'workfit_checked' => esc($workfitischeck),
                    'doctorName' => esc($dctr),
                    'advice' => esc($advc),
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                if ($img !== null && $img->isValid() && !$img->hasMoved()) {
                    $imgNewName = $img->getRandomName();
                    $img->move("../public/uploads/images/", $imgNewName);

                    $photo = esc('public/uploads/images' . $imgNewName);

                    $data = array_merge($data, ['photo' => $photo]);
                }
                // echo '<pre>';
                // print_r($data); exit;
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
        $eid = $this->request->getGet('id');
        try {
            $id = EncUrl::decUrl($eid);
        } catch (\Exception $e) {
            log_message('error', 'Decryption failed: ' . $e->getMessage());
            echo 'Decryption failed: ' . $e->getMessage();
        }
        $md = new \App\Models\HealthModel();
        // $isExist = $md->where('uhid', esc($uid))->first();
        $isExist = $md->where('uhid', esc($uid))
            ->where('id !=', $id)
            ->first();
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
                'advice' => 'permit_empty|regex_match[/^[a-zA-Z0-9.,\s]+$/]',
                'remarks' => 'permit_empty|regex_match[/^[a-zA-Z0-9.,\s]+$/]',
                // 'dctrName' => 'required'
                'upload-img' => 'uploaded[upload-img]|max_size[upload-img,10485760]|mime_in[upload-img,image/png,image/jpg,image/jpeg]',
                'name' => 'required|regex_match[/^[a-zA-Z\s]+$/]',
                'emp_id' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'gender' => 'required',
                'dob' => 'required',
                'phone' => 'required|regex_match[/^\d{10}$/]',
                'service' => 'required|regex_match[/^[0-9\s]+$/]',
                'dept' => 'required|regex_match[/^[A-Za-z\s]+$/]',
                // 'height' => 'required|regex_match[/^[0-9\s]+$/]',
                // 'weight' => 'required|regex_match[/^[0-9\s]+$/]',
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
                $uhid = $this->request->getPost('uhid') ? strtoupper(trim($this->request->getPost('uhid'))) : "";
                $mnt = trim($this->request->getPost('mentrual'));
                $pcmp = trim($this->request->getPost('pr_comp'));
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
                $rmks = trim($this->request->getPost('remarks'));
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
                $lb1 = $this->request->getFile('upload-labpdf1');
                $lb2 = $this->request->getFile('upload-labpdf2');
                $lb3 = $this->request->getFile('upload-labpdf3');
                $lb4 = $this->request->getFile('upload-labpdf4');
                $advc = trim($this->request->getPost('advice'));
                $img = $this->request->getFile('profileimage');
                $ischeck = trim($this->request->getPost('fittowork'));
                $dctr = trim($this->request->getPost('dctrName'));


                $data = [];
                // $currentData = $hmdl->getDataById($id);

                $lngpth = '';
                $lbpth = '';
                $lbpth1 = '';
                $lbpth2 = '';
                $lbpth3 = '';
                $lbpth4 = '';
                $admpth = '';
                $ecgpth = '';
                // $lngpth = $currentData['lung'] ?? '';
                // $lbpth = $currentData['lab'] ?? '';
                // $lbpth1 = $currentData['lab1'] ?? '';
                // $lbpth2 = $currentData['lab2'] ?? '';
                // $lbpth3 = $currentData['lab3'] ?? '';
                // $lbpth4 = $currentData['lab4'] ?? '';
                // $admpth = $currentData['audiometry'] ?? '';
                // $ecgpth = $currentData['ecg'] ?? '';


                if (empty($lngpth) && $lng->isValid()) {
                    $newlngFileName = $lng->getRandomName();
                    $lng->move("../public/uploads/lung_report/", $newlngFileName);
                    $lngpth = "public/uploads/lung_report/" . $newlngFileName;
                }

                if (empty($lbpth) && $lb->isValid()) {
                    $newpdfName = $lb->getRandomName();
                    $lb->move("../public/uploads/lab_report/", $newpdfName);
                    $lbpth = "public/uploads/lab_report/" . $newpdfName;
                }

                if (empty($lbpth1) && $lb1->isValid()) {
                    $lb1pdfName = $lb1->getRandomName();
                    $lb1->move("../public/uploads/lab_report/", $lb1pdfName);
                    $lbpth1 = "public/uploads/lab_report/" . $lb1pdfName;
                }

                if (empty($lbpth2) && $lb2->isValid()) {
                    $lb2pdfName = $lb2->getRandomName();
                    $lb2->move("../public/uploads/lab_report/", $lb2pdfName);
                    $lbpth2 = "public/uploads/lab_report/" . $lb2pdfName;
                }

                if (empty($lbpth3) && $lb3->isValid()) {
                    $lb3pdfName = $lb3->getRandomName();
                    $lb3->move("../public/uploads/lab_report/", $lb3pdfName);
                    $lbpth3 = "public/uploads/lab_report/" . $lb3pdfName;
                }

                if (empty($lbpth4) && $lb4->isValid()) {
                    $lb4pdfName = $lb4->getRandomName();
                    $lb4->move("../public/uploads/lab_report/", $lb4pdfName);
                    $lbpth4 = "public/uploads/lab_report/" . $lb4pdfName;
                }

                if (empty($admpth) && $adm->isValid()) {
                    $newAdmPdf = $adm->getRandomName();
                    $adm->move("../public/uploads/audiometry_report/", $newAdmPdf);
                    $admpth = "public/uploads/audiometry_report/" . $newAdmPdf;
                }

                if (empty($ecgpth) && $ecg->isValid()) {
                    $newEcgPdf = $ecg->getRandomName();
                    $ecg->move("../public/uploads/ecg_report/", $newEcgPdf);
                    $ecgpth = "public/uploads/ecg_report/" . $newEcgPdf;
                }

                if ($pimg->isValid() && !$pimg->hasMoved()) {
                    $imgNewName = $pimg->getRandomName();
                    $pimg->move("../public/uploads/images/", $imgNewName);

                    $photo = esc('public/uploads/images/' . $imgNewName);
                } else {
                    $photo = '';
                }

                $data = [
                    'uhid' => esc($uhid),
                    'obstetric' => esc($mnt),
                    'complaints' => esc($pcmp),
                    'weight' => esc($wght),
                    'height' => esc($hght),
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
                    'remarks' => esc($rmks),
                    'respiratory' => esc($rsp),
                    'cardio' => esc($crd),
                    'nervous' => esc($nrv),
                    'abdomen' => esc($abd),
                    'skin' => esc($skn),
                    'audiometry' => $admpth,
                    'ecg' => $ecgpth,
                    'chest' => esc($xry),
                    'thyphoid' => esc($thp),
                    'lung' => $lngpth,
                    'lab' => $lbpth,
                    'lab1' => $lbpth1,
                    'lab2' => $lbpth2,
                    'lab3' => $lbpth3,
                    'lab4' => $lbpth4,
                    'is_checked' => esc($ischeck),
                    'doctorName' => esc($dctr),
                    'advice' => esc($advc),
                    'emp_id' => esc($eid),
                    'name' => ucwords(esc($nm)),
                    'gender' => esc($gn),
                    'other_gender' => esc($gndr),
                    'dob' => esc($dob),
                    'age' => esc(''),
                    'phone' => esc($phn),
                    'service_dur' => esc($srvc),
                    'dept' => esc($dept),
                    'photo' => esc($photo),
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
                    'is_admin' => '1',
                    'created_at' => date('Y-m-d H:i:s')
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
                    5 => '<a href="' . base_url('superadmin/viewUserData?i=') . $row['id'] . '" target="_blank"><button class="btn btn-outline-warning" id="view"><i class="fas fa-eye"></i></button></a>
                    <a href="' . base_url('superadmin/offlinegeneratePdf?i=') . $row['id'] . '" target="_blank"><button class="btn btn-outline-success"><i class="fas fa-file-pdf"></i></button></a>',

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
                $eid = trim($this->request->getPost('id'));
                try {
                    $id = EncUrl::decUrl($eid);
                } catch (\Exception $e) {
                    log_message('error', 'Decryption failed: ' . $e->getMessage());
                    echo 'Decryption failed: ' . $e->getMessage();
                }
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
        $encryptedId = service('request')->getGet('i');
        try {
            $id = EncUrl::decUrl($encryptedId);
            $md = new \App\Models\HealthModel();
            $data['hospital'] = $md->where('id', esc($id))->find();
            if (empty($data['hospital'])) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }

            return view('superadmin/ViewData', $data);
        } catch (\Exception $e) {
            echo 'Decryption failed: ' . $e->getMessage();
        }


    }
    // public function viewPdf()
    // {
    //     return view('superadmin/ViewPdf');
    // }

    public function generatePdf($id, $stream = true)
    {
        $eid = service('request')->getGet('i');
        try {
            $id = EncUrl::decUrl($eid);
        } catch (\Exception $e) {
            log_message('error', 'Decryption failed: ' . $e->getMessage());
            echo 'Decryption failed: ' . $e->getMessage();
        }

        $md = new \App\Models\HealthModel();
        $data['hospital'] = $md->where('id', esc($id))->find();
        // print_r($data['hospital']); exit;
        if (!$data['hospital']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $pdf = new \Dompdf\Dompdf();
        $pdf->set_option('isRemoteEnabled', TRUE);
        $pdf->loadHtml(view('superadmin/ViewPdf', $data));
        $pdf->setPaper('A4', 'potrait');
        $pdf->render();

        $directory = '../public/uploads/generated_report/';

        $pdfName = $data['hospital'][0]['emp_id'] . '_' . $data['hospital'][0]['name'] . '.pdf';
        $pdfPath = $directory . $pdfName;

        $path = 'public/uploads/generated_report/' . $pdfName;

        file_put_contents($pdfPath, $pdf->output());

        $dataToUpdate = [
            'generated_pdf' => $path
        ];
        $md->update(esc($id), $dataToUpdate);

        if ($stream) {
            $pdf->stream($pdfName);
        }
    }
    public function downloadZip()
    {
        $eid = service('request')->getGet('i');
        try {
            $id = EncUrl::decUrl($eid);
        } catch (\Exception $e) {
            log_message('error', 'Decryption failed: ' . $e->getMessage());
            echo 'Decryption failed: ' . $e->getMessage();
        }
        
        $md = new \App\Models\HealthModel();
        $data = $md->select('audiometry, ecg, lung, lab, lab1, lab2, lab3, lab4, generated_pdf')->where('id', $id)->first();

        if (empty($data)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $zip = new \ZipArchive;
        $zipFileName = date('Ymd_His') . '.zip';

        if ($zip->open($zipFileName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== true) {
            exit("Cannot create $zipFileName\n");
        }

        $pdf = $this->generatePdf($id, false);

        $pdfdata = $md->select('generated_pdf')->where('id', $id)->first();
        if (!empty($pdfdata['generated_pdf'])) {
            $filePath = '../' . $pdfdata['generated_pdf'];
            if (file_exists($filePath)) {
                $zip->addFile($filePath, basename($filePath));
            } else {
                error_log("File does not exist: $filePath");
            }
        } else {
            throw new \RuntimeException("Generated PDF not found for ID: $id");
        }

        $files = ['audiometry', 'ecg', 'lung', 'lab', 'lab1', 'lab2', 'lab3', 'lab4'];
        foreach ($files as $file) {
            if (!empty($data[$file])) {
                $filePath = '../' . $data[$file];
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, ucwords($file) . '.' . pathinfo($filePath, PATHINFO_EXTENSION));
                } else {
                    error_log("File does not exist: $filePath");
                }
            }
        }

        $zip->close();

        header("Content-type: application/zip");
        header("Content-Disposition: attachment; filename=$zipFileName");
        header("Pragma: no-cache");
        header("Expires: 0");
        readfile($zipFileName);

        unlink($zipFileName);
    }

    public function generateOfflinePdf($id, $stream = true)
    {
        $id = service('request')->getGet('i');
        $md = new \App\Models\HealthModel();
        $data['hospital'] = $md->where('id', esc($id))->find();
        // print_r($data['hospital']); exit;
        if (!$data['hospital']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $pdf = new \Dompdf\Dompdf();
        $pdf->set_option('isRemoteEnabled', TRUE);
        $pdf->loadHtml(view('superadmin/ViewOfflinePdf', $data));
        $pdf->setPaper('A4', 'potrait');
        $pdf->render();

        $directory = '../public/uploads/Offline_generated_report/';

        $pdfName = $data['hospital'][0]['emp_id'] . '_' . $data['hospital'][0]['name'] . '.pdf';
        $pdfPath = $directory . $pdfName;

        $path = 'public/uploads/Offline_generated_report/' . $pdfName;

        file_put_contents($pdfPath, $pdf->output());

        $dataToUpdate = [
            'generated_pdf' => $path
        ];
        $md->update(esc($id), $dataToUpdate);

        if ($stream) {
            $pdf->stream($pdfName);
        }
    }

}
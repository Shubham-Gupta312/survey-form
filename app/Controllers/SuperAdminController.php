<?php

namespace App\Controllers;

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
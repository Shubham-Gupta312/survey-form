<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Kolkata');
class AdminController extends BaseController
{
    public function adminDashboard()
    {
        return view('admin/dashboard');
    }

    public function AdminfetchData()
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

                $associativeArray[] = array(
                    0 => $row['id'],
                    1 => $row['emp_id'],
                    2 => ucfirst($row['name']),
                    3 => $row['uhid'] ?? '',
                    4 => $row['phone'],
                    5 => '<a href="' . base_url('admin/viewUserData?i=') . $row['id'] . '" target="_blank"><button class="btn btn-outline-warning" id="view"><i class="fas fa-eye"></i></button></a>
                    <a href="' . base_url('admin/zip?i=') . $row['id'] . '"><button class="btn btn-outline-primary"><i class="fas fa-file-archive"></i></button></a>',
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

    function validate_UHID()
    {
        $uid = $this->request->getGet('uhid');
        $id = $this->request->getGet('id');
        $md = new \App\Models\HealthModel();
        // $isExist = $md->where('uhid', esc($uid))->first();
        $isExist = $md->where('uhid', esc($uid))
            ->where('id !=', $id)
            ->first();
        $retVal = $isExist ? false : true;

        return $this->response->setJSON(['valid' => $retVal]);
    }

    public function downloadZip()
    {
        $id = service('request')->getGet('i');
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


        $files = ['audiometry', 'ecg', 'lung', 'lab', 'lab1', 'lab2', 'lab3', 'lab4', 'generated_pdf'];
        foreach ($files as $file) {
            if (!empty($data[$file])) {
                $filePath = '../' . $data[$file];
                if (file_exists($filePath)) {
                    $fileName = ($file === 'generated_pdf') ? 'Report' : ucwords($file);
                    $zip->addFile($filePath, ucwords($fileName) . '.' . pathinfo($filePath, PATHINFO_EXTENSION));
                } else {
                    error_log("File does not exist: $filePath");
                }
            } else {
                $zip->addEmptyDir(ucwords($file));
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

    public function viewUserData()
    {
        $id = service('request')->getGet('i');
        $md = new \App\Models\HealthModel();
        $data['hospital'] = $md->where('id', esc($id))->find();
        if (empty($data['hospital'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/ViewReport', $data);
    }
}

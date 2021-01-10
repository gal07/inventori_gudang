<?php 
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends CI_Controller
{

    public function allreportBybranch()
    {

        $data['namaGudang'] = array();
        $namaGudang = $this->gudang_model->getDataGudangNoFilter();
        foreach ($namaGudang as $value) {
            $data['namaGudang'][$value['id']] = $value['nama'];
        }

        $data['namaBarang'] = array();
        $namaBarang = $this->barang_model->Get_Barang();
        foreach ($namaBarang as $value) {
            $data['namaBarang'][$value['id']] = $value['nama_barang'];
        }

        $data['jenisReport'] = array();
        $jenisReport = $this->barang_model->getJenisReport();
        foreach ($jenisReport as $value) {
            $data['jenisReport'][$value['id']] = $value['name'];
        }
        

        $filename = "Report_all_by.xlsx";
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()->setCreator("Maarten Balliauw");
        $spreadsheet->getProperties()->setLastModifiedBy("Maarten Balliauw");
        $spreadsheet->getProperties()->setTitle("Office 2007 XLSX Test Document");
        $spreadsheet->getProperties()->setSubject("Office 2007 XLSX Test Document");
        $spreadsheet->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");
        $spreadsheet->getProperties()->setKeywords("office 2007 openxml php");
        $spreadsheet->getProperties()->setCategory("Test result file");
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Jenis Aksi');
        $sheet->setCellValue('E1', 'Kuantitas');
        $sheet->setCellValue('F1', 'Nama Gudang');
 
        $query = $this->barang_model->getReport( ($this->session->userdata('branch') ? $this->session->userdata('branch'):'') );
        $i = 2;
        $no = 1;
        foreach ($query as $value) {
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $value['waktu']);
            $sheet->setCellValue('C'.$i, $data['namaBarang'][$value['id_barang']]);
            $sheet->setCellValue('D'.$i, $data['jenisReport'][$value['jenis_report']]);
            $sheet->setCellValue('E'.$i, $value['quantity']);	
            $sheet->setCellValue('F'.$i, $data['namaGudang'][$value['id_gudang']]);	
    
            $i++;
        }       
        
        $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];
        $i = $i - 1;
        $sheet->getStyle('A1:F'.$i)->applyFromArray($styleArray);
        
        
        try {
            $writer = new Xlsx($spreadsheet);
            $writer->save($filename);
            $content = file_get_contents($filename);
        } catch(Exception $e) {
            exit($e->getMessage());
        }
        
        header("Content-Disposition: attachment; filename=".$filename);
        unlink($filename);
        exit($content);
        
       
        
    }
    
}

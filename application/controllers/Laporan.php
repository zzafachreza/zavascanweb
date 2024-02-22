<?php


class Laporan extends CI_Controller{

function __construct(){
		parent::__construct();
 $this->load->model("Laporan_model"); //lo

	}
	
function ajax_list(){
	     header('Content-Type: application/json');
        $list = $this->Laporan_model->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $Data_laporan) {
            $no++;
            $row = array();
            //row pertama akan kita gunakan untuk btn edit dan delete
           
            
            
            if($Data_laporan->status==0){
                $warna='#58A55D';
                $status='Scan Resi';
            }elseif($Data_laporan->status==1){
                $warna='#F2BF41';
                $status='Scan Packing';
            }elseif($Data_laporan->status==2){
                $warna='#D85040';
                $status='Scan Ekspedisi';
            }elseif($Data_laporan->status==3){
                $warna='#85A8F1';
                $status='Scan Retur';
                
            }
            
            $showstatus = '<span style="color:'.$warna.';padding:5px;border-radius:10px;border:1px solid '.$warna.'">'.$status.'</span>';

            
            $row[] = $Data_laporan->ekspedisi;
            $row[] = $Data_laporan->nama;
            $row[] = $Data_laporan->tanggal_scan;
            $row[] = $Data_laporan->jam_scan;
            $row[] = $Data_laporan->tanggal_packing;
            $row[] = $Data_laporan->jam_packing;
            $row[] = $Data_laporan->tanggal_ekspedisi;
            $row[] = $Data_laporan->jam_ekspedisi;
            $row[] = $Data_laporan->tanggal_retur;
            $row[] = $Data_laporan->jam_retur;
            $row[] = $Data_laporan->status;
             $row[] =  '<a onClick="deleteData('.$Data_laporan->id.')" href="javascript:void(0);" class="btn btn-danger btn-sm"><i class="flaticon-delete"></i> </a>';
        
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->Laporan_model->count_all(),
            "recordsFiltered" => $this->Laporan_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
	}
	
function index(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']='Master Kurir';
			$this->load->view('header',$data);
			$this->load->view('scan/laporan');
			$this->load->view('footer');
		}
	}
	
function excel(){

    		if (!isset($_SESSION['email'])) {
    			redirect('login');
    		}else{
    	
    			$this->load->view('scan/excel');
    		
    		}
		}
		
function delete(){
                $id_member = $_SESSION['id'];
                $id = $this->uri->segment(3);
  
                $this->db->query("DELETE FROM barcode_$id_member WHERE id='$id'");
        	        
        	    $this->session->set_flashdata('update', 'Data berhasil di hapus !');
        		redirect('laporan');
        	
        	}
        	
        	
function delete_all(){

                $id_member = $_SESSION['id'];
                $awal = $this->uri->segment(3);
                $akhir = $this->uri->segment(4);
                
                 $sql="DELETE FROM barcode WHERE id_member='$id_member' AND tanggal BETWEEN '$awal' AND '$akhir'";
                 $sql2="DELETE FROM barcode_temp WHERE id_member='$id_member' AND tanggal BETWEEN '$awal' AND '$akhir'";
                
                $this->db->query($sql);
                $this->db->query($sql2);
        	    redirect('laporan');
        		
        	
        	}
	
}
<?php
use Illuminate\Database\Seeder;
/**
 * Usage :
 * [1] $ composer dump-autoload -o
 * [2] $ php artisan db:seed --class=BantenprovOrangTuaSeeder
 */
class BantenprovOrangTuaSeeder extends Seeder
{
    /* text color */
    protected $RED     ="\033[0;31m";
    protected $CYAN    ="\033[0;36m";
    protected $YELLOW  ="\033[1;33m";
    protected $ORANGE  ="\033[0;33m";
    protected $PUR     ="\033[0;35m";
    protected $GRN     ="\e[32m";
    protected $WHI     ="\e[37m";
    protected $NC      ="\033[0m";
    /* File name */
    /* location : /databse/seeds/file_name.csv */
    protected $fileName = "BantenprovOrangTuaSeeder.csv";
    /* text info : default (true) */
    protected $textInfo = true;
    /* model class */
    protected $model;
    /* __construct */
    public function __construct(){
        $this->model = new Bantenprov\OrangTua\Models\Bantenprov\OrangTua\OrangTua;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertData();
    }
    /* function insert data */
    protected function insertData()
    {
        /* silahkan di rubah sesuai kebutuhan */
        foreach($this->readCSV() as $data){

            
        	$this->model->create([
            	'nomor_un' => $data['nomor_un'],
				'alamat_ortu' => $data['alamat_ortu'],
				'nama_ayah' => $data['nama_ayah'],
				'nama_ibu' => $data['nama_ibu'],
				'kerja_ayah' => $data['kerja_ayah'],
				'pendidikan_ayah' => $data['pendidikan_ayah'],
				'kerja_ibu' => $data['kerja_ibu'],
				'pendidikan_ibu' => $data['pendidikan_ibu'],
				'no_telp' => $data['no_telp'],
				'user_id' => $data['user_id'],

        	]);
        

        }

        if($this->textInfo){                
            echo "============[DATA]============\n";
            $this->orangeText('nomor_un : ').$this->greenText($data['nomor_un']);
			echo"\n";
			$this->orangeText('alamat_ortu : ').$this->greenText($data['alamat_ortu']);
			echo"\n";
			$this->orangeText('nama_ayah : ').$this->greenText($data['nama_ayah']);
			echo"\n";
			$this->orangeText('nama_ibu : ').$this->greenText($data['nama_ibu']);
			echo"\n";
			$this->orangeText('kerja_ayah : ').$this->greenText($data['kerja_ayah']);
			echo"\n";
			$this->orangeText('pendidikan_ayah : ').$this->greenText($data['pendidikan_ayah']);
			echo"\n";
			$this->orangeText('kerja_ibu : ').$this->greenText($data['kerja_ibu']);
			echo"\n";
			$this->orangeText('pendidikan_ibu : ').$this->greenText($data['pendidikan_ibu']);
			echo"\n";
			$this->orangeText('no_telp : ').$this->greenText($data['no_telp']);
			echo"\n";
			$this->orangeText('user_id : ').$this->greenText($data['user_id']);
			echo"\n";
        
            echo "============[DATA]============\n\n";
        }

        $this->greenText('[ SEEDER DONE ]');
        echo"\n\n";
    }
    /* text color: orange */
    protected function orangeText($text)
    {
        printf($this->ORANGE.$text.$this->NC);
    }
    /* text color: green */
    protected function greenText($text)
    {
        printf($this->GRN.$text.$this->NC);
    }
    /* function read CSV file */
    protected function readCSV()
    {
        $file = fopen(database_path("seeds/".$this->fileName), "r");
        $all_data = array();
        $row = 1;
        while(($data = fgetcsv($file, 1000, ",")) !== FALSE){
            $all_data[] = ['nomor_un' => $data[0],'alamat_ortu' => $data[1],'nama_ayah' => $data[2],'nama_ibu' => $data[3],'kerja_ayah' => $data[4],'pendidikan_ayah' => $data[5],'kerja_ibu' => $data[6],'pendidikan_ibu' => $data[7],'no_telp' => $data[8],'user_id' => $data[9],];
        }
        fclose($file);
        return  $all_data;
    }
}

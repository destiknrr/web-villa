<?php
require_once 'config.php';

function connectDB() {
    global $host, $username, $password, $database;
    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function tesKoneksi() {
    $conn = connectDB();
    if (!$conn){
        echo "Koneksi gagal";
    } else {
        echo "Koneksi berhasil";
    }
}

function tambahVilla($data, $files) {
    $conn = connectDB();
    
    $nama_villa = $conn->real_escape_string($data['nama_villa']);
    $kapasitas = (int)$data['kapasitas_maksimal'];
    $harga = (float)$data['harga_permalam'];
    $jumlah_kamar_tidur = (int)$data['jumlah_kamar_tidur'];
    $jumlah_kamar_mandi = (int)$data['jumlah_kamar_mandi'];
    $deskripsi = $conn->real_escape_string($data['deskripsi']);
    
    $foto_utama = uploadFoto($files['foto_utama']);
    
    $query = "INSERT INTO villa (nama_villa, kapasitas_maksimal, harga_permalam, 
              jumlah_kamar_tidur, jumlah_kamar_mandi, foto_utama, deskripsi) 
              VALUES (?, ?, ?, ?, ?, ?, ?)";
              
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sidiisd", $nama_villa, $kapasitas, $harga, 
                      $jumlah_kamar_tidur, $jumlah_kamar_mandi, $foto_utama, $deskripsi);
    
    $result = $stmt->execute();
    $villa_id = $conn->insert_id;
    
    if(!empty($data['fasilitas'])) {
        foreach($data['fasilitas'] as $fasilitas) {
            tambahFasilitas($villa_id, $fasilitas);
        }
    }
    
    $stmt->close();
    $conn->close();
    return $result;
}

function ambilSemuaVilla() {
    $conn = connectDB();
    $query = "SELECT v.*, GROUP_CONCAT(f.nama_fasilitas) as fasilitas 
              FROM villa v 
              LEFT JOIN fasilitas_villa f ON v.id = f.villa_id 
              GROUP BY v.id";
              
    $result = $conn->query($query);
    $villas = [];
    
    while($row = $result->fetch_assoc()) {
        $villas[] = $row;
    }
    
    $conn->close();
    return $villas;
}

function ambilSemuaVillaById($id) {
    $conn = connectDB();
    $query = "SELECT * FROM villa WHERE id = '$id'";
    $result = $conn->query($query);
    
    // Return single row directly
    $villa = $result->fetch_assoc();
    
    $conn->close();
    return $villa;
}


function ambilFotoBanyak($villa_id) {
    $conn = connectDB();
    $query = "SELECT path_foto FROM foto_villa WHERE villa_id ='$villa_id'";
              
    $result = $conn->query($query);
    $villas = [];
    
    while($row = $result->fetch_assoc()) {
        $villas[] = $row;
    }
    
    $conn->close();
    return $villas;
}

function ambilVilla($id) {
    $conn = connectDB();
    
    $query = "SELECT v.*, GROUP_CONCAT(f.nama_fasilitas) as fasilitas 
              FROM villa v 
              LEFT JOIN fasilitas_villa f ON v.id = f.villa_id 
              WHERE v.id = ? 
              GROUP BY v.id";
              
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $villa = $result->fetch_assoc();
    
    $stmt->close();
    $conn->close();
    return $villa;
}

function updateVilla($id, $data, $files) {
    $conn = connectDB();
    
    $nama_villa = $conn->real_escape_string($data['nama_villa']);
    $kapasitas = (int)$data['kapasitas_maksimal'];
    $harga = (float)$data['harga_permalam'];
    $jumlah_kamar_tidur = (int)$data['jumlah_kamar_tidur'];
    $jumlah_kamar_mandi = (int)$data['jumlah_kamar_mandi'];
    $deskripsi = $conn->real_escape_string($data['deskripsi']);
    
    $foto_query = "";
    if(!empty($files['foto_utama']['name'])) {
        $foto_utama = uploadFoto($files['foto_utama']);
        $foto_query = ", foto_utama = '$foto_utama'";
    }
    
    $query = "UPDATE villa SET 
              nama_villa = ?, 
              kapasitas_maksimal = ?,
              harga_permalam = ?,
              jumlah_kamar_tidur = ?,
              jumlah_kamar_mandi = ?,
              deskripsi = ? $foto_query
              WHERE id = ?";
              
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sidiisi", $nama_villa, $kapasitas, $harga, 
                      $jumlah_kamar_tidur, $jumlah_kamar_mandi, $deskripsi, $id);
    
    if(!empty($data['fasilitas'])) {
        hapusFasilitas($id);
        foreach($data['fasilitas'] as $fasilitas) {
            tambahFasilitas($id, $fasilitas);
        }
    }
    
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function hapusVilla($id) {
    $conn = connectDB();
    
    hapusFasilitas($id);
    hapusFotoVilla($id);
    
    $query = "DELETE FROM villa WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function uploadFoto($file) {
    $target_dir = "assets/gambar/villa/";
    $file_extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    $new_filename = uniqid() . "." . $file_extension;
    $target_file = $target_dir . $new_filename;
    
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return $target_file;
    }
    return false;
}

function tambahFasilitas($villa_id, $nama_fasilitas) {
    $conn = connectDB();
    $nama_fasilitas = $conn->real_escape_string($nama_fasilitas);
    
    $query = "INSERT INTO fasilitas_villa (villa_id, nama_fasilitas) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $villa_id, $nama_fasilitas);
    
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function hapusFasilitas($villa_id) {
    $conn = connectDB();
    $query = "DELETE FROM fasilitas_villa WHERE villa_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $villa_id);
    
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function hapusFotoVilla($villa_id) {
    $conn = connectDB();
    $query = "DELETE FROM foto_villa WHERE villa_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $villa_id);
    
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}


?>

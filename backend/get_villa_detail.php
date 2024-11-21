// Get villa photos
$foto_query = "SELECT url_foto FROM foto_villa WHERE id_villa = ?";
$foto_stmt = $conn->prepare($foto_query);
$foto_stmt->bind_param("i", $villaId);
$foto_stmt->execute();
$foto_result = $foto_stmt->get_result();
$fotos = [];
while($foto = $foto_result->fetch_assoc()) {
    $fotos[] = $foto;
}
$villa_data['foto_villa'] = $fotos;

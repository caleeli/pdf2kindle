<?php
set_time_limit(-1);
ini_set('memory_limit','1600M');

$target_dir = "./";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$portada_file = $target_dir . basename($_FILES["portada"]["name"]);
$imageFileType = strtolower(pathinfo($portada_file, PATHINFO_EXTENSION));

$uploadOk = 1;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $cover = "cover.{$imageFileType}";
  if (!move_uploaded_file($_FILES["portada"]["tmp_name"], $cover)) {
    echo "Disculpa no se pudo cargar la imagen de la portada.";
    exit;
  }
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      // require sudo apt install poppler-utils
      $titulo = $_REQUEST['titulo'];
      $autor = $_REQUEST['autor'];
      file_put_contents("title.txt", "% {$titulo}\n% {$autor}\n\n");
      @unlink("output.epub");
      @unlink("output.mobi");
      exec("pdftotext " . escapeshellarg($target_file) . " output.md");
      exec("pandoc -o output.epub -V lang=es --epub-cover-image={$cover} --toc title.txt output.md");
      exec("kindlegen output.epub");

      $fichero = "output.mobi";
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename="'.basename($fichero).'"');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($fichero));
      readfile($fichero);
      exit;
    } else {
      echo "Disculpa no se pudo cargar el archivo PDF.";
  }
}

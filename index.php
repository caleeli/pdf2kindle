<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<form action="convertir.php" method="post" enctype="multipart/form-data">
  <h2>Convertir PDF a Kindle</h2>
  <div class="form-group">
    <label for="titulo">Título del libro</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="titulo">
  </div>
  <div class="form-group">
    <label for="autor">Autor del libro</label>
    <input type="text" class="form-control" id="autor" name="autor" value="autor">
  </div>
  <label for="autor">Imagen de la portada (Se recomienda un tamaño de al menos 700x1100 pixeles)</label>
  <div class="custom-file">
    <input type="file" class="custom-file-input" name="portada" id="portada">
    <label class="custom-file-label" for="portada">Portada</label>
  </div>
  <br><br>
  <label for="autor">Archivo PDF</label>
  <div class="custom-file">
    <input type="file" class="custom-file-input" name="fileToUpload" id="customFile">
    <label class="custom-file-label" for="customFile">Carga tu archivo PDF</label>
  </div>
  <br><br>
  <button type="submit" name="submit" class="btn btn-primary">Convertir</button>
</form>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

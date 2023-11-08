<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">product name</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="name" name="p_name">
</div>

<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">product price</label>
  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="price" name="p_price">
</div>

<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">product description</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="descriuption" name="p_des">
</div>

<select class="form-select" aria-label="Default select example" name="P_cat">
  <option selected>select categories</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select><br>
<div class="input-group">
  <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
</div><br>

<div class="mb-3">
  <input type="submit" class="form-control bg-success" id="formGroupExampleInput" placeholder="" name="p_des">
</div>

</form>
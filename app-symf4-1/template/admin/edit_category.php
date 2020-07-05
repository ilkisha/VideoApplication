<?php include('includes/_header.php'); ?>

<h2>Editing category</h2>

<form action="#" method="POST">
    <input type="text" class="form-control is-invalid" id="validationServer01" placeholder="Category name" value="Funny"
        required>
    <br>
    <label for="inlineFormCustomSelect">Parent:</label>
    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option value="1">Funny</option>
        <option value="1">--For kids</option>
        <option value="1">--For adults</option>
        <option value="1">----For 60+</option>
        <option value="2">Scary</option>
        <option value="3">Motivating</option>
    </select>
    <div class="invalid-feedback">
        Category already exists!
    </div>
    <button class="btn btn-primary mt-3" type="submit">Save</button>

</form>

<?php include('includes/_footer.php'); ?>

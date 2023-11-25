<div class="content">
    <form action="index.php?act=add_detail" method="post">
        <div id="variants-container">
            <h4>Biến thể sản phẩm</h4>
            <div class="variant">
                <hr>
                <label for="size">Kích thước</label>
                <input type="text" name="size[]" required><br><br>

                <label for="variantQuantity">Số lượng</label>
                <input type="number" name="variantQuantity[]" required><br><br>
            </div>
        </div>

        <input type="hidden" name="idsp" value="<?= $id ?>">
        <button type="button" id="add-variant">Thêm biến thể</button><br><br>

        <button class="btn btn-success">Thêm</button>
    </form>
</div>

<script>
    document.getElementById("add-variant").addEventListener("click", function() {
        var variantsContainer = document.getElementById("variants-container");
        var newVariant = document.querySelector(".variant").cloneNode(true);
        variantsContainer.appendChild(newVariant);
    });
</script>
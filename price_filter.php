<!-- price_filter.php -->
<select name="price_range" onchange="this.form.submit()">
   <option value="">All Prices</option>
   <option value="0-100"<?php if(isset($_GET['price_range']) && $_GET['price_range'] == '0-100') echo ' selected'; ?>>₱0 - ₱100</option>
   <option value="100-200"<?php if(isset($_GET['price_range']) && $_GET['price_range'] == '100-200') echo ' selected'; ?>>₱100 - ₱200</option>
   <option value="200-500"<?php if(isset($_GET['price_range']) && $_GET['price_range'] == '200-500') echo ' selected'; ?>>₱200 - ₱500</option>
   <option value="500-1000"<?php if(isset($_GET['price_range']) && $_GET['price_range'] == '500-1000') echo ' selected'; ?>>₱500 - ₱1000</option>
   <option value="1000+"<?php if(isset($_GET['price_range']) && $_GET['price_range'] == '1000+') echo ' selected'; ?>>₱1000+</option>
</select>